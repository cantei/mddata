<?php

/**
 * This is the model class for table "person_dm".
 *
 * The followings are the available columns in table 'person_dm':
 * @property string $HOSPCODE
 * @property string $HOSPNAME
 * @property string $pid
 * @property string $cid
 * @property string $NAME
 * @property string $LNAME
 * @property string $age
 * @property string $CHRONIC
 * @property string $lastdx
 */
class PersonDm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'person_dm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HOSPCODE, pid, CHRONIC', 'required'),
			array('HOSPCODE', 'length', 'max'=>5),
			array('HOSPNAME', 'length', 'max'=>100),
			array('pid', 'length', 'max'=>15),
			array('cid', 'length', 'max'=>13),
			array('NAME, LNAME', 'length', 'max'=>50),
			array('age', 'length', 'max'=>51),
			array('CHRONIC', 'length', 'max'=>6),
			array('lastdx', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HOSPCODE, HOSPNAME, pid, cid, NAME, LNAME, age, CHRONIC, lastdx', 'safe', 'on'=>'search'),
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
			'HOSPNAME' => 'Hospname',
			'pid' => 'Pid',
			'cid' => 'Cid',
			'NAME' => 'Name',
			'LNAME' => 'Lname',
			'age' => 'Age',
			'CHRONIC' => 'Chronic',
			'lastdx' => 'Lastdx',
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
		$criteria->compare('HOSPNAME',$this->HOSPNAME,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('LNAME',$this->LNAME,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('CHRONIC',$this->CHRONIC,true);
		$criteria->compare('lastdx',$this->lastdx,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PersonDm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
