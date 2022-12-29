<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\CustomUrlRule;
use yii\db\Query;
use common\models\Program;
use common\models\Courses;
use common\models\CourseCertificationType;
use common\models\CourseQualificationType;
use common\models\CourseDuration;
use common\models\CourseModeOfTeaching;
use common\models\ExamLevel;
use common\models\Role;
use common\models\ExamCategory;
use common\models\CampusFacilities;
use common\models\IndustrySector;

class MyHelpers extends Component{

    public $trLogoBaseUrl = '';
    public $trLogoViewUrl = '';
    public function init()
    {
        parent::init();
        $this->trLogoBaseUrl = Yii::getAlias('@webroot') .'/uploads/top-recreuitors/';
        $this->trLogoViewUrl = Url::home(true).'uploads/top-recreuitors/';
    }
    public static function formsubmitedbyajax($formid = null,$aftersuccessurl = null)
    {
      return '$("form#'.$formid.'").on("beforeSubmit", function(e) {
        $(".onsub").attr("disabled","disabled");
        $("#span").show();

        url = $(this).attr("action");
        $(this).find("input[type=\'file\']").each(function(){
          if ($(this).get(0).files.length === 0) {
            $(this).remove();
        }
        });
        $.ajax({    
            type: "POST",  
            url: url,  
            data: new FormData(this),
            contentType: false,
            cache: false,
            async:true,
            processData:false,
            beforeSend:function(){
                $("#load").button("loading");
                $(".onsub").attr("disabled","disabled");
                $("#span").show();
                },
                success:function(data){
                 //$(location).attr("href", "'.$aftersuccessurl.'");
                    },
                    });

                    }).on("submit", function(e){
                      e.preventDefault();
            });';
    }



            public static function getCourseMode(){
                return [1 => 'Regular', 2=>'Distance Learning', 3 =>'Correspondence', 4=>'Online Mode', 5=>'Hybrid Mode', 6=>'MOOCs (massive open online courses)'];
            }

            public static function getHereunder(){
                return [1 => 'Admission Start Date', 2=>'Last Date to Apply', 3 =>'GD-PI Date', 4=>'Internal Entrance Exam Dates', 5=>'Merit List Date', 6=>'Admission Last Date'];
            }

            public static function getOwnership(){
                return [1 => 'Owned by Trust', 2=>'Private College', 3 =>'Public College', 4=>'Self-Financed Institute'];
            }

            public static function getShift(){
                return [1 => 'First Shift', 2=>'Second Shift', 3 =>'Third Shift'];
            }

            public static function getActiveInactive()
            {
                return [1 => 'Active', 0=>'Inactive'];
            }
            
            public static function getReviewStatus()
            {
                return [1 => 'Approved', 2 => 'Pending', 3 => 'Blocked'];
            }

            public static function getPlacementData(){
                return [1=>'Highest Package National', 2=>'Highest Package International', 3=>'Average Package', 4=>'Lowest Package'];   
            }

            public static function getFacility()
            {
                return ArrayHelper::map(CampusFacilities::find()->where(['status'=>1])->all(),'id','name');
            }

            public static function getGender()
            {
                return ['M' => 'Male', 'F'=>'Female'];
            }

            public static function getFullPartTime()
            {
                return [1 => 'Full Time', 2=>'Part Time'];
            }

            public static function getSpecialisationType()
            {
                return [1 => 'Single Specialisation', 2=>'Dual Specialisation'];
            }



            public static function getCourseLevel()
            {
                return [1 => 'Under Graduate',2=>'Post Graduate', 3=>'Post Masters', 4 =>'Advanced Masters', 5=>'Doctorate', 6=>'Post Doctorate', 7=>'After 10th'];
            }

//            public static function getExamLevel(){
//                return [1 => 'National Level Exam', 2=>'State Level Exam', 3 =>'Institute Level Exam'];
//            }

            public static function getExamMode(){
                return [1 => 'Online Mode', 2=>'Paper Based'];
            }


            public static function getPriority()
            {
                return [1 => 'Very High', 2=>'High', 3=>'Moderate', 4=>'low', 5=>'Very Low'];
            }

            public static function getInstitutionalCGPA(){
                return  [
                    "3.51–4.00" => "3.51 – 4.00",
                    "3.26–3.50" => "3.26 – 3.50",
                    "3.01–3.25" => "3.01 – 3.25",
                    "2.76–3.00" => "2.76 – 3.00",
                    "2.51–2.75" => "2.51 – 2.75",
                    "2.01–2.50" => "2.01 – 2.50",
                    "1.51–2.00" => "1.51 – 2.00",
                    "0-1.50" => "0 - 1.50"
                ];
            }

            public static function getNaacGrade(){
                return  [
                    "A++" => "A++",
                    "A+" => "A+",
                    "A" => "A",
                    "B++" => "B++",
                    "B+" => "B+",
                    "B" => "B",
                    "C" => "C",
                    "D" => "D"
                ];
            }

            public static function getPerformanceDescriptor(){
                return  [
                    1 => "Accredited",
                    2 => "Not Accredited"
                ];
            }

            public static function getAdvertisePossitionArray()
            {

                return $data = [
                    1 => "Main banner",
                    2 => "Featured Colleges",
                    6 => "Featured videos",
                    3 => "Sponsored colleges",
                    4 => "Bottom banner",
                    5 => "Top banner",
                    7 => "Left banner",
                    8 => "Right banner",
                    9 => "Middle banner",
                    10 => "Featured colleges",
                    11 => "Top Platinum",
                    12 => "Middle Gold",
                    13 => "Middle Silver",
                    14 => "Middle bronze",
                    15 => "Right floating",
                    16 => "Bottom featured",
                    17 => "Featured ads of colleges accepting the exam",
                    18 => "Right banners",
                    19 => "Bottom banner",
                    20 => "Top Banner",
                    21 => "Featured colleges offering the course",
                    22 => "Right banners",
                    23 => "Bottom banner",
                    24 => "Top Banner",
                    25 => "Right",
                    26 => "Top",
                ];

            }

            public static function getAdvertisePossition()
            {

                return $data = [
                    "Home page" => [
                        1 => "Main banner",
                        2 => "Featured Colleges",
                        6 => "Featured videos",
                        3 => "Sponsored colleges",
                        4 => "Bottom banner",
                    ],
                    "Inner pages - college/University" => [
                        5 => "Top banner",
                        7 => "Left banner",
                        8 => "Right banner",
                        9 => "Middle banner",
                        10 => "Featured colleges",
                    ],
                    "Landing pages - college/University" => [
                        11 => "Top Platinum",
                        12 => "Middle Gold",
                        13 => "Middle Silver",
                        14 => "Middle bronze",
                        15 => "Right floating",
                        16 => "Bottom featured",
                    ],
                    "Exam page" => [
                        17 => "Featured ads of colleges accepting the exam",
                        18 => "Right banners",
                        19 => "Bottom banner",
                        20 => "Top Banner",
                    ],
                    "Course page" => [
                        21 => "Featured colleges offering the course",
                        22 => "Right banners",
                        23 => "Bottom banner",
                        24 => "Top Banner",
                    ],
                    "General" => [
                        25 => "Right",
                        26 => "Top",
                    ]
                ];

       // return [1 => 'Top', 2=>'Bottom', 3=>'Left', 4=>'Right', 5=>'Center', 6=>'Video'];
            }


            public static function getCourseType()
            {
                return [1 => 'Autonomous', 2=>'Affiliated'];
            }

            public static function getCourseDuration()
            {
                return [
                    1=>'1 Day Workshop',
                    2=>'2 Days Workshop',
                    3=>'3 Days Workshop',
                    4=>'4 Days Workshop',
                    5=>'5 Days Workshop',
                    6=>'6 Days Workshop',
                    7=>'1 Week',
                    8=>'2 Weeks',
                    9=>'3 Weeks',
                    10=>'1 Month',
                    11=>'2 Months',
                    12=>'3 Months',
                    13=>'4 Months',
                    14=>'6 Months',
                    15=>'9 Months',
                    16=>'18 Months',
                    17=>'1 Year',
                    18=>'2 Years',
                    19=>'3 Years',
                    20=>'4 Years',
                    21=>'5 Years'
                ];
            }

            public static function getMedium()
            {
                return [
                0 => 'Afrikaans',
                1 => 'Albanian',
                2 => 'Amharic',
                3 => 'Arabic (Egyptian Spoken)',
                4 => 'Arabic (Levantine)',
                5 => 'Arabic (Modern Standard)',
                6 => 'Arabic (Moroccan Spoken)',
                7 => 'Arabic (Overview)',
                8 => 'Aramaic',
                9 => 'Armenian',
                10 => 'Assamese',
                11 => 'Aymara',
                12 => 'Azerbaijani',
                13 => 'Balochi',
                14 => 'Bamanankan',
                15 => 'Bashkort (Bashkir)',
                16 => 'Basque',
                17 => 'Belarusan',
                18 => 'Bengali',
                19 => 'Bhojpuri',
                20 => 'Bislama',
                21 => 'Bosnian',
                22 => 'Brahui',
                23 => 'Bulgarian',
                24 => 'Burmese',
                25 => 'Cantonese',
                26 => 'Catalan',
                27 => 'Cebuano',
                28 => 'Chechen',
                29 => 'Cherokee',
                30 => 'Croatian',
                31 => 'Czech',
                32 => 'Dakota',
                33 => 'Danish',
                34 => 'Dari',
                35 => 'Dholuo',
                36 => 'Dutch',
                37 => 'English',
                38 => 'Esperanto',
                39 => 'Estonian',
                40 => 'Éwé',
                41 => 'Finnish',
                42 => 'French',
                43 => 'Georgian',
                44 => 'German',
                45 => 'Gikuyu',
                46 => 'Greek',
                47 => 'Guarani',
                48 => 'Gujarati',
                49 => 'Haitian Creole',
                50 => 'Hausa',
                51 => 'Hawaiian',
                52 => 'Hawaiian Creole',
                53 => 'Hebrew',
                54 => 'Hiligaynon',
                55 => 'Hindi',
                56 => 'Hungarian',
                57 => 'Icelandic',
                58 => 'Igbo',
                59 => 'Ilocano',
                60 => 'Indonesian (Bahasa Indonesia)',
                61 => 'Inuit/Inupiaq',
                62 => 'Irish Gaelic',
                63 => 'Italian',
                64 => 'Japanese',
                65 => 'Jarai',
                66 => 'Javanese',
                67 => 'Kiche',
                68 => 'Kabyle',
                69 => 'Kannada',
                70 => 'Kashmiri',
                71 => 'Kazakh',
                72 => 'Khmer',
                73 => 'KhoekhoeKorean',
                74 => 'Kurdish',
                75 => 'Kyrgyz',
                76 => 'Lao',
                77 => 'Latin',
                78 => 'Latvian',
                79 => 'Lingala',
                80 => 'Lithuanian',
                81 => 'Macedonian',
                82 => 'Maithili',
                83 => 'Malagasy',
                84 => 'Malay (Bahasa Melayu)',
                85 => 'Malayalam',
                86 => 'Mandarin (Chinese)',
                87 => 'Marathi',
                88 => 'Mende',
                89 => 'Mongolian',
                90 => 'Nahuatl',
                91 => 'Navajo',
                92 => 'Nepali',
                93 => 'Norwegian'];
            }

            public static function getCDType()
            {
                return [
                    1=>'Degree',
                    2=>'Diploma',
                    3=>'Doctorate',
                    4=>'Apprenticeship',
                    5=>'Certification',
                    6=>'Vocational Degree'
                ];
            }

            public static function getNationalInternational()
            {
                return [1 => 'National', 2=>'International'];
            }

            public static function getNewsArtical()
            {
                return [1 => 'News', 2=>'Articals'];
            }
            public static function getUCE()
            {
                return [1 => 'University', 2=>'College', 3=>'Exam'];
            }

            public static function getAdvertisetype()
            {
                return [1 => 'University', 2=>'College', 3=>'Other'];
            }

            public static function getUniversitytype()
            {
                return [
                    1=>'Central University',
                    2=>'Central Open University',
                    3=>'Deemed University Government',
                    4=>'Deemed University Government Aided',
                    5=>'Deemed University Private',
                    6=>'Institute of National Importance',
                    7=>'Institution Under State Legislature Act',
                    8=>'State Private University',
                    9=>'State Open University',
                    10=>'State Private Open University',
                    11=>'State Public University'
//                    1 =>'Private University', 
//                    2=>'Public University', 
//                    3=>'State University',
//                    4=>'Central University',
//                    5=>'Deemed University', 
//                    6=>'Institution - Deemed-to-Be-a-University', 
//                    7=>'Institute of National Importance', 
//                    8=>'Autonomous Institute', 
//                    9=>'Open University',
                    
                ];
            }

            public static function getCollegetype()
            {
                return [1 => 'Autonomous', 2=>'Affiliated'];
            }



            public function getProgram(){
                $result = '';
                $model = Program::find()
                ->where(['status'=>1])
				->orderBy([ 'name' => SORT_ASC])
				// ->groupBy('name')
                ->all();

                if(!empty($model)){
                    $result = ArrayHelper::map($model, 'id', 'name');
                }

                return $result;
            }
            
            public function getCourse(){
                $result = '';
                $model = Courses::find()
                ->where(['status'=>1])
				->orderBy([ 'name' => SORT_ASC])
                ->all();
                if(!empty($model)){
                    $result = ArrayHelper::map($model, 'id', 'name');
                }

                return $result;
            }

            public function getExamCategory(){
                $result = '';
                $model = ExamCategory::find()
                ->orderBy([ 'name' => SORT_ASC])
                ->all();
                if(!empty($model)){
                    $result = ArrayHelper::map($model, 'id', 'name');
                }

                return $result;
            }


            public function getCreatenew($allowbyrole,$url = null, $label='Create New')
            {
              $roleid = Yii::$app->user->identity->roleID;
              if(in_array($roleid, $allowbyrole)){
                if($url){
                  return Html::a($label, [$url], ['class' => 'btn btn-success btn-xs']);
              }else{
                  return Html::a($label, ['create'], ['class' => 'btn btn-success btn-xs']);
              } 
          }
      }

      public function getRole()
      {
          return  ArrayHelper::map(Role::find()->where(['not in','id', [1]])->all(), 'id', 'name');
      }

      public static function getEncryptID($id)
      {
        return @CustomUrlRule::encryptor("encrypt",$id);
    }

    public static function getDecryptID($id)
    {
        return @CustomUrlRule::encryptor("decrypt",$id);
    }


    //ucType = university or college
    public function getUploadPath($ucType,$ucID,$fileType = ""){
        if($ucType == 1){
            $ucType = "university";
        } else if($ucType ==2) {
            $ucType = "advertise";
        }else if($ucType ==3) {
            $ucType = "masterFileUpload";
        }else{
            $ucType = "college";
        }

        $ucID = $this->getEncryptID($ucID);
        $uploadPath=Yii::getAlias('@webroot') .'/uploads/'.$ucType.'/'.$ucID.'/';

        if($fileType == 1){
            $uploadPath .= "images/";
        }elseif($fileType == 2){
            $uploadPath .= "videos/";
        }
        
        return $uploadPath;
    }

    public function getFileBasePath($ucType="",$ucID="",$fileType=""){
        if($ucType == 1){
            $ucType = "/university";
        }else if($ucType == 2){
            $ucType = "/college";
        } else if($ucType == 3) {
            $ucType = "/advertise";
        }
        
        if($ucID !=""){
            $ucID = "/".$this->getEncryptID($ucID);
        }

        if($fileType == 1){
            $fileType = "/images";
        }elseif($fileType == 2){
            $fileType = "/videos";
        }
        
        return Url::home(true).'uploads'.$ucType.$ucID.$fileType."/";
    }


    public function getUBrochureUploadPath($universityID){
        return $this->getUploadPath(1,$universityID)."brochure/";
    }

    public function getUBrochureBasePath($universityID){
        return $this->getFileBasePath(1,$universityID)."brochure/";
    }

    public function videoThumb($source,$destination){
        $direcotry = Yii::getAlias('@ffmpegPath');
        chdir($direcotry);
        $command = "./ffmpeg -y -i ".$source." -vframes 1   ".$destination." 2>&1";
        exec( $command, $output, $return_var );
       /* $command = "cd ".Yii::getAlias('@ffmpegPath')." && ./ffmpeg -y -i ".$source." -vframes 1   ".$destination." 2>&1";
       exec( $command, $output, $return_var );*/
        /*print_r($output);
        print_r($return_var);exit;*/
    }

    public function getCourseCode($code){
        return "C".str_pad($code, 4, '0', STR_PAD_LEFT);
    }
    public function getUniversityCode($code){
        return "U".str_pad($code, 4, '0', STR_PAD_LEFT);
    }
    public function getCollegeCode($code){
        return "C".str_pad($code, 4, '0', STR_PAD_LEFT);
    }

    public function getIndustrySector(){
        return ArrayHelper::map(IndustrySector::find()->select(['id','name'])->asArray()->all(),'id','name');
    }
    
    public static function getCountryCode() {
        return [
            1 =>'+0',
            2 =>'+1',
            3 =>'+1242',
            4 =>'+1246',
            5=>'+1264',
            6=>'+1268',
            7=>'+1284',
            8=>'+1340',
            9=>'+1345',
            10=>'+1441',
            11=>'+1473',
            12=>'+1649',
            13=>'+1664',
            14=>'+1670',
            15=>'+1671',
            16=>'+1684',
            17=>'+1721',
            18=>'+1758',
            19=>'+1767',
            20=>'+1784',
            21=>'+1787',
            22=>'+1809',
            23=>'+1829',
            24=>'+1849',
            25=>'+1868',
            26=>'+1869',
            27=>'+1939',
            28=>'+20',
            29=>'+211',
            30=>'+212',
            31=>'+213',
            32=>'+216',
            33=>'+218',
            34=>'+220',
            35=>'+221',
            36=>'+222',
            37=>'+223',
            38=>'+224',
            39=>'+225',
            40=>'+226',
            41=>'+227',
            42=>'+228',
            43=>'+229',
            44=>'+230',
            45=>'+231',
            46=>'+232',
            47=>'+233',
            48=>'+234',
            49=>'+235',
            50=>'+236',
            51=>'+237',
            52=>'+238',
            53=>'+239',
            54=>'+240',
            55=>'+241',
            56=>'+242',
            57=>'+243',
            58=>'+244',
            59=>'+245',
            60=>'+246',
            61=>'+248',
            62=>'+249',
            63=>'+250',
            64=>'+251',
            65=>'+252',
            66=>'+253',
            67=>'+254',
            68=>'+255',
            69=>'+256',
            70=>'+257',
            71=>'+258',
            72=>'+260',
            73=>'+261',
            74=>'+262',
            75=>'+263',
            76=>'+264',
            77=>'+265',
            78=>'+266',
            79=>'+267',
            80=>'+268',
            81=>'+269',
            82=>'+27',
            83=>'+290',
            84=>'+291',
            85=>'+297',
            86=>'+298',
            87=>'+299',
            88=>'+30',
            89=>'+31',
            90=>'+32',
            91=>'+33',
            92=>'+34',
            93=>'+350',
            94=>'+351',
            95=>'+352',
            96=>'+353',
            97=>'+354',
            98=>'+355',
            99=>'+356',
            100=>'+357',
            101=>'+358',
            102=>'+359',
            103=>'+36',
            104=>'+370',
            105=>'+371',
            106=>'+372',
            107=>'+373',
            108=>'+374',
            109=>'+375',
            110=>'+376',
            111=>'+377',
            112=>'+378',
            113=>'+379',
            114=>'+380',
            115=>'+381',
            116=>'+382',
            117=>'+383',
            118=>'+385',
            119=>'+386',
            120=>'+387',
            121=>'+389',
            122=>'+39',
            123=>'+40',
            124=>'+41',
            125=>'+420',
            126=>'+421',
            127=>'+423',
            128=>'+43',
            129=>'+44',
            130=>'+44-1481',
            131=>'+44-1534',
            132=>'+44-1624',
            133=>'+45',
            134=>'+46',
            135=>'+47',
            136=>'+48',
            137=>'+49',
            138=>'+500',
            139=>'+501',
            140=>'+502',
            141=>'+503',
            142=>'+504',
            143=>'+505',
            144=>'+506',
            145=>'+507',
            146=>'+508',
            147=>'+509',
            148=>'+51',
            149=>'+52',
            150=>'+53',
            151=>'+54',
            152=>'+55',
            153=>'+56',
            154=>'+57',
            155=>'+58',
            156=>'+590',
            157=>'+591',
            158=>'+592',
            159=>'+593',
            160=>'+594',
            161=>'+595',
            162=>'+596',
            163=>'+597',
            164=>'+598',
            165=>'+599',
            166=>'+60',
            167=>'+61',
            168=>'+62',
            169=>'+63',
            170=>'+64',
            171=>'+65',
            172=>'+66',
            173=>'+670',
            174=>'+672',
            175=>'+673',
            176=>'+674',
            177=>'+675',
            178=>'+676',
            179=>'+677',
            180=>'+678',
            181=>'+679',
            182=>'+680',
            183=>'+681',
            184=>'+682',
            185=>'+683',
            186=>'+685',
            187=>'+686',
            188=>'+687',
            189=>'+688',
            190=>'+689',
            191=>'+690',
            192=>'+691',
            193=>'+692',
            194=>'+7',
            195=>'+81',
            196=>'+82',
            197=>'+84',
            198=>'+850',
            199=>'+852',
            200=>'+853',
            201=>'+855',
            202=>'+856',
            203=>'+86',
            204=>'+876',
            205=>'+880',
            206=>'+886',
            207=>'+90',
            208=>'+91',
            209=>'+92',
            210=>'+93',
            211=>'+94',
            212=>'+95',
            213=>'+960',
            214=>'+961',
            215=>'+962',
            216=>'+963',
            217=>'+964',
            218=>'+965',
            219=>'+966',
            220=>'+967',
            221=>'+968',
            222=>'+970',
            223=>'+971',
            224=>'+972',
            225=>'+973',
            226=>'+974',
            227=>'+975',
            228=>'+976',
            229=>'+977',
            230=>'+98',
            231=>'+992',
            232=>'+993',
            233=>'+994',
            234=>'+995',
            235=>'+996',
            236=>'+998'
        ];
    }
    
    public static function getNAACGradeData() {
        return[
            1=>'A++',
            2=>'A+',
            3=>'A',
            4=>'B++',
            5=>'B+',
            6=>'B',
            7=>'C',
            8=>'D'
        ];
    }
    
    public static function getNAACGradeDataById($id) {
        $naac = [1=>'A++',
                2=>'A+',
                3=>'A',
                4=>'B++',
                5=>'B+',
                6=>'B',
                7=>'C',
                8=>'D'
        ];
        return (isset($id)&& !empty($id) && is_numeric ($id))? $naac[$id]:'';
    }
    
    public function getCertificationType(){
        $result = '';
        $model = \common\models\CourseType::find()
        ->where(['statue'=>1])
		->orderBy([ 'name' => SORT_ASC])
        ->all();
        if(!empty($model)){
            $result = ArrayHelper::map($model, 'id', 'name');
        }

        return $result;
    }
    
    public function getQualificationType(){
        $result = '';
        $model = CourseQualificationType::find()
        ->where(['statue'=>1])
		->orderBy([ 'name' => SORT_ASC])
        ->all();
        if(!empty($model)){
            $result = ArrayHelper::map($model, 'id', 'name');
        }

        return $result;
    }
    
    public function getCourseDurationType(){
        $result = '';
        $model = CourseDuration::find()
        ->where(['status'=>1])
		->orderBy([ 'name' => SORT_ASC])
        ->all();
        if(!empty($model)){
            $result = ArrayHelper::map($model, 'id', 'name');
        }

        return $result;
    }
    
    public function getCourseMediumTeaching(){
        $result = '';
        $model = CourseModeOfTeaching::find()
        ->where(['status'=>1])
		->orderBy([ 'name' => SORT_ASC])
        ->all();
        if(!empty($model)){
            $result = ArrayHelper::map($model, 'id', 'name');
        }

        return $result ? $result :'';
    }
    
    public function getExamLevel(){
        $result = '';
        $model = ExamLevel::find()
        ->where(['status'=>1])
		->orderBy([ 'name' => SORT_ASC])
        ->all();
        if(!empty($model)){
            $result = ArrayHelper::map($model, 'id', 'name');
        }

        return $result ? $result :'';
    }
    
    public function getCreatenewUrl($allowbyrole,$url = null, $label='Create New', $bannerId)
    {
       $roleid = Yii::$app->user->identity->roleID;
            if(in_array($roleid, $allowbyrole)){
              if($url){
                return Html::a($label, [$url , 'id' =>39,'usr'=>'11'], ['class' => 'btn btn-success btn-xs']);
            }else{
                return Html::a($label, ['create', 'bannerId' =>$bannerId], ['class' => 'btn btn-success btn-xs']);
            } 
        }
   }
   
   public function getProgramNameByName($name){
        $model = Program::find()
            ->select('id')    
            ->where(['status'=>1])
            ->andWhere('name LIKE :query')
            ->addParams([':query'=>'%'.$name.'%'])        
            ->orderBy([ 'name' => SORT_ASC])
            ->groupBy('name')
            ->one();
        if(!empty($model)){
            return $model['id'];
        }
    }
    
    public function getCertificationTypeByName($name){
        $model = \common\models\CourseType::find()
            ->select('id')    
            ->where(['statue'=>1])
            ->andWhere('name LIKE :query')
            ->addParams([':query'=>'%'.$name.'%'])
            ->orderBy([ 'name' => SORT_ASC])
            ->one();
        if(!empty($model)){
           return $model['id'];
        }
    }
    
    public function getQualificationTypeByName($name){
        $model = CourseQualificationType::find()
            ->select('id')    
            ->where(['statue'=>1])
            ->andWhere('name LIKE :query')
            ->addParams([':query'=>'%'.$name.'%'])
            ->orderBy([ 'name' => SORT_ASC])
            ->one();
        if(!empty($model)){
            return $model['id'];
        }
    }
    
    public function getCourseDurationTypeByName($name){
        $model = CourseDuration::find()
          ->select('id')    
            ->where(['status'=>1])
            ->andWhere('name LIKE :query')
            ->addParams([':query'=>'%'.$name.'%'])
            ->orderBy([ 'name' => SORT_ASC])
            ->one();
        if(!empty($model)){
            return $model['id'];
        }
    }
    
    public function getCourseMediumTeachingByName($name){
        $model = CourseModeOfTeaching::find()
         ->select('id')    
            ->where(['status'=>1])
            ->andWhere('name LIKE :query')
            ->addParams([':query'=>'%'.$name.'%'])
            ->orderBy([ 'name' => SORT_ASC])
            ->one();
        if(!empty($model)){
            return $model['id'];
        }
    }
    
    public function getOwnerShipDataByName($name) {
        $model = \common\models\CollegeOwnership::find()
         ->select('id')    
            ->where(['status'=>1])
            ->andWhere('name LIKE :query')
            ->addParams([':query'=>'%'.$name.'%'])
            ->orderBy([ 'name' => SORT_ASC])
            ->one();
        if(!empty($model)){
            return $model['id'];
        }
    }
    
}
