<?php

class DmPatientController extends Controller {

    public function actionIndex() {
        $PersonDm = new CActiveDataProvider('PersonDm', array(
//                    'criteria' => array(
//                        'condition' => '
//                            product_code LIKE(:search)
//                            OR product_name LIKE(:search)
//                            OR product_price LIKE(:search)
//                            ',
//                        'order' => 'product_id DESC'
//                    ),
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));


//        if (empty($products)) {
//            $products = new CActiveDataProvider('Product', array(
//                'criteria' => array(
//                    'order' => 'product_id DESC'
//                )
//            ));
//        }
        $this->render('//DmPatient/Index', array(
            'DmPatient' => $PersonDm
        ));
    }

    public function actionview($cid = null) {  // ใช้ id ส่งไปให้ view 
        Yii::app()->session['my_id'] = $cid; // สร้าง session 
        $this->render('//PatientProfile/historyprofile');
    }

}