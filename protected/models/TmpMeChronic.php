<?php

/**
 * This is the model class for table "tmp_me_chronic".
 *
 * The followings are the available columns in table 'tmp_me_chronic':
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $CID
 * @property string $BIRTH
 * @property integer $AGE
 * @property string $SEX
 * @property string $TYPEAREA
 * @property string $DISCHARGE
 * @property string $DDISCHARGE
 * @property string $DM_DX
 * @property string $DM_DATEDX
 * @property string $DM_TYPEDSC
 * @property string $HT_DX
 * @property string $HT_DATEDX
 * @property string $HT_TYPEDSC
 * @property string $OTHER_DX
 * @property string $OTHER_DATEDX
 * @property string $OTHER_TYPEDSC
 * @property string $date_hba1c
 * @property string $res_hba1c
 * @property string $date_ldl
 * @property string $res_ldl
 * @property string $date_fbs
 * @property string $res_fbs
 */
class TmpMeChronic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmp_me_chronic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AGE', 'numerical', 'integerOnly'=>true),
			array('HOSPCODE', 'length', 'max'=>5),
			array('PID', 'length', 'max'=>15),
			array('CID', 'length', 'max'=>13),
			array('SEX, TYPEAREA, DISCHARGE', 'length', 'max'=>1),
			array('DM_DX, DM_TYPEDSC, HT_DX, HT_TYPEDSC, OTHER_DX, OTHER_TYPEDSC', 'length', 'max'=>50),
			array('DM_DATEDX, HT_DATEDX, OTHER_DATEDX', 'length', 'max'=>255),
			array('res_hba1c, res_ldl, res_fbs', 'length', 'max'=>3),
			array('BIRTH, DDISCHARGE, date_hba1c, date_ldl, date_fbs', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HOSPCODE, PID, CID, BIRTH, AGE, SEX, TYPEAREA, DISCHARGE, DDISCHARGE, DM_DX, DM_DATEDX, DM_TYPEDSC, HT_DX, HT_DATEDX, HT_TYPEDSC, OTHER_DX, OTHER_DATEDX, OTHER_TYPEDSC, date_hba1c, res_hba1c, date_ldl, res_ldl, date_fbs, res_fbs', 'safe', 'on'=>'search'),
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
			'CID' => 'Cid',
			'BIRTH' => 'Birth',
			'AGE' => 'Age',
			'SEX' => 'Sex',
			'TYPEAREA' => 'Typearea',
			'DISCHARGE' => 'Discharge',
			'DDISCHARGE' => 'Ddischarge',
			'DM_DX' => 'Dm Dx',
			'DM_DATEDX' => 'Dm Datedx',
			'DM_TYPEDSC' => 'Dm Typedsc',
			'HT_DX' => 'Ht Dx',
			'HT_DATEDX' => 'Ht Datedx',
			'HT_TYPEDSC' => 'Ht Typedsc',
			'OTHER_DX' => 'Other Dx',
			'OTHER_DATEDX' => 'Other Datedx',
			'OTHER_TYPEDSC' => 'Other Typedsc',
			'date_hba1c' => 'Date Hba1c',
			'res_hba1c' => 'Res Hba1c',
			'date_ldl' => 'Date Ldl',
			'res_ldl' => 'Res Ldl',
			'date_fbs' => 'Date Fbs',
			'res_fbs' => 'Res Fbs',
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
		$criteria->compare('CID',$this->CID,true);
		$criteria->compare('BIRTH',$this->BIRTH,true);
		$criteria->compare('AGE',$this->AGE);
		$criteria->compare('SEX',$this->SEX,true);
		$criteria->compare('TYPEAREA',$this->TYPEAREA,true);
		$criteria->compare('DISCHARGE',$this->DISCHARGE,true);
		$criteria->compare('DDISCHARGE',$this->DDISCHARGE,true);
		$criteria->compare('DM_DX',$this->DM_DX,true);
		$criteria->compare('DM_DATEDX',$this->DM_DATEDX,true);
		$criteria->compare('DM_TYPEDSC',$this->DM_TYPEDSC,true);
		$criteria->compare('HT_DX',$this->HT_DX,true);
		$criteria->compare('HT_DATEDX',$this->HT_DATEDX,true);
		$criteria->compare('HT_TYPEDSC',$this->HT_TYPEDSC,true);
		$criteria->compare('OTHER_DX',$this->OTHER_DX,true);
		$criteria->compare('OTHER_DATEDX',$this->OTHER_DATEDX,true);
		$criteria->compare('OTHER_TYPEDSC',$this->OTHER_TYPEDSC,true);
		$criteria->compare('date_hba1c',$this->date_hba1c,true);
		$criteria->compare('res_hba1c',$this->res_hba1c,true);
		$criteria->compare('date_ldl',$this->date_ldl,true);
		$criteria->compare('res_ldl',$this->res_ldl,true);
		$criteria->compare('date_fbs',$this->date_fbs,true);
		$criteria->compare('res_fbs',$this->res_fbs,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TmpMeChronic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
