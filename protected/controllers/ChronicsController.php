<?php
class ChronicsController extends Controller {
    public function actionIndex() {
        $cyear = '2015';
        $filtersForm = new FiltersForm();
        if (isset($_GET['FiltersForm']))
        $filtersForm->filters = $_GET['FiltersForm'];
        $sql = "SELECT c.HOSPCODE,h.hosname 
                        ,sum(if(NOT ISNULL(c.DM_DX_ASC) AND  ISNULL(c.HT_DX_ASC) AND   ISNULL(c.OTHER_DX_ASC)  ,1,0)) as nDM
                        ,sum(if(NOT ISNULL(c.HT_DX_ASC) AND  ISNULL(c.DM_DX_ASC) AND   ISNULL(c.OTHER_DX_ASC)  ,1,0)) as nHT
                        ,sum(if(NOT ISNULL(c.HT_DX_ASC) AND  NOT ISNULL(c.DM_DX_ASC) AND   ISNULL(c.OTHER_DX_ASC)  ,1,0)) as nDMHT
                        ,sum(if(NOT ISNULL(c.OTHER_DX_ASC) AND  ISNULL(c.HT_DX_ASC) AND   ISNULL(c.DM_DX_ASC)   ,1,0)) as nOTHER
                        FROM tmp_me_chronic c
                        LEFT JOIN chospital h 
                        ON c.HOSPCODE=h.hoscode  
                        GROUP BY c.HOSPCODE";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        $filtersData = $filtersForm->filter($rawData);
        $dataProvider = new CArrayDataProvider($filtersData, array(
            'keyField' => 'HOSPCODE',
            'totalItemCount' => count($rawData),
            'pagination' => false,
//            'sort' => array(
//                'attributes' => array_keys($rawData[0])
//            )
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'filtersForm' => $filtersForm,
            'sql' => $sql
        ));
    }

}
?>