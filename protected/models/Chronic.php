<?php

/**
 * This is the model class for table "chronic".
 *
 * The followings are the available columns in table 'chronic':
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $DATE_DIAG
 * @property string $CHRONIC
 * @property string $HOSP_DX
 * @property string $HOSP_RX
 * @property string $DATE_DISCH
 * @property string $TYPEDISCH
 * @property string $D_UPDATE
 */
class Chronic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chronic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HOSPCODE, PID, DATE_DIAG, CHRONIC, TYPEDISCH, D_UPDATE', 'required'),
			array('HOSPCODE, HOSP_DX, HOSP_RX', 'length', 'max'=>5),
			array('PID', 'length', 'max'=>15),
			array('CHRONIC', 'length', 'max'=>6),
			array('TYPEDISCH', 'length', 'max'=>2),
			array('DATE_DISCH', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HOSPCODE, PID, DATE_DIAG, CHRONIC, HOSP_DX, HOSP_RX, DATE_DISCH, TYPEDISCH, D_UPDATE', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'HOSPCODE' => 'Hospcode',
			'PID' => 'Pid',
			'DATE_DIAG' => 'Date Diag',
			'CHRONIC' => 'Chronic',
			'HOSP_DX' => 'Hosp Dx',
			'HOSP_RX' => 'Hosp Rx',
			'DATE_DISCH' => 'Date Disch',
			'TYPEDISCH' => 'Typedisch',
			'D_UPDATE' => 'D Update',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('HOSPCODE',$this->HOSPCODE,true);
		$criteria->compare('PID',$this->PID,true);
		$criteria->compare('DATE_DIAG',$this->DATE_DIAG,true);
		$criteria->compare('CHRONIC',$this->CHRONIC,true);
		$criteria->compare('HOSP_DX',$this->HOSP_DX,true);
		$criteria->compare('HOSP_RX',$this->HOSP_RX,true);
		$criteria->compare('DATE_DISCH',$this->DATE_DISCH,true);
		$criteria->compare('TYPEDISCH',$this->TYPEDISCH,true);
		$criteria->compare('D_UPDATE',$this->D_UPDATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Chronic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
