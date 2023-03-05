<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;

/**
 * Common controller for the `api` module
 */
class CommonController extends Controller
{
    
    public static function allowedDomains()
    {
        return [
            // '*',                        // star allows all domains
            'https://bridgecampus.in/',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST', 'GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }
    
    public function actionEncrypt() {
       
        $id = \Yii::$app->getRequest()->getQueryParam('id');
       
       return $this->encryptor("encrypt",$id);
    }
    
    public function encryptor($action, $string) {
        $output = false;
        $encrypt_method = "BF-CBC";
        $key = "!@%&*#YR*(gfhiu@#@@";
        //pls set your unique hashing key
        $secret_key = $key;
        $secret_iv = $key;
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 8);

        //do the encyption given text, string, number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text, string, number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}