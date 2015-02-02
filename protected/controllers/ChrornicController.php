<?php

class testController extends Controller {
      public function actionIndex(){
        // public function actionIndex() {
      echo 'test';
      return;
       $sql = "SELECT DISTINCT d.date_serv
               FROM drug_opd d
               WHERE d.DATE_SERV > '2013-09-30' 
               AND d.HOSPCODE='07711' 
               AND	 d.pid='10035'
               ORDER BY d.date_serv DESC ";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $filtersData = $filtersForm->filter($rawData);
        $arraydateserv = new CArrayDataProvider($filtersData, array(
            'keyField' => 'Tambon',
            'totalItemCount' => count($rawData),
            'pagination' => false,
            'sort' => array(
                'attributes' => array_keys($rawData[0])
            )
        ));
                
        return $arraydateserv;
        
        $this->render('index', array(
             'arraydateserv' => $arraydateserv
        ));
    }
}
?>
