<div class='container'>
<?php
class PersonController extends Controller {
    
    public function actionIndex(){
        
             $sql = "SELECT t0.HOSPCODE,t0.hosname 
                            ,t0.male,t0.female,t0.total,t0.nhouse
                            FROM 
                            (
                            SELECT p.HOSPCODE,o.hosname as hosname
                            ,sum(if(p.SEX='1',1,0)) as male
                            ,sum(if(p.SEX='2',1,0)) as female
                            ,sum(if(p.SEX in ('1','2'),1,0)) as total
                            ,count(DISTINCT h.HOSPCODE,h.HID)  as nhouse  
                            FROM person p
                            LEFT JOIN home h
                            ON p.HOSPCODE=h.HOSPCODE AND p.HID=h.HID 
                            LEFT JOIN chospital  o
                            ON p.HOSPCODE=o.hoscode  
                            WHERE p.TYPEAREA in ('1','3') 
                            AND p.DISCHARGE in ('9','')
                            GROUP BY p.HOSPCODE
                            ORDER BY o.subdistcode,p.HOSPCODE
                            ) as t0";
                  

           $rawData = Yii::app()->db->createCommand($sql)->queryAll();
            $dataProvider = new CArrayDataProvider($rawData , array(
                'keyField' => 'HOSPCODE',
                'totalItemCount' => count($rawData),
                'pagination' => false,
                'sort' => array(
                'attributes' => array_keys($rawData[0])
            )
            ));
            $this->render('index', array(
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                // 'hospcode'=>$hospcode,
                // 'hosname'=>$hosname,
            ));
    }
    
    public function actionPersonVillage($hospcode=null){
            $hospcode=$_GET['hospcode'];
            $sql = "SELECT p.HOSPCODE,o.hosname as hosname,concat(h.CHANGWAT,h.AMPUR,h.TAMBON,h.VILLAGE) as villagecode,v.villagename
                        ,sum(if(p.SEX='1',1,0)) as male
                        ,sum(if(p.SEX='2',1,0)) as female
                        ,sum(if(p.SEX in ('1','2'),1,0)) as total
                        ,count(DISTINCT h.HOSPCODE,h.HID)  as nhouse  
                        FROM person p
                        LEFT JOIN home h
                        ON p.HOSPCODE=h.HOSPCODE AND p.HID=h.HID 
                        LEFT JOIN chospital  o
                        ON p.HOSPCODE=o.hoscode
    			LEFT JOIN cvillage v
			ON concat(h.CHANGWAT,h.AMPUR,h.TAMBON,h.VILLAGE)=v.villagecodefull 
                        WHERE p.TYPEAREA in ('1','3') 
                        AND p.DISCHARGE in ('9','') 
                        AND p.HOSPCODE= $hospcode
                        GROUP BY villagecode
                        ORDER BY o.subdistcode,p.HOSPCODE";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData , array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => count($rawData),
            'pagination' => false,
        ));
        $this->render('personvillage', array(
            'dataProvider' => $dataProvider,
            'sql' => $sql,
            'hospcode'=>$hospcode,
            // 'hosname'=>$hosname,
            
            
        ));
    }
    
    public function actionFindAge($x=null,$y=null){
     
            if (!isset($_POST['x']) and !isset($_POST['$y']) )
               
            {
                 $x=0;
                $y=150; 
                
            }
            else{
                $x=$_POST['x'];
                $y=$_POST['y'];
      
                
            }
            $sql = "SELECT p.HOSPCODE,o.hosname as hosname
                            ,sum(if(p.SEX='1'  ,1,0) ) as male
                            ,sum(if(p.SEX='2' ,1,0)) as female
                            ,sum(if(p.SEX in ('1','2') ,1,0)) as total
                            FROM person p
                            LEFT JOIN home h
                            ON p.HOSPCODE=h.HOSPCODE AND p.HID=h.HID 
                            LEFT JOIN chospital  o
                            ON p.HOSPCODE=o.hoscode  
                            WHERE p.TYPEAREA in ('1','3') 
                            AND p.DISCHARGE in ('9','')
                            AND (DATEDIFF(CURDATE(),p.BIRTH)/365.25) BETWEEN $x AND $y  
                            GROUP BY p.HOSPCODE
                            ORDER BY o.subdistcode,p.HOSPCODE";
            $rawData = Yii::app()->db->createCommand($sql)->queryAll();
            $dataProvider = new CArrayDataProvider($rawData , array(
                'keyField' => 'HOSPCODE',
                'totalItemCount' => count($rawData),
                'pagination' => false,
                'sort' => array(
                'attributes' => array_keys($rawData[0])
            )
            ));
            $this->render('findage', array(
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                'x'=>$x,
                'y'=>$y,
                // 'hospcode'=>$hospcode,
                // 'hosname'=>$hosname,
            ));
    }
}
?>
</div>