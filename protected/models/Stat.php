<?php

/**
 * This is the model class for table "tbl_stat".
 *
 * The followings are the available columns in table 'tbl_stat':
 * @property integer $id
 * @property string $name
 * @property string $siteid
 * @property string $view_pass
 * @property integer $owner_id
 * @property integer $provider_id
 * @property string $memo
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property Provider $provider
 */
class Stat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_stat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, siteid, view_pass, owner_id, provider_id', 'required'),
			array('owner_id, provider_id', 'numerical', 'integerOnly'=>true),
			array('name, siteid, view_pass', 'length', 'max'=>128),
			array('memo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, siteid, view_pass, owner_id, provider_id, memo', 'safe', 'on'=>'search'),
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
			'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
			'provider' => array(self::BELONGS_TO, 'Provider', 'provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'siteid' => 'Siteid',
			'view_pass' => 'View Pass',
			'owner_id' => 'Owner',
			'provider_id' => 'Provider',
			'memo' => 'Memo',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('siteid',$this->siteid,true);
		$criteria->compare('view_pass',$this->view_pass,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('provider_id',$this->provider_id);
		$criteria->compare('memo',$this->memo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
