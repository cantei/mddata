<?php
class ChronicsController extends Controller {
        public function actionIndex(){

  
//       $sql = "SELECT DISTINCT d.date_serv
//               FROM drug_opd d
//               WHERE d.DATE_SERV > '2013-09-30' 
//               AND d.HOSPCODE='07711' 
//               AND	 d.PID='10035'
//               ORDER BY d.date_serv DESC ";
//        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
//       
//        $dataProvider = new CArrayDataProvider($rawData, array(
//            'keyField' => 'date_serv',
//             'totalItemCount' => count($rawData),
//
//        ));
//        
//        // print_r($dataProvider);
//       
//             $array= print_r($dataProvider);
//             //  return;
      $model = new TmpMeChronic();
    $dataProvider = new CActiveDataProvider($model, array
     (
             'criteria'=>array
             (
                     'select'=>'HOSPCODE,PID,CID'  // คอลัมน์ที่อยากแสดง
             ),
 
     
             'pagination'=>array('pageSize'=>5), //จำนวนที่ต้องการแสดงต่อหน้า
     ));
 
 
    $this->render('index',array(
        'dataProvider'=>$dataProvider,
    ));
    }
    public function actionIndex2() {
// http://www.yii.in.th/forum/index.php?topic=384.0
        $dataProvider1 = new CActiveDataProvider('TmpMeChronic', array(
                                'pagination' => array(
                                'pageSize' => 10,
                                 ),   

                  ));
        
        
        $sql = "SELECT * FROM tmp_me_chronic";
        $dataProvider2 = new CSqlDataProvider($sql, array(
            'keyField' => 'HOSPCODE',
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
        
      print_r($dataProvider1).'<br>';
      // return;
      $this->render('index2', array(
          'dataProvider1'=>$dataProvider1,
    
           // 'dataProvider2'=>$dataProvider2,    
              ));
    }


}