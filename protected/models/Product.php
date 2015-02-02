<?php

// models/Product 
Class Product extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tb_product';
    }

    public function primaryKey() {
        return 'product_id';
    }

    public function attributeLabels() {
        return array(
            'product_code'=>'รหัสสินค้า',
            'product_name'=>'ชื่อสินค้า',
            'product_price'=>'ราคาขาย',
        );
    }
        public function rules() {
        return array(
            array('product_code,product_name,product_price','required','message'=>'ต้องไม่เป็นค่าว่าง'),
            array('product_code','unique','message'=>'{attribute}.มีแล้ว'),
            array('product_price',
                 'numerical', 'allowEmpty' => true,
                                'integerOnly' => false,'min' => 0, 'max' => 500000000                
                ,'message'=>'กรุณาป้อน {attribute}.เป็นตัวเลข') // เพิ่ม msg ภาษาไทย
        );
    }

}
