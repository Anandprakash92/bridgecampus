<?php

namespace backend\controllers;

use Yii;
use common\models\AdvertiseBanner;
use common\models\search\AdvertiseBannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use common\models\AdvDisplayAdLocation;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * AdvertiseBannerController implements the CRUD actions for AdvertiseBanner model.
 */
class AdvertiseBannerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdvertiseBanner models.
     * @return mixed
     */
    public function actionIndex($id=null, $rid=1)
    {
        $bannerName = AdvDisplayAdLocation::findOne($rid);
       
        $this->layout= "advertise";
        $searchModel = new AdvertiseBannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $rid);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bannerName' => $bannerName['name'],
            'bannerId' =>$rid,
        ]);
    }

    /**
     * Displays a single AdvertiseBanner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AdvertiseBanner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $data = Yii::$app->request->queryParams;
        
        $this->layout= "advertise";
        $model = new AdvertiseBanner();

        $bannerName = AdvDisplayAdLocation::findOne($data['bannerId']);
        
        $imgPreview = [];
        $imgPreviewConfig = [];
        $oldFile = "";
        $uploadPath = Yii::$app->myhelper->getUploadPath(2,$model->id);
        $fViewPath= Yii::$app->myhelper->getUploadPath(2,$model->id);
        if(!empty($model->image)){
            $imgPreview = [$fViewPath.$model->image];
            if(strpos($bannerName['name'], 'video')) {
                $imgPreviewConfig = ["type" => "video", "filetype"=> "video/mp4","downloadUrl"=> $fViewPath.$model->image,'showRemove'=>false];
            }else{
                $imgPreviewConfig = ["downloadUrl"=> true,'showRemove'=>false,"downloadUrl"=> $fViewPath.$model->image];
            }
            $oldFile = $uploadPath.$model->image;
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->date_from = date('Y-m-d',strtotime($model->date_from));
            $model->to_date = date('Y-m-d',strtotime($model->to_date));
            $model->bannerType = $bannerName['id'];
            $instituteImg = UploadedFile::getInstance($model, 'image');
            $filename = time();
            if(!empty($instituteImg))
            {
                $model->url = $filename.".".pathinfo($instituteImg->name, PATHINFO_EXTENSION);
                $model->image = $instituteImg->name;;
            }
            if($model->save()) {
                $uploadPath = Yii::$app->myhelper->getUploadPath(2,$model->id);
                FileHelper::createDirectory($uploadPath,0777,true);
                if(!empty($instituteImg))
                {
                    $instituteImg->saveAs($uploadPath.$model->image);
                     if($oldFile != ""){
                        @unlink($oldFile);
                         if(strpos($bannerName['name'], 'video') == false) {
                            @unlink($uploadPath.pathinfo($oldFile, PATHINFO_FILENAME )."-thumb.png");
                        }
                    }
                     if(strpos($bannerName['name'], 'video')) {
                        $thumbPath = $uploadPath.$filename."-thumb.png";
                        Yii::$app->myhelper->videoThumb($filePath,$thumbPath);
                    }
                }
                \Yii::$app->getSession()->setFlash('success', 'Successfully.');
                    return $this->redirect(['index', 'id' => '', 'rid'=>$data['bannerId']]);
            } 
        }
        
        return $this->render('create', [
            'model' => $model,
            'imgPreview'=>$imgPreview,
            'imgPreviewConfig'=> $imgPreviewConfig,
            'bannerType'=>$bannerName['name']
        ]);
    }

    /**
     * Updates an existing AdvertiseBanner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $bannerType = !empty($_GET['banner']) ? $_GET['banner'] : '';
        $imgPreview = [];
        $imgPreviewConfig = [];
        $oldFile = "";
        $uploadPath = Yii::$app->myhelper->getUploadPath(2,$model->id);
        $fViewPath= Yii::$app->myhelper->getUploadPath(2,$model->id);
        if(!empty($model->image)){
            $imgPreview = [$fViewPath.$model->image];
            if($model->gtype == 6)
            {
                $imgPreviewConfig = ["type" => "video", "filetype"=> "video/mp4","downloadUrl"=> $fViewPath.$model->image,'showRemove'=>false];
            }else{
                $imgPreviewConfig = ["downloadUrl"=> true,'showRemove'=>false,"downloadUrl"=> $fViewPath.$model->image];
            }
            $oldFile = $uploadPath.$model->image;
        }
        if ($model->load(Yii::$app->request->post())) {
                $model->date_from = date('Y-m-d',strtotime($model->date_from));
                $model->to_date = date('Y-m-d',strtotime($model->to_date));

                $instituteImg = UploadedFile::getInstance($model, 'image');
                $filename = time();
                if(!empty($instituteImg))
                {
                    $model->url = $filename.".".pathinfo($instituteImg->name, PATHINFO_EXTENSION);
                    $model->image = $instituteImg->name;;
                }
                if($model->save()) {
                    $uploadPath = Yii::$app->myhelper->getUploadPath(2,$model->id);
                    FileHelper::createDirectory($uploadPath,0775,true);
                    if(!empty($instituteImg))
                    {
                        $instituteImg->saveAs($uploadPath.$model->image);
                    }
                    \Yii::$app->getSession()->setFlash('success', 'Successfully.');
                    return $this->redirect(['index', 'id' => '', 'rid'=>$model['bannerType']]);
                }
        }

        return $this->render('update', [
            'model' => $model,
            'imgPreview'=>$imgPreview,
            'imgPreviewConfig'=> $imgPreviewConfig,
            'bannerName'=>$bannerType
        ]);
    }

    /**
     * Deletes an existing AdvertiseBanner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AdvertiseBanner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdvertiseBanner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdvertiseBanner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
