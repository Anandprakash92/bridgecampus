<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use app\components\CustomUrlRule;
use backend\controllers\UserController;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use common\widgets\CKEditor;
use iutbay\yii2kcfinder\KCFinder;
use yii\helpers\ArrayHelper;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\Specialization */
/* @var $form yii\widgets\ActiveForm */

$kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
  'uploadURL' => Yii::$app->myhelper->getFileBasePath(),
  'access' => [
    'files' => [
      'upload' => true,
      'delete' => true,
      'copy' => true,
      'move' => true,
      'rename' => true,
    ],
    'dirs' => [
      'create' => true,
      'delete' => true,
      'rename' => true,
    ],
  ],
]);

Yii::$app->session->set('KCFINDER', $kcfOptions);

$validateUrl = ($model->isNewRecord)?Url::to(['university/validate']):Url::to(['university/validate','id'=>$model->id]);
?>

<div class="exam-category-form">
  <div class="custumbox box box-info">
   <div class="box-body">

    <?php $form = ActiveForm::begin([
     'layout' => 'horizontal',
     'enableClientValidation' => true,
     'enableAjaxValidation' => true,
     'validationUrl' => $validateUrl,
     'options' => ['enctype' => 'multipart/form-data'],
   ]);?>
   <br/>

   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'also_known_as')->textInput(['maxlength' => true]) ?>

   <?php if (!$model->isNewRecord) {
        $model->code = Yii::$app->myhelper->getUniversityCode($model->code);
      ?>
      <?= $form->field($model, 'code')->textInput(['maxlength' => true,'disabled'=>true]) ?>
    <?php } ?>

   <?php 
    $universityData= \common\models\UniversityTypeData::find()->where(['status' => 'Active'])->orderBy([ 'university_name' => SORT_ASC])->all();

    $listuniversity=ArrayHelper::map($universityData,'id','university_name');
    echo $form->field($model, 'utype')->widget(Select2::classname(), [
        'name' => 'utype',
        'data' => $listuniversity,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select University ...',],
            'pluginOptions' => [
                'allowClear' => true
        ]
      ]);
   ?>
   <?= $form->field($model, 'address')->widget(CKEditor::className(), [
    'options' => ['rows' => 6],
    'preset' => 'standard',
    'clientOptions'=>[
      'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
      /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
    ]
  ]) ?>

   <?php

   $contriesList = UserController::actionGetCountrieslist();
   if($model->isNewRecord){
    $stateLists = UserController::actionGetStateslist();
    $citiesLists = UserController::actionGetCitieslist();
    $model->countryID = 101;/*india*/
    $model->stateID = 22;/*maharsahtra*/
  }else{
    if(!empty($model->countryID)){

      $stateLists = UserController::actionGetStateslist($model->countryID);
    }else{
      $stateLists = UserController::actionGetStateslist(101);
    }
    if(!empty($model->stateID)){
      $citiesLists = UserController::actionGetCitieslist($model->stateID);
    }else{
      $citiesLists = UserController::actionGetCitieslist(22);
    }
  }
  ?>

  <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'taluka')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>
  
  <?= $form->field($model, 'countryID')->dropDownList(json_decode($contriesList,true),['class'=>'form-control',
    'onchange'=>'$.get("../user/get-stateslist?countryID="+$(this).val(), function( data ) {
      data = $.parseJSON(data);
      $(\'#university-stateid\').empty().append("<option value=\'\'>-- Select State --</option>");
      $(\'#university-cityid\').empty().append("<option value=\'\'>-- Select City --</option>");
      $.each(data, function(index, value) {
       $(\'#university-stateid\').append($(\'<option>\').text(value).attr(\'value\', index));
       });
       });
       ','prompt'=>'-- Select Country --'])?>

  <?= $form->field($model, 'stateID')->dropDownList(json_decode($stateLists,true),['class'=>'form-control','prompt'=>'-- Select State --',
    'onchange'=>'$.get("../user/get-citieslist?stateID="+$(this).val(), function( data ) {
     data = $.parseJSON(data);
      $(\'#university-cityid\').empty().append("<option value=\'\'>-- Select City --</option>");
     
      $.each(data, function(index, value) {
       $(\'#university-cityid\').append($(\'<option>\').text(value).attr(\'value\', index));
       });
      });
       '])?>
    <?= $form->field($model, 'cityID')->dropDownList(json_decode($citiesLists,true),['class'=>'form-control','prompt'=>'-- Select City --'])?>


       <?= $form->field($model, 'pincode')->textInput(['maxlength' => true]) ?>
       
       <?php // echo $form->field($model, 'countryCode')->dropDownList(Yii::$app->myhelper->getCountryCode(),['class'=>'form-control', 'prompt'=>'-- Select Country Code --'])?>

         <?=
            $form->field($model, 'isd_codesID')->widget(Select2::classname(), [
            'name'=> 'countryCode',
            'data' =>Yii::$app->myhelper->getCountryCode(),
            'size' => Select2::SMALL,
            'options' => ['placeholder' => 'Select Country Code ...', 'multiple' => false],
              'pluginOptions' => [
                  'allowClear' => true
          ]]);
          ?>

      <?= $form->field($model, 'std_code')->textInput(['maxlength' => true]) ?>

       <?= $form->field($model, 'contact')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>

      <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'websiteurl')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'establish_year')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'about')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>

      <?= $form->field($model, 'vision')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>

      <?= $form->field($model, 'mission')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>


      <?= $form->field($model, 'motto')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>


      <?= $form->field($model, 'founder')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>

      <?= $form->field($model, 'chancellor')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>

      <?= $form->field($model, 'vice_chancellor')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>
      
        <?= $form->field($model, 'director')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>
        
        <?= $form->field($model, 'principal')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>
    
    <?= $form->field($model, 'dean')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>
    
    <?= $form->field($model, 'placementOfficer')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>
    
    <?= $form->field($model, 'registrar')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>

      <?= $form->field($model, 'campus_size')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
      ]) ?>
   
        <?php echo $form->field($model, 'university_rating')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
        ]);?>
      
      <?= $form->field($model, 'affiliate_to')->widget(Select2::classname(), [
          'name'=> 'affiliate_to',
          'data' => common\models\Affiliate::getAllAffiliatedData(),
          'size' => Select2::SMALL,
          'options' => ['placeholder' => 'Select Affiliate To ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true
        ],
      ]);?>


      <?= $form->field($model, 'approving_government_authority')->widget(Select2::classname(), [
          'name' => 'approving_government_authority',
            'data' => common\models\ApprovedGovernment::getApprovedGovernmentData(),
            'size' => Select2::SMALL,
            'options' => ['placeholder' => 'Select Approving Government Authority...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true
        ],
      ]);?>


      <?= $form->field($model, 'approved_by')->widget(Select2::classname(), [
        'name' => 'approved_by',
        'data' => common\models\Approved::getApprovedData(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Approved ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true
        ],
      ]);?>


      <?= $form->field($model, 'accredited_by')->widget(Select2::classname(), [
        'name' => 'approved_by',
        'data' => common\models\Accredited::getAllAccreditedData(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Accredited by ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true
        ],
      ]);?>
   
      <?= $form->field($model, 'grade')->widget(Select2::classname(), [
        'name' => 'grade',
        'data' => Yii::$app->myhelper->getNAACGradeData(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Grade ...',],
            'pluginOptions' => [
                'allowClear' => true
        ]
      ]);?>
   
      <?= $form->field($model, 'naac_cgpa')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'naac_validity_date')->textInput(['maxlength' => true]) ?>

      <?php
      $bannerImgPreview  = $logoImgPreview = "";
      $brochureFilePreviewList = $brochurePreviewConfig = [];
      if(!$model->isNewRecord){
        $fViewPath= Yii::$app->myhelper->getFileBasePath(1,$model->id);
        if(!empty($model->bannerURL)){
          $bannerImgPreview = [$fViewPath.$model->bannerURL];
        }

        
        if(!empty($brochureFilePreview)){
          $bfViewPath= Yii::$app->myhelper->getUBrochureUploadPath($model->id);
          foreach ($brochureFilePreview as $key => $brochure) {
            $downloadUrl = $bfViewPath.$brochure['url'];
            $brochureFilePreviewList[] = $downloadUrl;
            $brochurePreviewConfig[] = [
              'downloadUrl'=> $downloadUrl,
              'url'=> Url::to(['delete-brochure']),
              'extra'=> ['id'=> $brochure['id']],
              'key'=>1
            ];
          }
        }
        if(!empty($model->logourl)){
          $logoImgPreview = [$fViewPath.$model->logourl];
        }
      }

      ?>


      <?php echo $form->field($model, 'bannerImg')->widget(FileInput::classname(), [
        'pluginOptions' => [
          'options' => ['multiple' => false,'accept' => 'image/*'],
          'initialPreview'=> $bannerImgPreview,
          'initialPreviewAsData'=>true,
          'initialPreviewFileType'=> 'image',
          'initialPreviewConfig'=>[[
            'downloadUrl'=> $bannerImgPreview,
            'url'=>($model->id)? Url::to(['delete-file','id'=>$model->id,'property'=>'bannerURL']):'',
            'extra'=> ['id'=> 100]
          ]
        ],
        'overwriteInitial'=>true,
        'dropZoneEnabled'=> false,
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
      ],
      'pluginEvents'=>[
        'filebeforedelete'=>'function(){
          return new Promise(function(resolve, reject) {
            $.confirm({
              title: "Confirmation!",
              content: "Are you sure you want to delete this file?",
              type: "red",
              buttons: {   
                ok: {
                  btnClass: "btn-primary text-white",
                  keys: ["enter"],
                  action: function(){
                   console.log();
                   resolve();

                 }
                 },
                 cancel: function(){
                  $.alert("File deletion was aborted! ");
                }
              }
              });
              }); 
            }',
          ],
        ]);?>


        <?php /*echo $form->field($universityBrochures, 'brochureFiles[]')->widget(FileInput::classname(), [
          'pluginOptions' => [
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'options' => ['multiple' => true],
            //'initialPreview'=> $brochureFilePreview,
            //'initialPreviewAsData'=>true,
            'initialPreviewConfig'=>[[
              //'downloadUrl'=> $brochureFilePreview,
              'url'=>($model->id)? Url::to(['delete-file','id'=>$model->id,'property'=>'brochureurl']):'',
            ]
          ],
          'preferIconicPreview'=> true,
          'previewFileIconSettings'=>[
            'doc'=> '<i class="fa fa-file text-primary"></i>',
            'xls'=> '<i class="fa fa-file-excel text-success"></i>',
            'ppt'=> '<i class="fa fa-file-powerpoint text-danger"></i>',
          ],
          'showUpload' => false,
          'overwriteInitial'=>false,
          'dropZoneEnabled'=>false,
        ]
      ]);*/


       ?>

       <?= $form->field($universityBrochures, 'brochureFiles[]')->widget(FileInput::classname(), [
        'options' => [
          'multiple' => true
        ],
        'pluginOptions' => [
          'showUpload' => false,
          'overwriteInitial'=>false,
          'dropZoneEnabled'=>false,
          'initialPreview'=> $brochureFilePreviewList,
          'initialPreviewAsData'=>true,
          'initialPreviewConfig'=> $brochurePreviewConfig,
          'allowedFileExtensions' => ['pdf','doc','docx'],
          'preferIconicPreview'=> true,
          'previewFileIconSettings'=>[
            'doc'=> '<i class="fa fa-file text-primary"></i>',
            'xls'=> '<i class="fa fa-file-excel text-success"></i>',
            'ppt'=> '<i class="fa fa-file-powerpoint text-danger"></i>',
          ],
          'uploadUrl' => false,
        ],
        'pluginEvents'=>[
          'filebeforedelete'=>'function(){
            return new Promise(function(resolve, reject) {
              $.confirm({
                title: "Confirmation!",
                content: "Are you sure you want to delete this file?",
                type: "red",
                buttons: {   
                  ok: {
                    btnClass: "btn-primary text-white",
                    keys: ["enter"],
                    action: function(){
                     console.log();
                     resolve();

                   }
                   },
                   cancel: function(){
                    $.alert("File deletion was aborted! ");
                  }
                }
                });
                }); 
              }',
            ]
          ]); ?>

        <?php echo $form->field($model, 'logoImg')->widget(FileInput::classname(), [
          'pluginOptions' => [
            'options' => ['multiple' => false,'accept' => 'image/*'],
            'initialPreview'=> $logoImgPreview,
            'initialPreviewAsData'=>true,
            'initialPreviewFileType'=> 'image',
            'initialPreviewConfig'=>[[
              'downloadUrl'=> $logoImgPreview,
              'url'=>($model->id)? Url::to(['delete-file','id'=>$model->id,'property'=>'logourl']):'',
              'extra'=> [],
              'key'=>1
            ]
          ],
          'overwriteInitial'=>true,
          'dropZoneEnabled'=> false,
          'showCaption' => true,
          'showRemove' => false,
          'showUpload' => false,
          'uploadAsync'=>false,
        ],
        'pluginEvents'=>[
          'filebeforedelete'=>'function(){
            return new Promise(function(resolve, reject) {
              $.confirm({
                title: "Confirmation!",
                content: "Are you sure you want to delete this file?",
                type: "red",
                buttons: {   
                  ok: {
                    btnClass: "btn-primary text-white",
                    keys: ["enter"],
                    action: function(){
                     console.log();
                     resolve();

                   }
                   },
                   cancel: function(){
                    $.alert("File deletion was aborted! ");
                  }
                }
                });
                }); 
              }',
            ]
          ]);?>

          <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'status')->dropDownList(Yii::$app->myhelper->getActiveInactive(),['class'=>'form-control'])?>

          <div class="col-sm-offset-2 col-sm-4">
            <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
          </div>

          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>

    <?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../university/index')."");?>