<?php
// action : Coverage  
// action : Viewage 
// action : FullVaccined  วัคซีนครบชุดแยกตามกลุ่มอายุ 
// action : CheckAge ตรวจสอบอายุขณะรับวัคซีน
// action : CheckLength  ตรวจสอบระยะห่างของการรับวัคซีนแต่ละครั้งในชนิดเดียวกัน
// action : Performance ผลการให้บริการรายชนิดวัคซีน
class VaccinedController extends Controller {

    public $cyear;
    public $cmonth;
    
    public function actionTest1(){
        echo "test roting";
    }


    public function actionCoverage() {
        $cyear='2015';
        $filtersForm = new FiltersForm();
        if (isset($_GET['FiltersForm']))
            $filtersForm->filters = $_GET['FiltersForm'];
        $sql = "SELECT CONCAT($cYear-1,'-10-01') as startbirth
                    ,CONCAT($cYear-1,'-12-31') as endbirth
                    ,HOSPCODE,hosname
                    ,count(*) as target
                    ,sum(if(NOT ISNULL(BCG),1,0)) as cover_bcg
                    ,sum(if(NOT ISNULL(MMR),1,0)) as cover_mmr
                    ,sum(if(NOT ISNULL(DHB3),1,0)) as cover_dhbv2
                    ,sum(if(NOT ISNULL(OPV3),1,0)) as cover_opv3
                FROM tmp_fullvaccine 
                WHERE BIRTH BETWEEN CONCAT($cYear-2,'-10-01') AND CONCAT($cYear-2,'-12-31')
                AND t.BCG <= DATE_ADD(BIRTH,INTERVAL 1 year)
                AND t.DHB3 <= DATE_ADD(BIRTH,INTERVAL 1 year)
                AND t.OPV3 <= DATE_ADD(BIRTH,INTERVAL 1 year)
                AND t.MMR <= DATE_ADD(BIRTH,INTERVAL 1 year)
                                GROUP BY HOSPCODE";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        $filtersData = $filtersForm->filter($rawData);
        $dataProvider = new CArrayDataProvider($filtersData, array(
            'keyField' => 'Tambon',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
                'attributes' => array_keys($rawData[0])
            )
        ));
        $this->render('coverage', array(
            'dataProvider' => $dataProvider,
            'filtersForm' => $filtersForm,
            'sql' => $sql
        ));
    }

    public function actionFullVaccined() {
	/*
        $off_id=Yii::app()->user->detail->office_id;
        if(Yii::app()->user->isGuest)
        {
            $this->redirect(array('/site/login'));
			
	*/
//        }  elseif (!Yii::app()->user->isGuest) 
//            {
//                print( Yii::app()->user->detail->level_user);
//            
//       // }elseif($off_id!=null)  
//        //{
//          // print( $off_id);
		if(Yii::app()->user->isGuest)
        {
            $this->redirect(array('/site/login'));
        } 
        else     
        {
        $filtersForm = new FiltersForm();
        if (isset($_GET['FiltersForm']))
            $filtersForm->filters = $_GET['FiltersForm'];

        if (!empty($_POST['startdate_para']) and !empty($_POST['enddate_para'])) {
            $startdate = $_POST['startdate_para'];
            $enddate = $_POST['enddate_para'];
            //  $sql = "select * FROM tmp_epi_4audit 
            //    WHERE birth between  '$startdate_params' and  '$enddate_params' limit 10 ";
             $sql = "select * FROM tmp_epi_4audit 
                    WHERE birth between  '$startdate' and  '$enddate' limit 10 ";
        } else {
            $cMonth = date("m");
            // $cMonth = 04;
            $cYear = date("Y");

            // $cYear = 2014;
            if ($cMonth > 0 && $cMonth <= 3) {
                // $setdate = "BETWEEN '".($cYear-2)."-10-01' AND  ' ".($cYear-2)."-12-31'";
                $startdate = "'" . ($cYear - 2) . "-10-01'";
                $enddate = "'" . ($cYear - 2) . "-12-31'";
            } elseif ($cMonth >= 4 && $cMonth <= 6) {
                // $setdate = "BETWEEN '".($cYear-1)."-01-01' AND  ' ".($cYear-1)."-03-31'";
                $startdate = "'" . ($cYear - 1) . "-01-01'";
                $enddate = "'" . ($cYear - 1) . "-03-31'";
            } elseif ($cMonth >= 7 && $cMonth <= 9) {
                // $setdate = "BETWEEN '".($cYear-1)."-04-01' AND  ' ".($cYear-1)."-06-30'";
                $startdate = "'" . ($cYear - 1) . "-04-01'";
                $enddate = "'" . ($cYear - 1) . "-06-30'";
            } elseif ($cMonth >= 10 && $cMonth <= 12) {
                // $setdate = "BETWEEN '".($cYear-1)."-07-01' AND  ' ".($cYear-1)."-09-30'";
                $startdate = "'" . ($cYear - 1) . "-07-01'";
                $enddate = "'" . ($cYear - 1) . "-09-30'";
            }
            // else
            //  $setdate = "non match";
             $sql = "select * FROM tmp_epi_4audit 
                    WHERE birth between  $startdate and  $enddate limit 10 ";
        }

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        $filtersData = $filtersForm->filter($rawData);
        $dataProvider = new CArrayDataProvider($filtersData, array(
            'keyField' => 'off_id',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
            //   'attributes' => array_keys($rawData[off_id])
            )
        ));
        $this->render('fullvaccined', array(
            'dataProvider' => $dataProvider,
            'filtersForm' => $filtersForm,
            'sql' => $sql,
                // 'enddate_params'=>$enddate_params,
                 //'setdate'=>$setdate
                'startdate' => $startdate,
                'enddate' => $enddate
        ));
        }
    }
    
     public function actionViewage($vacctype=null) {
         
          if(!isset($_GET['vacctype'])){
             
             $sql="SELECT HOSPCODE,count(*) n FROM epi  GROUP BY HOSPCODE"; 
              
          }  else {
           $vacctype=$_GET['vacctype'];
           $sql="SELECT HOSPCODE,count(*) n FROM epi WHERE VACCINETYPE =$vacctype GROUP BY HOSPCODE";
          }
          
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();
            $dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
            //   'attributes' => array_keys($rawData[off_id])
            )
        ));
        $this->render('test', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
      
        ));
     }
     
     public function actionCheckAge($vacctype=null) {
         
        // GET off_id 
        /*
				if (Yii::app()->user->isGuest) {
                   print("not logged");
				} else {
                  // print(Yii::app()->user->email);
                   print("u r logged, id is ". Yii::app()->user->id).'<br>';
                   print("Your office_id is" . Yii::app()->user->detail->office_id).'<br>';
                   print("Your level is" . Yii::app()->user->detail->level_user).'<br>';
                   print("Your email is  " . Yii::app()->user->detail->email);
                   //  print("Your ID is" . Yii::app()->user->email);  
				}
		*/
         // check param
          if(!isset($_POST['vacctype'])){
             $msg='';
              $vaccname='';
             $sql="SELECT HOSPCODE,count(*) n FROM epi  
			 
			 GROUP BY HOSPCODE"; 
              
          }elseif ( $_POST['vacctype']=='010'  ) {
              $vacctype='010';
              $vaccname='(BCG)';
              $msg="#หมายถึง ได้รับวัคซีน BCG ขณะอายุ น้อยกว่า 0 วัน#";
              
            $sql="SELECT HOSPCODE,HNAME,count(*) n FROM (
                            SELECT e.HOSPCODE,o.off_name as HNAME,e.PID,e.VACCINETYPE,e.DATE_SERV,p.BIRTH,
                            DATEDIFF(e.DATE_SERV,p.BIRTH) as age
                            FROM person p 
                            LEFT JOIN epi e
                            ON e.HOSPCODE=p.HOSPCODE AND e.PID=p.PID 
														LEFT JOIN co_office o
							ON p.HOSPCODE=o.off_id 
                            WHERE e.VACCINETYPE='010'
                            HAVING age < 0 
                            ) as t
                            GROUP BY HOSPCODE";
                   
}elseif ( $_POST['vacctype']=='041'  ) {
            $vacctype='041';
            $vaccname='วัคซีน DHB1';
             $msg="#หมายถึง ได้รับวัคซีน DHB1 ขณะอายุ น้อยกว่า 228 วัน#";
            $sql="SELECT HOSPCODE,HNAME,count(*) n FROM (
                            SELECT e.HOSPCODE,o.off_name as HNAME,e.PID,e.VACCINETYPE,e.DATE_SERV,p.BIRTH,
                            DATEDIFF(e.DATE_SERV,p.BIRTH) as age
                            FROM person p 
                            LEFT JOIN epi e
                            ON e.HOSPCODE=p.HOSPCODE AND e.PID=p.PID 
							LEFT JOIN co_office o
							ON p.HOSPCODE=o.off_id 
                            WHERE e.VACCINETYPE=$vacctype
                            HAVING age < 0 
                            ) as t
                            GROUP BY HOSPCODE";
                   
        }elseif ( $_POST['vacctype']=='061'  ) {
            $vacctype='061';
            $vaccname='วัคซีน MMR';
             $msg="#หมายถึง ได้รับวัคซีน MMR ขณะอายุ น้อยกว่า 228 วัน#";
            $sql="SELECT HOSPCODE,HNAME,count(*) n FROM (
                            SELECT e.HOSPCODE,o.off_name as HNAME,e.PID,e.VACCINETYPE,e.DATE_SERV,p.BIRTH,
                            DATEDIFF(e.DATE_SERV,p.BIRTH) as age
                            FROM person p 
                            LEFT JOIN epi e
                            ON e.HOSPCODE=p.HOSPCODE AND e.PID=p.PID 
							LEFT JOIN co_office o
							ON p.HOSPCODE=o.off_id 
                            WHERE e.VACCINETYPE=$vacctype
                            HAVING age < 0 
                            ) as t
                            GROUP BY HOSPCODE";
                   
        }elseif ( $_POST['vacctype']=='051'  ) {
            $vacctype='051';
            $vaccname='JE1';
            $msg="#หมายถึง ได้รับวัคซีน MMR ขณะอายุ น้อยกว่า 1 ปี#";
            $sql="SELECT HOSPCODE,HNAME,count(*) n FROM (
                            SELECT e.HOSPCODE,o.off_name as HNAME,e.PID,e.VACCINETYPE,e.DATE_SERV,p.BIRTH,
                            DATEDIFF(e.DATE_SERV,p.BIRTH) as age
                            FROM person p 
                            LEFT JOIN epi e
                            ON e.HOSPCODE=p.HOSPCODE AND e.PID=p.PID 
							LEFT JOIN co_office o
							ON p.HOSPCODE=o.off_id 
                            WHERE e.VACCINETYPE=$vacctype
                            HAVING age < 0 
                            ) as t
                            GROUP BY HOSPCODE";
        }      
        
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
            //  'attributes' => array_keys($rawData[off_id])
            ),
            )
        );
        
        $this->render('checkage', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            
            'vacctype'=>$vacctype,
            'msg'=>$msg,
            'vaccname'=>$vaccname,
            //'email'=>$email
          
      
        ));
     }
     public function actionPerformance($t1 = null, $t2 = null) {
         //echo "test routing";
         //return;
         $sql="";
         //$sql = "...ไม่มีวันที่...";
         
        if (!empty($_POST['startdate_para']) and !empty($_POST['enddate_para'])) {
            $startdate = $_POST['startdate_para'];
            $enddate = $_POST['enddate_para'];
           
        } else {
            
            
            $cyear= date('Y');
            $startdate = ($cyear-1).'-10-01';
            $enddate = $cyear.'-09-30';
            $_POST['startdate_para']=  $startdate ;
            $_POST['enddate_para']=  $enddate ;
        }
                      $sql =  "SELECT HOSPCODE,HNAME
                        ,sum(if(VACCINETYPE='010',1,0)) as BCG
                        ,sum(if(VACCINETYPE='041',1,0)) as HBV1
                        -- ,sum(if(VACCINETYPE='031',1,0)) as DTP1
                        ,sum(if(VACCINETYPE='091',1,0)) as DHB1
                        ,sum(if(VACCINETYPE='092',1,0)) as DHB2
                        ,sum(if(VACCINETYPE='093',1,0)) as DHB3
                        ,sum(if(VACCINETYPE='034',1,0)) as  DTP4
                        ,sum(if(VACCINETYPE='035',1,0)) as  DTP5
                        ,sum(if(VACCINETYPE='081',1,0)) as OPV1
                        ,sum(if(VACCINETYPE='082',1,0)) as OPV2
                        ,sum(if(VACCINETYPE='083',1,0)) as OPV3
                        ,sum(if(VACCINETYPE='084',1,0)) as OPV4
                        ,sum(if(VACCINETYPE='085',1,0)) as OPV5
                        ,sum(if(VACCINETYPE='061',1,0)) as MMR1
                        ,sum(if(VACCINETYPE='051',1,0)) as  JE1
                        ,sum(if(VACCINETYPE='052',1,0)) as  JE2
                        ,sum(if(VACCINETYPE='053',1,0)) as  JE3
                        FROM (
                        SELECT p.HOSPCODE,o.off_shortname as HNAME,p.pid,p.cid,p.birth,p.typearea
                        ,e.VACCINETYPE,e.DATE_SERV,e.VACCINEPLACE
                        FROM person p
                        LEFT JOIN  epi e
                        ON e.HOSPCODE=p.HOSPCODE AND e.pid=p.pid 
                        LEFT JOIN co_office o
                        ON e.HOSPCODE=o.off_id 
                        WHERE  	(e.DATE_SERV BETWEEN  '$startdate' AND '$enddate')
                        AND e.HOSPCODE=e.VACCINEPLACE 
                        GROUP BY p.PID,e.vaccinetype,e.vaccineplace
                        ) as t
                        GROUP BY HOSPCODE
                        UNION 
                        SELECT '' as HOSPCODE,'Total' as HNAME,sum(BCG),sum(HBV1),sum(DHB1),sum(DHB2),sum(DHB3),sum(DTP4),sum(DTP5),sum(OPV1),sum(OPV2),sum(OPV3),sum(OPV4),sum(OPV5) 
                        ,sum(MMR1),sum(JE1),sum(JE2),sum(JE3)
                        FROM (
                        SELECT concat(HOSPCODE,' - ',HNAME) as HOSPNAME
                        ,sum(if(VACCINETYPE='010',1,0)) as BCG
                        ,sum(if(VACCINETYPE='041',1,0)) as HBV1
                        ,sum(if(VACCINETYPE='091',1,0)) as DHB1
                        ,sum(if(VACCINETYPE='092',1,0)) as DHB2
                        ,sum(if(VACCINETYPE='093',1,0)) as DHB3
                        ,sum(if(VACCINETYPE='034',1,0)) as  DTP4
                        ,sum(if(VACCINETYPE='035',1,0)) as  DTP5
                        ,sum(if(VACCINETYPE='081',1,0)) as OPV1
                        ,sum(if(VACCINETYPE='082',1,0)) as OPV2
                        ,sum(if(VACCINETYPE='083',1,0)) as OPV3
                        ,sum(if(VACCINETYPE='084',1,0)) as OPV4
                        ,sum(if(VACCINETYPE='085',1,0)) as OPV5
                        ,sum(if(VACCINETYPE='061',1,0)) as MMR1
                        ,sum(if(VACCINETYPE='051',1,0)) as  JE1
                        ,sum(if(VACCINETYPE='052',1,0)) as  JE2
                        ,sum(if(VACCINETYPE='053',1,0)) as  JE3
                        FROM (
                        SELECT p.HOSPCODE,o.off_shortname as HNAME,p.pid,p.cid,p.birth,p.typearea
                        ,e.VACCINETYPE,e.DATE_SERV,e.VACCINEPLACE
                        FROM person p
                        LEFT JOIN   epi e
                        ON e.HOSPCODE=p.HOSPCODE AND e.pid=p.pid 
                        LEFT JOIN co_office o
                        ON e.HOSPCODE=o.off_id 
                        WHERE 	(e.DATE_SERV BETWEEN  '$startdate' AND '$enddate')
                        AND e.HOSPCODE=e.VACCINEPLACE 
                        GROUP BY p.PID,e.vaccinetype,e.vaccineplace
                        ) as t
                        GROUP BY HOSPCODE
                        ) as t2";
        
        // echo $sql;
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        //print_r($rawData);
        // $filtersData = $filtersForm->filter($rawData);

        $dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
                'attributes' => count($rawData) > 0 ? array_keys($rawData[0]) : ''
            )
        ));

        $this->render('performance', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            'startdate' => $startdate,
            'enddate' => $enddate
        ));
    }
    
    public function actionStatus() {
       
            if (Yii::app()->user->detail->office_id==null)
                echo $error['message'];
            else
                $this->render('error', $error);
        
         // GET off_id 
        $office_id=Yii::app()->user->detail->office_id;
               if (!isset($office_id)) {
                   print("hello  guest");
                   
                       //throw new CHttpException(403, 'You are not authorized to perform this action.');
                    // throw new CHttpException(404, 'HTTPNotFound ไม่พบไฟล์');
                // throw new CHttpException(404,'The requested page does not exist.');
               } else {
                        print("Your office_id is" . Yii::app()->user->detail->office_id).'<br>';
                        print("Your email is  " . Yii::app()->user->detail->email);
                   
               }
               $this->render('ustatus');
        }
	public function actionViewDetail($hospcode,$vactype,$startdate,$enddate) {
//            echo($hospcode).'<br>';
//            echo $vactype.'<br>';
//            echo $startdate.'<br>';
//            echo $enddate.'<br>';
           // return;
            /*
            
            
            $HOSPCODE=$_GET['id'];
            $VACCINETYPE=$_GET['VACCINETYPE'];
           if (!empty($_POST['startdate_para']) and !empty($_POST['enddate_para'])) {
            $startdate = $_POST['startdate_para'];
            $enddate = $_POST['enddate_para'];
           
            } else {
            $cyear= date('Y');
            $startdate = ($cyear-1).'-10-01';
            $enddate = $cyear.'-09-30';
            }*/
            
             $sql="SELECT p.HOSPCODE,o.off_shortname as HNAME,p.PID,p.CID,p.name as FNAME,p.LNAME,p.BIRTH,p.TYPEAREA
                        ,e.VACCINETYPE,e.DATE_SERV,e.VACCINEPLACE
                        FROM person p  
                        LEFT JOIN epi e
                        ON e.HOSPCODE=p.HOSPCODE AND e.pid=p.pid 
                        LEFT JOIN co_office o
                        ON e.HOSPCODE=o.off_id 
                        WHERE  p.HOSPCODE='$hospcode' AND
                        (e.DATE_SERV BETWEEN  '$startdate' AND '$enddate') AND 
			VACCINETYPE='$vactype' AND 
			e.HOSPCODE=e.VACCINEPLACE 
                        GROUP BY p.PID,e.vaccinetype,e.vaccineplace"; 
          
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();
            $dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
      
            )
        ));
        $this->render('viewdetail', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            'hospcode'=>$hospcode
      
        ));
     }
}
?>