<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\widgets\Pjax;
//use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $university->name.' '.$fileType.' Gallery';
$this->params['subtitle'] = '<h1>'.ucwords($fileType).' Gallery</h1>';

$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $university->name;
$this->params['breadcrumbs'][] = $fileType.' Gallery';

$this->registerCssFile("@web/css/lightgallery.min.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

$this->registerCssFile("@web/css/video-js.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

$this->registerJsFile('@web/js/imagesloaded.pkgd.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/isotope.pkgd.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/picturefill.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/lightgallery-all.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/jquery.mousewheel.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/video.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/lg-deletebutton.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<?php 
$this->registerCss("
    .app-title{
     display: none;
    }
    .file-preview {
		display:none;
	}

 ");
 ?>
<div class="university-index">
<div class="custumbox col-md-12">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">

<?php if($type == 1){ ?>
	<li class="active">
		<a>Images</a>
	</li>
	<li>
		<a href="<?= Url::to(['gallery','id'=>$university->id,'type'=>2]) ?>">Videos</a>
	</li>
<?php }else{ ?>
	<li >
		<a  href="<?= Url::to(['gallery','id'=>$university->id,'type'=>1]) ?>">Images</a>
	</li>
	<li class="active">
		<a>Videos</a>
	</li>
<?php } ?>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
	<div class="box box-default">
		<div class="box-header with-border">
			<i class="fa fa-cloud-upload" aria-hidden="true"></i>
			<h3 class="box-title">Upload File</h3>
			<div class="box-tools">
				<button type="button" class="btn btn-box-tool custom-tool-btn">
					<i class="fa fa-info-circle" aria-hidden="true"></i>
				</button>
			</div>
		</div>
		<div class="box-body" style="">
			<?php
			echo FileInput::widget([
				'name' => 'ufiles[]',
				'options'=>[
					'multiple'=>true,
					'accept' => $fileType.'/*'
				],
				'pluginOptions' => [
					'allowedFileExtensions'=>$allowedFileExtensions,
					'uploadAsync' => false,
					'uploadUrl' => Url::to(['file-upload','id' => $university->id,'type' => $type]),
					'uploadExtraData' => [
						'type' => $type,
					],
					'maxFileCount' => 10
				],
				'pluginEvents'=>[
					'fileloaded'=>"function(){
						$('.file-preview').show();
					}",
					'fileremoved'=>"function(){
						if($(this).fileinput('getFileStack') <= 0 ){
							$('.file-preview').hide();
							$('#uploadsuccess').hide(); 
							$('#uploaderrors').hide();
						}
					}",
					"filecleared"=>"function(){
						if($(this).fileinput('getFileStack') <= 0 ){
							$('.file-preview').hide();
							$('#uploadsuccess').hide(); 
							$('#uploaderrors').hide();
						}
					}",

					"filebatchuploadsuccess"=>"function(event, data){
						$.pjax.reload({container:'#img-gallery-wrap'});
						$('#uploadsuccess').hide(); 
						$('#uploaderrors').hide(); 
						if(data.response.success){
							$('#successmsg').html(data.response.success);
							$('#uploadsuccess').slideDown('slow');
						}
						if(data.response.error){
							$('#errormsg').html(data.response.error);
							$('#uploaderrors').slideDown('slow');
						}
					}",

				],
			]);
			?>
			<p class="help-block">Allowed File Extensions: <?= @implode(', ',$allowedFileExtensions)?></p>
			<div id="uploadsuccess" style="display: none" class="callout callout-success">
				<p id="successmsg"></p>
			</div>
			<div id="uploaderrors" style="display: none" class="callout callout-error">
				<p id="errormsg"></p>
			</div>
		</div>
	</div>
	<?php Pjax::begin([ 'id'=>'img-gallery-wrap']); ?>
	<div class="box box-default">
		<div class="box-header with-border">
			<i class="fa <?= ($type==1)?'fa-picture-o':' fa-play-circle' ?>" aria-hidden="true"></i>
			<h3 class="box-title"><?= ($type==1)?'Images':'Videos' ?></h3>
		</div>
		<div class="box-body">
			<div id="lightgallery" class="masonry-container list-unstyled row">
				<?php foreach ($fileList as $key => $file) { ?>
					<div class="col-md-3 masonry-item">
						<?php if($type == 1){
							$fileUrl = $fBasePath.$file->url;
						?>
							<div class="gallery-file-wrap" data-src="<?= $fileUrl ?>">
								<img class="img-responsive img-thumbnail" data-key="<?= Url::to(['delete-gallery-file','id'=>$file->id]) ?>" src="<?= $fileUrl  ?>" />
							</div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <?= $file['url']?>    
                                                            </div>
                                                        </div>   
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div id="radioBtn" class="btn-group">
                                                                    <?php  $status = $file['status'] == 1 ? 'Active' : 'notActive';?>    
                                                                    <a class="btn btn-primary btn-sm <?= $file["status"] == 1 ? "Active" : "notActive";?>" data-toggle="<?= $file['id']?>" data-title="active" onclick="myFunction(this)">Active</a>
                                                                    <a class="btn btn-primary btn-sm <?= $file['status'] == 0 ? "Active" : "notActive";?>" data-toggle="<?= $file['id']?>" data-title="notActive" onclick="myFunction(this)">Inactive</a>
                                                                </div>
                                                            </div>
                                                        </div>
						<?php }else{ 
							$videoID= "video".$key;
							$fileUrl = $fBasePath.$file->url;
							$thumbPath =  $fBasePath.pathinfo($fileUrl, PATHINFO_FILENAME)."-thumb.png";
							?>
							<div style="display:none;" id="<?=$videoID?>">
								<video class="lg-video-object lg-html5 video-js vjs-default-skin vjs-big-play-button" 
								poster="<?= $thumbPath ?>"
								controls preload="none">
									<source src="<?=$fileUrl?>" type="video/mp4">
										Your browser does not support HTML5 video.
									</video>
                                                        </div>
                                                        <div class="gallery-file-wrap" data-poster="<?= $thumbPath ?>"  data-html="#<?= $videoID ?>" >
                                                            <img data-key="<?= Url::to(['delete-gallery-file','id'=>$file->id]) ?>"  class="img-responsive img-thumbnail" src="<?= $thumbPath ?>"  />
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="input-group">
                                                                <?= $file['url']?>    
                                                            </div>
                                                        </div>   
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div id="radioBtn" class="btn-group">
                                                                    <?php  $status = $file['status'] == 1 ? 'Active' : 'notActive';?>    
                                                                    <a class="btn btn-primary btn-sm <?= $file["status"] == 1 ? "Active" : "notActive";?>" data-toggle="<?= $file['id']?>" data-title="active" onclick="myFunction(this)">Active</a>
                                                                    <a class="btn btn-primary btn-sm <?= $file['status'] == 0 ? "Active" : "notActive";?>" data-toggle="<?= $file['id']?>" data-title="notActive" onclick="myFunction(this)">Inactive</a>
                                                                </div>
                                                            </div>
                                                        </div>
							
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php Pjax::end(); ?>
	</div>
</div>
</div>
</div>
</div>
<?php

	$this->registerJs('
		$masonry = $(".masonry-container");
		$(document).ready(function(){
			function initFunctions(){				
				$masonry.isotope({
					itemSelector: ".masonry-item",
					columnWidth: "25%",
					percentPosition: true,
				});

				$masonry.imagesLoaded().progress( function() {
					$masonry.isotope("layout");
				});

				$lg = $("#lightgallery");
				$lg.lightGallery({
					selector:".gallery-file-wrap",
					videojs: true,
					share: false,
					download: false,
					});
					$lg.on("onBeforeOpen.lg",function(event, index, fromTouch, fromThumb){
						console.log(event, index, fromTouch, fromThumb);
				});
				
				$lg.on("onBeforeClose.lg",function(event, index, fromTouch, fromThumb){
					reloadMasonry();
				});
			}
			initFunctions();
			$(document).on("pjax:success", "#img-gallery-wrap",  function(event){
				initFunctions();
				reloadMasonry();
			});

			function reloadMasonry(){
				setTimeout(function(){
					$masonry.isotope("reloadItems");
					$masonry.isotope("layout");
				},500);
			}
		});
                
               
                $("#radioBtn a").on("click", function(e) {
                    var sel = $(this).data("title");
                    var tog = $(this).data("toggle");
                    var selVal = $("#"+tog).prop("value", sel);
                    console.log(selVal);
                });
	');
?>
<?php 
$this->registerCss("
	#radioBtn .notActive{
            color: #3276b1;
            background-color: #fff;
        }
	");
?>
<script>
    function myFunction(e) {
        var status = $(e).data('title');
        var id = $(e).data('toggle');
       
        $.ajax({
                url: "gallerystatus",
                type:"POST",            
                data:{
                    'status': status,
                    'id': id
                },
                dataType:"json",
                success:function(data){
                    console.log(data);
                    
                    if(data==null){
                        $("#product_type").empty();    
                    }else{
                        location.reload();
                    }
                }
            });
    }
</script>