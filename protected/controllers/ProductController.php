

<?php

// controllers/ProductController.php
class ProductController extends Controller {

    public function actionIndex() {
        if (!empty($_POST)) {
// delete
            if (!empty($_POST['ids'])) {
                $ids = $_POST['ids'];
                foreach ($ids as $id) {
                    Product::model()->deleteByPk($id);
                }
                $this->redirect(array('Index'));
            }
// search
            if (!empty($_POST['search'])) {
                $products = new CActiveDataProvider('Product', array(
                    'criteria' => array(
                        'condition' => '
                            product_code LIKE(:search)
                            OR product_name LIKE(:search)
                            OR product_price LIKE(:search)
                            ',
                        'params' => array(
                            'search' => '%' . $_POST['search'] . '%'
                        ),
                        'order' => 'product_id DESC'
                    ),
                    'pagination' => false
                ));
            }
        }
        if (empty($products)) {
            $products = new CActiveDataProvider('Product', array(
                'criteria' => array(
                    'order' => 'product_id DESC'
                )
            ));
        }
        $this->render('//Product/Index', array(
            'products' => $products
        ));
    }

    public function actionDelete($id) {
        Product::model()->deleteByPk($id);
    }

    public function actionForm() {
        $product = new Product();
        if (!empty($_POST)) {
            $product->_attributes = $_POST['Product'];
            if ($product->save()) {
                Yii::app()->user->setFlash('message', 'บันทึกแล้ว');
                $this->redirect(array('Index'));
            }
        }
        $this->render('//Product/Form', array(
            'product' => $product
        ));
    }

    public function actionUpdate($id) {
        $product = Product::model()->findByPk($id);
        if (!empty($_POST)) {
            $product->_attributes = $_POST['Product'];
            if ($product->save()) {
                Yii::app()->user->setFlash('message', 'แก้ไขแล้ว');
                $this->redirect(array('Index'));
            }
        }
        $this->render('//Product/Form', array(
            'product' => $product
        ));
    }

    public function actionUP() {
        // สร้างตารางขณะ runtime

        $sql = "CREATE  TABLE IF NOT EXISTS promotion(
            id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
            name VARCHAR(255) NOT NULL
            )";
        Yii::app()->db->createCommand($sql)->execute();
        try { // ป้องกัน errror
            $sql = "ALTER TABLE promotion ADD create_at DATETIME NULL";
            Yii::app()->db->createCommand($sql)->execute();
        } catch (Exception $ee) { // ถ้า error ให้ข้ามไป
            //  echo $ee;
        }
        Yii::app()->user->setFlash('massage', 'อัพเดทเรียบร้อยแล้ว');
        $this->redirect(array('Index'));
    }

    public function actionUpload() {
        $this->render('//Product/Upload');
    }

    public function actionAjaxUpload() {
        $f = $_FILES['myfile'];

        if (!empty($f)) {
            $name = $f['name'];
            $tmp_name = $f['tmp_name'];
            move_upload_file($tmp_name, 'uploads/' . $name);
        }
    }

    public function actionExportExcel() {
        $products = Product::model()->findAll();
        $output = "";
        // header
        $output . "รหัสสินค้า,ชื่อสินค้า,ราคา\n";
        foreach ($products as $p) {  // วนลูปใช้คอมม่าคั่น 
            $output.=$p->product_code . ',';
            $output.=$p->product_name . ',';
            $output.=$p->product_price . ',';
            $output.="\n";

            header('Content-Type:text/csv;Charset=utf-8');
            file_put_contents('product.csv', $output);
            header('location:product.csv');
        }
    }

    public function actionImportExcel() {
        // STEP 1 : uploadfile to server
        $name = $f['name'];
        $tmp_name = $f['tmp_name'];
        move_upload_file($tmp_name, 'uploads/' . $name);

        // STEP 2 : read data 
        $data = file_get_contents('uploads/' . $name);
        $rows = explode("\n", $data); // แยกแถว
        $size = count($rows);


        for ($i = 1; $i < $size; $i++) { // ข้ามแถวที่ 0
            $row = $rows[$i];

            if(!empty($row)) { // ดักไว้ถ้าแถวว่างจะ error
                $cell = explode(',', $row);
                $product_code = $cell[0];
                $product_name = $cell[1];
                $product_price = $cell[2];


                // update to database
                $product = Product::model()->findByPk($product_id);

                $product->product_code = $product_code;
                $product->product_name = $product_name;
                $product->product_price = $product_price;
                $product->save();
            }
        }

        // STEP 3 : delete file
        unlink('upload/'.$name); // ลบไฟล์
        Yii::app()->user->setFlash('massage','บันทึกแล้ว'); // ข้อความแจ้งเตือน
        $this->render(array('Index'));
    }
    
    public  function actionPdf(){
        $products=Product::model()->findAll();
        $this->renderPartial('//Product/Pdf',array(
           'products' =>$products
        ));
    }


    public function actionview($id=null) {  // ใช้ id ส่งไปให้ view 
        Yii::app()->session['my_id'] =$id; // สร้าง session 
        $this->render('//PatientProfile/historyprofile');
    }

}

