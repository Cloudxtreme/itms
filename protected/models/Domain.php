<?php

/**
 * This is the model class for table "tbl_domain".
 *
 * The followings are the available columns in table 'tbl_domain':
 * @property integer $id
 * @property string $name
 * @property string $dns
 * @property string $beian
 * @property string $create_time
 * @property string $expire_time
 * @property integer $owner_id
 * @property integer $provider_id
 * @property integer $price
 * @property string $memo
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property Provider $provider
 */
class Domain extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_domain';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, owner_id, provider_id', 'required'),
			array('owner_id, provider_id, price', 'numerical', 'integerOnly'=>true),
			array('name, dns, beian', 'length', 'max'=>128),
			array('create_time, expire_time, memo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, dns, beian, create_time, expire_time, owner_id, provider_id, price, memo', 'safe', 'on'=>'search'),
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
			'name' => '域名',
			'dns' => '解析服务器',
			'beian' => '备案号',
			'create_time' => '创建时间',
			'expire_time' => '过期时间',
			'owner_id' => '所有者',
			'provider_id' => '提供商',
			'price' => '年费',
			'memo' => '备注信息',
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
		$criteria->compare('dns',$this->dns,true);
		$criteria->compare('beian',$this->beian,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('expire_time',$this->expire_time,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('provider_id',$this->provider_id);
		$criteria->compare('price',$this->price);
		$criteria->compare('memo',$this->memo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Domain the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
