<?php
class LabfuController extends Controller {

    public $layout = '//layouts/content';


       // หน้าแรก ภาพรวม สำหรับ member และ VIP  
       // GET HOSPCODE
        public function actionIndex(){
            $sql = "SELECT p.HOSPCODE,p.PID,p.PRENAME,p.`NAME`,p.LNAME,p.CID,p.SEX,round((DATEDIFF(CURDATE(),p.BIRTH)/365.25),0) as age 
                        -- ,p.HN
                        ,l.DATE_SERV,l.SEQ
                        ,max(if(l.LABTEST='01' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab01
                        ,max(if(l.LABTEST='02' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL))as lab02
                        ,max(if(l.LABTEST='03' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL))as lab03
                        ,max(if(l.LABTEST='04' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab04
                        ,max(if(l.LABTEST='05' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL))as lab05
                        ,max(if(l.LABTEST='06' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab06
                        ,max(if(l.LABTEST='07' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab07
                        ,max(if(l.LABTEST='08' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab08
                        ,max(if(l.LABTEST='09' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab09
                        ,max(if(l.LABTEST='10' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab10
                        ,max(if(l.LABTEST='11' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab11
                        ,max(if(l.LABTEST='12' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab12
                        ,max(if(l.LABTEST='13' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab13
                        ,max(if(l.LABTEST='14' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab14
                        ,max(if(l.LABTEST='15' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab15
                        ,max(if(l.LABTEST='16' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab16
                        ,max(if(l.LABTEST='17' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab17
                        ,max(if(l.LABTEST='18' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab18
                        ,max(if(l.LABTEST='19' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab19
                        ,max(if(l.LABTEST='20' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab20
                        ,max(if(l.LABTEST='21' AND NOT ISNULL(l.LABRESULT),l.LABRESULT,NULL)) as lab21
                        FROM  labfu l
                        LEFT JOIN co_labfu c
                        ON l.LABTEST=c.id
                        LEFT JOIN service s
                        ON l.HOSPCODE=s.HOSPCODE AND l.PID=s.PID AND l.SEQ=s.SEQ 
                        LEFT JOIN person p
                        ON l.HOSPCODE=p.HOSPCODE AND l.PID=p.PID 
                        -- WHERE p.CID='3101401163002' AND l.DATE_SERV='2014-02-07'
                        WHERE NOT ISNULL(p.`NAME`)
                        AND p.HOSPCODE='10727'
                        GROUP BY p.HOSPCODE,p.PID,p.CID,l.DATE_SERV,SEQ
                        ORDER BY l.DATE_SERV DESC ";
                            
            $rawData = Yii::app()->db->createCommand($sql); //or use ->queryAll(); in CArrayDataProvider
            $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar(); //the count

 
            $model = new CSqlDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'HOSPCODE', // as index id
                    'totalItemCount' => $count,
                    //if the command above use PDO parameters
                    //'params'=>array(
                    //':param'=>$param,
                    //),
                    'sort' => array(
                        'attributes' => array(
                            'HOSPCODE','PID'
                        ),
                        'defaultOrder' => array(
                            'HOSPCODE' => CSort::SORT_ASC, //default sort value
                        ),
                    ),
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));
 
            $this->render('index', array(
                'model' => $model,
            ));
            
        }
        
        // ผลการตรวจ HbA1C ครั้งล่าสุด 
        public function actionHba1c() {
        // $this->layout = '//layouts/content';
        // ภาพรวม รายหน่วยบริการ 
        // ยังไม่ได้เอาสถานะการจำหน่ายออก
        // GET  วันที่ตรวจ HbA1C
        $sql = "SELECT 
                            o.off_id as HOSPCODE,o.off_name as HNAME
                            ,t0.nDM
                            ,sum(if((t1.LABRESULT > 0),1,0)) as TOTAL 
                            ,round((sum(if((t1.LABRESULT > 0),1,0))/t0.nDM*100),2)  as percent1
                            ,sum(if((t1.LABRESULT < 7 ),1,0)) as LOWRISK
                            ,round(((sum(if((t1.LABRESULT < 7 ),1,0))/sum(if((t1.LABRESULT > 0),1,0)))*100),2) as percent2

                            ,sum(if((t1.LABRESULT BETWEEN 7 and 100),1,0)) as ATRISK
                            ,round(((sum(if((t1.LABRESULT BETWEEN 7 and 100),1,0))/sum(if((t1.LABRESULT > 0),1,0)))*100),2) as percent3
                            FROM co_office o
                            LEFT JOIN 
                            (
                            SELECT HOSPCODE,sum(if(NOT ISNULL(DM_DX_ASC),1,0 )) as nDM FROM tmp_me_chronic GROUP BY HOSPCODE
                            ) t0
                            ON o.off_id=t0.HOSPCODE 
                            LEFT JOIN 
                            (
                            SELECT p.HOSPCODE,p.PID,p.CID,p.SEX,YEAR( FROM_DAYS(DATEDIFF(CURDATE(),BIRTH))) as age 
                            ,GROUP_CONCAT(l.DATE_SERV ORDER BY l.DATE_SERV DESC   SEPARATOR ',' ) as LABDATE
                            ,GROUP_CONCAT(l.labresult ORDER BY l.DATE_SERV DESC  SEPARATOR ',' ) as LABRESULT
                            FROM  tmp_me_chronic p 
                            LEFT JOIN labfu l
                            ON l.HOSPCODE=p.HOSPCODE AND l.PID=p.PID 
                            LEFT JOIN co_labfu c
                            ON l.LABTEST=c.labcode
                            LEFT JOIN service s
                            ON l.HOSPCODE=s.HOSPCODE AND l.PID=s.PID AND l.SEQ=s.SEQ 
                            WHERE NOT ISNULL(p.DM_DX_ASC) 										AND  l.labtest='05'  
                            GROUP BY p.HOSPCODE,p.PID
                            HAVING substr(LABDATE,1,10) BETWEEN '2013-10-01' AND '2014-09-30'
                            ) as t1
                            ON t0.hospcode=t1.hospcode
                            WHERE o.distid='6701' AND o.off_type in ('03','06')
                            GROUP BY o.off_id";

        $rawData = Yii::app()->db->createCommand($sql)->queryAll(); // in CArrayDataProvider        
// print_r($rawData);
// return;
        $dataProvider = new CArrayDataProvider($rawData, array(//or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
            'keyField' => 'HOSPCODE', // as index id
            'totalItemCount' => count($rawData),
            'pagination' => false,
        ));

        $this->render('hba1cpcu', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
                // 'pid'=>$pid,
        ));
        }

        // ทะเบียนผู้ป่วยเบาหวาน 
        public function actionRegdm($HOSPCODE=null) {
    
            // GET  HOSCODE
           $HOSPCODE=$_GET['hospcode'];
           // ยังไม่ได้เอาสถานะการจำหน่ายออก
            
            $sql = "SELECT p.PID,p.CID,p.`NAME`,p.LNAME,p.SEX,p.BIRTH
                        ,round((DATEDIFF(CURDATE(),p.BIRTH)/365.25),0) as AGE 
                        ,p.DM_DX_ASC
                        ,substr(p.DM_DATEDX_ASC,1,10) as FIRSTDx
                        ,(if((NOT ISNULL(p.HT_DX_ASC)),p.HT_DX_ASC,NULL)) as DMWITHHT
                        ,(if((NOT ISNULL(p.OTHER_DX_ASC)),p.OTHER_DX_ASC,NULL)) as DMWITHOTHER
                        FROM  tmp_me_chronic p 
                        WHERE p.HOSPCODE='$HOSPCODE' 
                        AND  NOT ISNULL(p.DM_DX_ASC)";
 
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        

            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'PID', // as index id
                    'totalItemCount' => count( $rawData),
                      // 'pagination' => false,
            ));
            
           $this->render('regdm', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
               'HOSPCODE'=>$HOSPCODE,
               
               ));
        }
        
        // ประวัติการตรวจแล็ปทุกชนิด  รายบุคคล
        public function actionLabfuHistory($PID=null){
            
        }
        
        //  ผลการตรวจ HbA1C ครั้งล่าสุด รายบุคคล
        public function actionLastHba1c($HOSPCODE=null) {
    
           // GET  HOSCODE
           $HOSPCODE=$_GET['hospcode'];
           // ยังไม่ได้เอาสถานะการจำหน่ายออก
            
            $sql = "SELECT p.PID,p.CID,p.`NAME`,p.LNAME,p.SEX,p.BIRTH 
                        ,round((DATEDIFF(CURDATE(),p.BIRTH)/365.25),0) as AGE
                         ,p.DM_DX_ASC,substr(p.DM_DATEDX_ASC,1,10) as LASTDx
                         ,(if((NOT ISNULL(p.HT_DX_ASC)),'HT',NULL)) as DMWITHHT 
                        ,(if((NOT ISNULL(p.OTHER_DX_ASC)),'OTHER',NULL)) as DMWITHOTHER
                        ,l.DATE_SERV,l.LABRESULT 
                        FROM tmp_me_chronic p 
                        LEFT JOIN labfu l
                        ON p.HOSPCODE=l.HOSPCODE and	p.PID=l.PID 
                        WHERE p.HOSPCODE='$HOSPCODE' AND NOT ISNULL(p.DM_DX_ASC) AND 
                        (l.DATE_SERV BETWEEN '2013-10-01' AND '2014-09-30') AND
                        l.LABTEST='05'
                        ORDER BY l.DATE_SERV DESC  ";
 
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        

            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'PID', // as index id
                    'totalItemCount' => count( $rawData),
                      // 'pagination' => false,
            ));
            
            //echo $sql;
           // return;
            
            $this->render('detail', array(
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                'HOSPCODE'=>$HOSPCODE,

            ));
        }
                    
        // ส่งออกผลแล็ปทุกชนิดครั้งล่าสุด รายบุคคล   pdf
        public function actionLabfuPdf($PID=null) {
            //return ;
            // ดูรายคน  วันล่าสุด
            // GET  HOSPCODE CID MAX(DATESERV)
            $sql = "SELECT l.HOSPCODE,l.PID,l.DATE_SERV,l.LABTEST,l.LABRESULT 
                FROM  labfu l
                WHERE l.HOSPCODE='07711'
                AND l.PID='000038'  
                AND l.DATE_SERV='2012-12-26' ";
            
            if(isset($_POST['pid'])){
                
                $pid = $_POST['pid'];
                $sql = "SELECT p.HOSPCODE,p.pid,p.PRENAME,p.`NAME`,p.LNAME,p.CID,p.SEX,round((DATEDIFF(CURDATE(),p.BIRTH)/365.25),0) as age ,p.HN
                            ,l.DATE_SERV,l.SEQ,l.LABTEST,c.`describe`,l.LABRESULT,c.std_value
                            FROM  labfu l
                            LEFT JOIN co_labfu c
                            ON l.LABTEST=c.id
                            LEFT JOIN service s
                            ON l.HOSPCODE=s.HOSPCODE AND l.PID=s.PID AND l.SEQ=s.SEQ 
                            LEFT JOIN person p
                            ON l.HOSPCODE=p.HOSPCODE AND l.PID=p.PID 
                            WHERE   p.HOSPCODE='10727' AND p.pid=$pid
                            AND	 l.DATE_SERV in ( SELECT max(l.DATE_SERV) as DATE_SERV   FROM labfu l  WHERE l.HOSPCODE='10727' AND l.PID=$pid )
                            GROUP BY l.LABTEST";
            
            }
 //           echo $sql;
 
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        
// print_r($rawData);
// return;
            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'HOSPCODE', // as index id
                    'totalItemCount' => count( $rawData),
//                    'sort' => array(
//                        'attributes' => array(
//                            'HOSPCODE','PID'
//                        ),
//                        'defaultOrder' => array(
//                            'HOSPCODE' => CSort::SORT_ASC, //default sort value
//                        ),
//                    ),
            ));
            
           $this->render('pdf', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            // 'HOSPCODE'=>$HOSPCODE, 
            'pid'=>$pid,
             
               
               ));
    }

        // ทะเบียนผู้ป่วยเบาหวานทั้งหมด
        public function actionDmRegistration($PID=null){
            
        }
      
        public function actionTest($id) {
//            $id=000038;
            $model = $this->loadModel($id); //หาผูป่วย จาก id ที่ส่งมา
    
    //        //คน lab จาก pid
            $sql = "SELECT l.HOSPCODE,l.PID,l.DATE_SERV,l.LABTEST,l.LABRESULT 
                    FROM  labfu l
                    WHERE l.HOSPCODE = '07711'
                    AND l.PID='{$model->pid}'  
                    AND l.DATE_SERV='2012-12-26' ";

            $command = Yii::app()->db->createCommand($sql);
            $result = $command->queryAll();
            $dataProvider = new CArrayDataProvider($result, array(
               'keyField' => 'hospcode'
            ));

            $this->render('//labfu/pdf', array(
                'model' => $model,
//                'dataProvider' => $dataProvider
            ));
        }
    
        
    	public function loadModel($id=000038){
            
		$model=Labfu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionPending(){
        $sql = "SELECT * FROM labfu";
        $rawData = Yii::app()->db->createCommand($sql);
        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();
//the count
        $model = new CSqlDataProvider($rawData, array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => $count,
            'sort' => array(
                'attributes' => array(
                    'HOSPCODE', 'PID', 'LABRESULT'
                ),
                'defaultOrder' => array(
                    'HOSPCODE' => CSort::SORT_ASC, //default sort value
                ),
            ),
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

//        $this->render('customsqlview', array(
//            'model' => $model,
//        ));
        
                        $this->render('//labfu/labresult',array(
                         'model' => $model,
                        'sql'=>$sql,
                ));
        }
        
        
        // ทะเบียนผู้ป่วยเบาหวาน 
        public function actionLastLab($CID=null) {

           //$CID=$_GET['CID'];

            $sql = "SELECT t0.HOSPCODE,t0.PID
                            ,t1.date_serv,t1.labtest,t2.descrb,t2.std_value
                            ,t1.labresult
                            FROM 
                            (
                            SELECT HOSPCODE,PID,GROUP_CONCAT(DATE_SERV ORDER BY DATE_SERV DESC   SEPARATOR ',' ) as date_lab
                            FROM labfu 
                            GROUP BY HOSPCODE,PID 
                            ) as t0 
                            LEFT JOIN 
                            (
                            SELECT * FROM labfu 
                            ) t1 
                            ON t0.hospcode=t1.hospcode AND t0.pid=t1.pid AND substr(t0.date_lab,1,10)=t1.date_serv
                            LEFT JOIN co_labfu t2
                            ON t1.labtest=t2.labcode
                            WHERE t0.hospcode='07711' AND t0.PID='000038' 
                            GROUP BY t1.date_serv,t1.labtest
                            ORDER BY t0.pid";
            
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();// in CArrayDataProvider        
            $dataProvider = new CArrayDataProvider($rawData, array( //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
                    'keyField' => 'HOSPCODE', // as index id
                    'totalItemCount' => count( $rawData),

            ));
            
           $this->render('lastlab', array(
                'dataProvider' => $dataProvider,
                'sql' => $sql,
               // 'CID'=>$CID,

            ));
        }
        
    
    
    
  
}