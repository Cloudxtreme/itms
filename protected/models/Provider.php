<?php

/**
 * This is the model class for table "tbl_provider".
 *
 * The followings are the available columns in table 'tbl_provider':
 * @property integer $id
 * @property string $name
 * @property string $login_user
 * @property string $login_pass
 * @property string $login_url
 * @property string $admin_user
 * @property string $admin_pass
 * @property string $admin_url
 * @property integer $payment_type
 * @property string $payment_info
 *
 * The followings are the available model relations:
 * @property Resource[] $resources
 */
class Provider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_provider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, login_user, login_pass, login_url, payment_type', 'required'),
			array('payment_type', 'numerical', 'integerOnly'=>true),
			array('name, login_user, login_pass, admin_user, admin_pass', 'length', 'max'=>128),
			array('login_url, admin_url', 'length', 'max'=>256),
			array('payment_info', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, login_user, login_pass, login_url, admin_user, admin_pass, admin_url, payment_type, payment_info', 'safe', 'on'=>'search'),
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
			'resources' => array(self::HAS_MANY, 'Resource', 'provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '名称',
			'login_user' => '注册用户名',
			'login_pass' => '登录口令',
			'login_url' => '登录地址(URL)',
			'admin_user' => '管理用户名',
			'admin_pass' => '管理口令',
			'admin_url' => '管理地址(URL)',
			'payment_type' => '付费类型',
			'payment_info' => '付费信息',
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
		$criteria->compare('login_user',$this->login_user,true);
		$criteria->compare('login_pass',$this->login_pass,true);
		$criteria->compare('login_url',$this->login_url,true);
		$criteria->compare('admin_user',$this->admin_user,true);
		$criteria->compare('admin_pass',$this->admin_pass,true);
		$criteria->compare('admin_url',$this->admin_url,true);
		$criteria->compare('payment_type',$this->payment_type);
		$criteria->compare('payment_info',$this->payment_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Provider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	// 返回提供商列表，用于提供商下拉框
        public static function all()
        {
                $ul = array();
                $recs = self::model()->findAll();
                foreach($recs as $rec)
                        $ul[$rec->id] = $rec->name . "(". $rec->login_user. ")";
                return $ul;
        }
}
