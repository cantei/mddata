<?php
class DrugController extends Controller {
     public function actionIndex() {
      //  $page_size = 5; 
        $sql = "SELECT DATE_SERV 
FROM drug_opd 
WHERE HOSPCODE='07711' AND PID='000003' GROUP BY DATE_SERV
ORDER BY DATE_SERV DESC 
";

         // $count_query ="SELECT * FROM drug_opd WHERE HOSPCODE='07711' AND PID='000003' ORDER BY DATE_SERV DESC ";

        $item_count = Yii::app()->db->createCommand($sql)->queryScalar();

        $dataProvider=new CSqlDataProvider($sql, array(
                'keyField'=>'id',
                'totalItemCount'=>$item_count,
                'pagination'=>array(
                     'pageSize'=>Yii::app()->session['pageSize'],
                ),
        ));
        $arr = count($item_count);
        $model = $dataProvider->getData();

         $this->widget('CLinkPager',array(
                    'pages'=>$dataProvider->pagination));

        foreach($model as $val) {
          // do stuff
            // echo print_r($val);
            echo '<br>';
             echo $arr;
          echo "<ul><li>" . implode("</li><li>", $val) . "</li></ul>";

        }



     }
     public function actionTest1($PID=null) {
//    $user = Yii::app()->db->createCommand()
//    ->select('HOSPCODE,PID,DATE_SERV')
//    ->from('drug_opd')
//    ->where('HOSPCODE=:HOSPCODE,PID=:PID', array(':HOSPCODE'=>07711,'PID'=>000003))
//    ->queryRow();
//    
    
$sql="SELECT DATE_SERV FROM drug_opd 
WHERE HOSPCODE='07711' AND PID='000003' GROUP BY DATE_SERV
ORDER BY DATE_SERV DESC ";
$connection=Yii::app()->db;
$command=$connection->createCommand($sql);
$results=$command->queryAll(); 

$items = array();
foreach($results as $result) {
 $items[] = $result;
}

print_r($items).'<br>';
echo '<hr>';
echo count ( $items  );
echo '<hr>';
print_r ( array_keys ( $items ) );
echo '<hr>';
print_r ( array_values ( $items ) );
echo '<hr>';


    return;
  
     }
    
    
    

    public function actionBasicPager() {
        $item_count = 32;  // num_row
        $page_size = 5;  

        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);

        // simulate the effect of LIMIT in a sql query
        $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

        $sample = range($pages->offset + 1, $end);

        $this->render('basic_pager', array(
            'item_count' => $item_count,
            'page_size' => $page_size,
            'items_count' => $item_count,
            'pages' => $pages,
            'sample' => $sample,
        ));
    }
    

     public function actionPage2() {
           //$pages->setPageSize(10);
         // $_GET['HOSPCODE']='07711';
         /*
//get criteria
        $criteria = new CDbCriteria();
      //  $criteria->condition = 'HOSPCODE = :HOSPCODE';
       // $criteria->params = array(':HOSPCODE' => $_GET['HOSPCODE']);
       // $criteria->params = array(':HOSPCODE' => 07711);
         $criteria->order = 'HOSPCODE asc';

//get count
        $count = TmpMeChronic::model()->count($criteria);

//pagination
        $pages = new CPagination($count);
        $pages->setPageSize(10);
        $pages->applyLimit($criteria);

//result to show on page
        $result = TmpMeChronic::model()->findAll($criteria);
        $dataProvider = new CArrayDataProvider($result);

*/
        $this->render('search', array(
          //  'dataProvider' => $dataProvider,
            //'pages' => $pages
        ));
    }
    
    
     public function actionPage3() {
            $criteria = new CDbCriteria;
            $criteria->condition = 'HOSPCODE=07711 OR TYPEAREA=1';
            $criteria->limit=100;
            // ใช้กับ Model
            $dataProvider = TmpMeChronic::model()->findAll($criteria);

            // ใช้กับ CActiveDataProvider
            // return new CActiveDataProvider($model, array(   'criteria'=>$criteria,  ));

            $this->render('search', array(
                        'dataProvider' => $dataProvider,
                      // 'pages' => $pages
           ));


     }
     public function actionPage4() {
            $DM_DX='E119';
            $criteria = new CDbCriteria;
            $criteria->select = 'HOSPCODE,COUNT(*) as total
'; 
        //    $criteria->addInCondition('province_name',array("xxxxx")); 
            $criteria->addInCondition('DM_DX',array("E119")); 
            $criteria->addBetweenCondition('DM_DATEDX','2012-10-01','2013-09-30');
            $criteria->group = ('HOSPCODE DESC');
            
            
            // $criteria->condition = 'DM_DX='.$DM_DX;
            //$criteria->params = array(":DM_DX"=>"$DM_DX");
            // $criteria->group='DATE_SERV';
            // $criteria->limit=100;
            // 
            // ใช้กับ Model
            $count= TmpMeChronic::model()->COUNT($criteria);
           // $models = TmpMeChronic::model()->findAll($criteria);
            $this->render('mycount', array(
                        'count' => $count,
                      //  'models'=>$models,
                      // 'pages' => $pages
           ));


     }
}