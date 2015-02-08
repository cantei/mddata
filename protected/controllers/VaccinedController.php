<?php
// action : Coverage  
// action : Viewage 
// action : FullVaccined  วัคซีนครบชุดแยกตามกลุ่มอายุ 
// action : CheckAge ตรวจสอบอายุขณะรับวัคซีน
// action : CheckLength  ตรวจสอบระยะห่างของการรับวัคซีนแต่ละครั้งในชนิดเดียวกัน
// action : Performance ผลการให้บริการรายชนิดวัคซีน
class VaccinedController extends Controller {
    public $layout = '//layouts/main';
    // public $cyear;
    // public $cmonth;
    
    
  /*  public function actionCoveragevillage($hospcode,$code,$codes)
    {
        //  http://localhost/web_project/vaccined/coveragevillage/hospcode/22/code/12/codes/12s
        
        echo $hospcode;
        // 22
        
        echo $_GET['hospcode'];
        // 22
        
        
        if(!empty($_GET['hospcode'])) // true ใช่ , false ไม่ใช่ไม่ว่า // false > true
        {
            echo 'มี';
        }else{
            echo 'ไม่มี';
        }
        
    } */
    
    // กำหนดค่าเริ่มต้น 
    public function init() {
        
        /*if(Yii::app()->user->detail->office_id == 1)
        {
            $this->redirect('performance');
        }else{
            $this->redirect('coverage');
        }
        
        parent::init();*/
    }
    
    
    // ความครอบคลุมการได้รับวัคซีนในเด็กอายุครบ 1 ปี
    // action นี้  ดูได้ทุกคน  ส่วน action อื่นๆ ต้องตรวจสอบผู้ใช้งาน
    public function actionCoverage() {
        
        $cyear=2015;
        $filtersForm = new FiltersForm();
        if (isset($_GET['FiltersForm']))
            $filtersForm->filters = $_GET['FiltersForm'];
        $sql = "SELECT t0.hoscode,t0.hosname
                    ,t1.target
                    ,t2.coverbcg
                    ,FORMAT((t2.coverbcg/t1.target*100),2) as percentbcg
                    ,t3.covermmr
                    ,FORMAT((t3.covermmr/t1.target*100),2) as percentmmr
                    ,t4.coverdhbv3
                    ,FORMAT((t4.coverdhbv3/t1.target*100),2) as percentdhbv3
                    ,t5.coveropv3 
                    ,FORMAT((t5.coveropv3 /t1.target*100),2) as percentopv3

                    FROM (
                    SELECT h.hoscode,h.hosname 
                    FROM chospital h
                    WHERE  h.provcode='67' AND h.distcode='01' AND h.hostype in('03','06')
                    GROUP BY h.hoscode 
                    ) as t0
                    LEFT JOIN 
                    (
                    SELECT concat($cyear,'-q01') as qreport,v.HOSPCODE,count(*) target
                    FROM tmp_fullvaccine v
                    WHERE v.BIRTH BETWEEN CONCAT($cyear-2,'-10-01') AND CONCAT($cyear-2,'-12-31') 
                    GROUP BY v.HOSPCODE
                    ) as t1 
                    ON t0.hoscode=t1.HOSPCODE
                    LEFT JOIN 
                    (
                    SELECT concat($cyear,'-q01') as qreport,v.HOSPCODE,count(*) coverbcg
                    FROM tmp_fullvaccine v
                    WHERE v.BIRTH BETWEEN CONCAT($cyear-2,'-10-01') AND CONCAT($cyear-2,'-12-31') 
                    AND NOT ISNULL(BCG)
                    AND  BCG <= DATE_ADD(BIRTH,INTERVAL 1 YEAR)
                    GROUP BY v.HOSPCODE
                    ) as t2 
                    ON t0.hoscode=t2.HOSPCODE
                    LEFT JOIN 
                    (
                    SELECT concat($cyear,'-q01') as qreport,v.HOSPCODE,count(*) covermmr
                    FROM tmp_fullvaccine v
                    WHERE v.BIRTH BETWEEN CONCAT($cyear-2,'-10-01') AND CONCAT($cyear-2,'-12-31') 
                    AND NOT ISNULL(MMR)
                    AND  MMR <= DATE_ADD(BIRTH,INTERVAL 1 YEAR)
                    GROUP BY v.HOSPCODE
                    ) as t3 
                    ON t0.hoscode=t3.HOSPCODE

                    LEFT JOIN 
                    (
                    SELECT concat($cyear,'-q01') as qreport,v.HOSPCODE,count(*) coverdhbv3
                    FROM tmp_fullvaccine v
                    WHERE v.BIRTH BETWEEN CONCAT($cyear-2,'-10-01') AND CONCAT($cyear-2,'-12-31') 
                    AND NOT ISNULL(DHB3)
                    AND  DHB3 <= DATE_ADD(BIRTH,INTERVAL 1 YEAR)
                    GROUP BY v.HOSPCODE
                    ) as t4
                    ON t0.hoscode=t4.HOSPCODE
                    LEFT JOIN 
                    (
                    SELECT concat($cyear,'-q01') as qreport,v.HOSPCODE,count(*) coveropv3
                    FROM tmp_fullvaccine v
                    WHERE v.BIRTH BETWEEN CONCAT($cyear-2,'-10-01') AND CONCAT($cyear-2,'-12-31') 
                    AND NOT ISNULL(OPV3)
                    AND  OPV3 <= DATE_ADD(BIRTH,INTERVAL 1 YEAR)
                    GROUP BY v.HOSPCODE
                    ) as t5
                    ON t0.hoscode=t5.HOSPCODE";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        $filtersData = $filtersForm->filter($rawData);
        $dataProvider = new CArrayDataProvider($filtersData, array(
            'keyField' => 'hoscode',
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
    
    public function actionCoverageVillage($hospcode=null) {

            $hospcode=$_GET['hospcode'];

            
            $sql = "SELECT t0.HOSPCODE,t0.VILLAGEID,t0.target
                        ,IFNULL(t1.getbcg,'0') as getbcg
                        ,IFNULL(t2.getmmr,'0') as getmmr
                        ,IFNULL(t3.getdhbv3,'0') as getdhbv3
                        ,IFNULL(t4.getopv3,'0') as getopv3
                        ,t0.target-(IFNULL(t1.getbcg,'0')) as missbcg
                        ,t0.target-(IFNULL(t2.getmmr,'0')) as missmmr
                        ,t0.target-(IFNULL(t3.getdhbv3,'0')) as missdhbv3
                        ,t0.target-(IFNULL(t4.getopv3,'0')) as missopv3
                        FROM (
                        SELECT t.HOSPCODE,t.VILLAGEID,count(pid) as target FROM tmp_fullvaccine t
                        WHERE  t.BIRTH BETWEEN '2012-10-01' AND '2013-09-30'
                        AND t.HOSPCODE =$hospcode

                        GROUP BY t.VILLAGEID
                        ) as t0
                        LEFT JOIN 
                        (
                        SELECT t.HOSPCODE,t.VILLAGEID,count(pid) as getbcg FROM tmp_fullvaccine t
                        WHERE  t.BIRTH BETWEEN '2012-10-01' AND '2013-09-30' 
                        AND ( DATEDIFF(t.BCG,t.BIRTH) < 366 or   ISNULL(DATEDIFF(t.BCG,t.BIRTH)))
                        AND NOT ISNULL(BCG)
                        AND t.HOSPCODE =$hospcode
                        GROUP BY t.VILLAGEID
                        ) as t1 
                        ON t0.HOSPCODE=t1.HOSPCODE AND t0.VILLAGEID=t1.VILLAGEID  
                        LEFT JOIN 
                        (
                        SELECT t.HOSPCODE,t.VILLAGEID,count(pid) as getmmr FROM tmp_fullvaccine t
                        WHERE  t.BIRTH BETWEEN '2012-10-01' AND '2013-09-30' 
                        AND ( DATEDIFF(t.MMR,t.BIRTH) < 366 or   ISNULL(DATEDIFF(t.MMR,t.BIRTH)))
                        AND NOT ISNULL(MMR)
                        AND t.HOSPCODE =$hospcode
                        GROUP BY t.VILLAGEID
                        ) as t2
                        ON t0.HOSPCODE=t2.HOSPCODE AND t0.VILLAGEID=t2.VILLAGEID  
                        LEFT JOIN 
                        (
                        SELECT t.HOSPCODE,t.VILLAGEID,count(pid) as getdhbv3 FROM tmp_fullvaccine t
                        WHERE  t.BIRTH BETWEEN '2012-10-01' AND '2013-09-30' 
                        AND ( DATEDIFF(t.DHB3,t.BIRTH) < 366 or   ISNULL(DATEDIFF(t.DHB3,t.BIRTH)))
                        AND NOT ISNULL(t.DHB3)
                        AND t.HOSPCODE =$hospcode
                        GROUP BY t.VILLAGEID
                        ) as t3
                        ON t0.HOSPCODE=t3.HOSPCODE AND t0.VILLAGEID=t3.VILLAGEID  
                        LEFT JOIN 
                        (
                        SELECT t.HOSPCODE,t.VILLAGEID,count(pid) as getopv3 FROM tmp_fullvaccine t
                        WHERE  t.BIRTH BETWEEN '2012-10-01' AND '2013-09-30' 
                        AND ( DATEDIFF(t.OPV3,t.BIRTH) < 366 or   ISNULL(DATEDIFF(t.OPV3,t.BIRTH)))
                        AND NOT ISNULL(t.OPV3)
                        AND t.HOSPCODE =$hospcode
                        GROUP BY t.VILLAGEID
                        ) as t4
                        ON t0.HOSPCODE=t4.HOSPCODE AND t0.VILLAGEID=t4.VILLAGEID  
                        LEFT JOIN cvillage v
                        ON t0.VILLAGEID=v.villagecodefull   ";
 
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        

            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'VILLAGEID', // as index id
                    'totalItemCount' => count( $rawData),
                    'pagination' => false,
            ));
            
            //echo $sql;
           // return;
            
           $this->render('coveragevillage', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            'hospcode'=>$hospcode,
               
               ));
    }
    
    // miss vaccine
    public function actionMissVaccine($hospcode=null,$VILLAGEID=null,$vaccinetype=null) {
    
        $hospcode=$_GET['hospcode'];
        $VILLAGEID=$_GET['VILLAGEID'];
        $vaccinetype=$_GET['vaccinetype'];
           
        $sql = "SELECT *
                        FROM tmp_fullvaccine t 
                        WHERE t.BIRTH BETWEEN '2012-10-01' AND '2013-09-30' 

                        AND t.HOSPCODE=$hospcode
                        AND t.VILLAGEID=  $VILLAGEID
                        AND  ISNULL(t. $vaccinetype)
                        GROUP BY t.HOSPCODE,t.VILLAGEID,t.PID ,t.PID";
 
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        
        $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'HOSPCODE', // as index id
                    'totalItemCount' => count( $rawData),
                    'pagination' => false,
        ));

        $this->render('missvaccine', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            'hospcode'=>$hospcode,
               
           ));
    }  

    // ผลการให้บริการวัคซีนรายชนิด  รายเข็ม  เลือกดูวันที่บริการได้
    // action นี้  ดูได้ทุกคน  ส่วน action อื่นๆ ต้องตรวจสอบผู้ใช้งาน
    public function actionPerformance($t1 = null, $t2 = null) {
         
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

    // รับวัคซีนครบชุด
    public function actionFullVaccined() {
	
        if(Yii::app()->user->isGuest)
        {
            $this->redirect(array('/site/login'));
        }  else   {
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

     
    public function actionAgeWarning($vaccinetype=null) {

         // check param
        if(!isset($_POST['vaccinetype'])){
            $vaccinetype='BCG';
            $msg="#หมายถึง ได้รับวัคซีน BCG ขณะอายุ น้อยกว่า 0 วัน#";
            $sql="SELECT v.HOSPCODE,h.hosname,count(*) n
                    FROM tmp_fullvaccine v
                    LEFT JOIN chospital h ON  v.HOSPCODE=h.hoscode
                    WHERE DATEDIFF($vaccinetype,BIRTH) < 0
                    GROUP BY HOSPCODE"; 
              
        }elseif ( $_POST['vaccinetype']=='010'  ) {
            $vaccinetype='BCG';
            $msg="#หมายถึง ได้รับวัคซีน BCG ขณะอายุ น้อยกว่า 0 วัน#";
              
            $sql="SELECT v.HOSPCODE,h.hosname,count(*) n
                    FROM tmp_fullvaccine v
                    LEFT JOIN chospital h ON  v.HOSPCODE=h.hoscode
                    WHERE DATEDIFF($vaccinetype,BIRTH) < 0
                    GROUP BY HOSPCODE";
        
        }elseif ( $_POST['vaccinetype']=='041'  ) {
            $vaccinetype='HB1';
            $msg="#หมายถึง ได้รับวัคซีน BCG ขณะอายุ น้อยกว่า 0 วัน#";
              
           $sql="SELECT v.HOSPCODE,h.hosname,count(*) n
                    FROM tmp_fullvaccine v
                    LEFT JOIN chospital h ON  v.HOSPCODE=h.hoscode
                    WHERE DATEDIFF($vaccinetype,BIRTH) < 0
                    GROUP BY HOSPCODE";
        
        }elseif ( $_POST['vaccinetype']=='091'  ) {
            $vaccinetype='DHB1';
            $msg="#หมายถึง ได้รับวัคซีน DHB1 ขณะอายุ น้อยกว่า 28 วัน#";
              
            $sql="SELECT v.HOSPCODE,h.hosname,count(*) n
                    FROM tmp_fullvaccine v
                    LEFT JOIN chospital h ON  v.HOSPCODE=h.hoscode
                    WHERE DATEDIFF($vaccinetype,BIRTH) < 28
                    GROUP BY HOSPCODE";
        }elseif ( $_POST['vaccinetype']=='061'  ) {
            $vaccinetype='MMR';
            $msg="#หมายถึง ได้รับวัคซีน MMR ขณะอายุ น้อยกว่า 228 วัน#";
              
           $sql="SELECT v.HOSPCODE,h.hosname,count(*) n
                    FROM tmp_fullvaccine v
                    LEFT JOIN chospital h ON  v.HOSPCODE=h.hoscode
                    WHERE DATEDIFF($vaccinetype,BIRTH) < 228
                    GROUP BY HOSPCODE";
        }elseif ( $_POST['vaccinetype']=='051'  ) {
            $vaccinetype='JE1';

            $msg="#หมายถึง ได้รับวัคซีน JE1 ขณะอายุ น้อยกว่า 366 วัน#";
              
            $sql="SELECT v.HOSPCODE,h.hosname,count(*) n
                    FROM tmp_fullvaccine v
                    LEFT JOIN chospital h ON  v.HOSPCODE=h.hoscode  
                    WHERE DATEDIFF($vaccinetype,BIRTH) < 366
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
        
        $this->render('agewarning', array(
          'dataProvider' => $dataProvider,
            // 'sql' => $sql,
            
            'vaccinetype'=>$vaccinetype,
            // 'msg'=>$msg,
            // 'vaccinename'=>$vaccinename,
            //'email'=>$email
          
      
        ));
     }
       
    // รับและไม่ได้รับวัคซีน  รายหมู่บ้าน 

    
    public function actionLenWarning() {
 
            $sql="SELECT HOSPCODE,hosname
                ,sum(if(lendhbv1 < 28 ,1,0)) as a1
                ,sum(if(lendhbv2 < 28 ,1,0)) as a2
                ,sum(if(lenje1 < 7 ,1,0)) as a3
                ,sum(if(lenje2 < 168 ,1,0)) as a4
                ,sum(if(lendtp < 168 ,1,0)) as a5
                FROM 
                (
                SELECT HOSPCODE,hosname,PID,CID,FNAME,lname,BIRTH,DHB1,DHB2,DHB3,JE1,JE2,JE3,DTP4,DTP5 
                ,DATEDIFF(DHB2,DHB1) as lendhbv1,DATEDIFF(DHB3,DHB2) as lendhbv2
                ,DATEDIFF(JE2,JE1) as lenje1,DATEDIFF(JE3,JE2) as lenje2
                ,DATEDIFF(DTP5,DTP4) as lendtp
                FROM tmp_fullvaccine 
                WHERE (((NOT ISNULL(DHB1) AND NOT ISNULL(DHB2)) OR (NOT ISNULL(DHB2) AND NOT ISNULL(DHB3))) 
                OR  ((NOT ISNULL(JE1) AND NOT ISNULL(JE2)) OR (NOT ISNULL(JE3) AND NOT ISNULL(JE2))) 
                OR  ((NOT ISNULL(DTP4) AND NOT ISNULL(DTP5)) ) 
                 ) 
                ) as t GROUP BY HOSPCODE";
              
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();
            $dataProvider = new CArrayDataProvider($rawData, array(
                'keyField' => 'HOSPCODE',
                'totalItemCount' => count($rawData),
                'pagination' => false,
                'sort' => array(
                //   'attributes' => array_keys($rawData[off_id])
            )
            ));
            $this->render('lenwarning', array(
                'dataProvider' => $dataProvider,
                'sql' => $sql,
      
            ));      
              
       
    }

        public function actionGetVillage($hospcode=null) {
    
            // GET  HOSCODE
           $hospcode=$_GET['hospcode'];
           // ยังไม่ได้เอาสถานะการจำหน่ายออก
            
            $sql = "";
 
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        

            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'VILLAGEID', // as index id
                    'totalItemCount' => count( $rawData),
                     'pagination' => false,
            ));
            
           $this->render('getvillage', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            //'startdate' => $startdate,
           // 'enddate' => $enddate
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

//            echo $startdate.'<br>';
//            echo $enddate.'<br>';
//            return;
        
            $HOSPCODE=$_GET['id'];
            $VACCINETYPE=$_GET['VACCINETYPE'];
            
            if (!empty($_POST['startdate_para']) and !empty($_POST['enddate_para'])) {
                    $startdate = $_POST['startdate_para'];
                    $enddate = $_POST['enddate_para'];           
            } else {
                    $cyear= date('Y');
                    $startdate = ($cyear-1).'-10-01';
                    $enddate = $cyear.'-09-30';
            }
            
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
     
     
    public function actionServiceHistory($HOSPCODE=null) {
    
           // GET  HOSCODE
           $HOSPCODE=$_GET['hospcode'];
           // ยังไม่ได้เอาสถานะการจำหน่ายออก
           
            $sql = "SELECT  p.PID,p.`NAME`,p.LNAME,h.VILLAGE
                        ,MIN(IF(e.VACCINETYPE='010',e.date_serv, NULL)) AS 'BCG'
                        ,MIN(IF(e.VACCINETYPE='041', e.date_serv, NULL)) AS 'HB1'
                        ,MIN(IF(e.VACCINETYPE='061', e.date_serv, NULL)) AS 'MMR'
                        ,MIN(IF(e.VACCINETYPE='091', e.date_serv, NULL)) AS 'DHBV1'
                        ,MIN(IF(e.VACCINETYPE='092', e.date_serv, NULL)) AS 'DHBV2'
                        ,MIN(IF(e.VACCINETYPE='093', e.date_serv, NULL)) AS 'DHBV3'
                        ,MIN(IF(e.VACCINETYPE='034', e.date_serv, NULL)) AS 'DTP4'
                        ,MIN(IF(e.VACCINETYPE='035', e.date_serv, NULL)) AS 'DTP5'
                        ,MIN(IF(e.VACCINETYPE='081', e.date_serv, NULL)) AS 'OPV1'
                        ,MIN(IF(e.VACCINETYPE='082', e.date_serv, NULL)) AS 'OPV2'
                        ,MIN(IF(e.VACCINETYPE='083', e.date_serv, NULL)) AS 'OPV3'
                        ,MIN(IF(e.VACCINETYPE='084', e.date_serv, NULL)) AS 'OPV4'
                        ,MIN(IF(e.VACCINETYPE='085', e.date_serv, NULL)) AS 'OPV5'
                        ,MIN(IF(e.VACCINETYPE='051', e.date_serv, NULL)) AS 'JE1'
                        ,MIN(IF(e.VACCINETYPE='052', e.date_serv, NULL)) AS 'JE2'
                        ,MIN(IF(e.VACCINETYPE='053', e.date_serv, NULL)) AS 'JE3'
                        FROM person p
                        LEFT JOIN home h
                        ON p.HOSPCODE=h.HOSPCODE AND p.HID=h.HID
                        LEFT JOIN epi e
                        ON p.HOSPCODE=e.HOSPCODE AND p.PID=e.PID 
                        WHERE	 p.BIRTH BETWEEN '2012-10-01' AND '2013-09-30'
                        AND p.TYPEAREA in ('1','3')
                        AND p.HOSPCODE =$HOSPCODE
                        GROUP BY p.PID
                        ORDER BY p.PID ";

            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        

            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'PID', // as index id
                    'totalItemCount' => count( $rawData),
                     'pagination' => false,
            ));
            
            //echo $sql;
           // return;
            
           $this->render('servicehistory', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            'HOSPCODE'=>$HOSPCODE,
               
           ));
    }
    
    
   
    
}
?>

