<?php
Yii::import('application.vendor.CImageUtil');
/**
 * This is the model class for table "tbl_resource".
 *
 * The followings are the available columns in table 'tbl_resource':
 * @property integer $id
 * @property integer $type
 * @property string $ip
 * @property string $location
 * @property string $login_user
 * @property string $login_pass
 * @property integer $cores
 * @property integer $memory
 * @property integer $disk
 * @property integer $data
 * @property integer $bandwidth_type
 * @property integer $bandwidth
 * @property integer $create_time
 * @property integer $expire_time
 * @property integer $owner_id
 * @property integer $provider_id
 * @property string $memo
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property Provider $provider
 */
class Resource extends CActiveRecord
{

	protected function beforeSave()
	{
		if(parent::beforeSave())
    		{
		//	Yii::log('create='.$this->create_time.' expire='.$this->expire_time, 'warning');
			return true;
		}
		else
		{	
			return false;
		}
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_resource';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, ip, login_user, login_pass, cores, memory, disk, data, os, osver, bandwidth_type, bandwidth, owner_id, provider_id', 'required'),
			array('type, cores, memory, disk, data, os, bandwidth_type, bandwidth, owner_id, provider_id', 'numerical', 'integerOnly'=>true),
			array('ip', 'length', 'max'=>15),
			array('ip', 'match', 'pattern'=>'/^(\d)+\.(\d)+\.(\d)+\.(\d)+$/', 'message'=>'必须是合法的IP地址.'),
			array('location, login_user, login_pass', 'length', 'max'=>128),
			array('id,create_time, expire_time,memo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('type, ip, location, login_user, login_pass, cores, memory, disk, data, bandwidth_type, bandwidth, create_time, expire_time, owner_id, provider_id, memo', 'safe', 'on'=>'search'),
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
			'type' => '类型',
			'ip' => 'IP地址',
			'location' => '位置',
			'login_user' => '登录用户名',
			'login_pass' => '登录密码',
			'cores' => '处理器核数',
			'memory' => '内存(M)',
			'disk' => '系统盘大小(G)',
			'data' => '数据盘大小(G)',
			'os' => '操作系统类型',
			'osver' => '操作系统版本',
			'bandwidth_type' => '带宽类型',
			'bandwidth' => '带宽大小(M/G)',
			'create_time' => '创建时间',
			'expire_time' => '过期时间',
			'owner_id' => '所有者',
			'provider_id' => '提供商',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('login_user',$this->login_user,true);
		$criteria->compare('login_pass',$this->login_pass,true);
		$criteria->compare('cores',$this->cores);
		$criteria->compare('memory',$this->memory);
		$criteria->compare('disk',$this->disk);
		$criteria->compare('data',$this->data);
		$criteria->compare('bandwidth_type',$this->bandwidth_type);
		$criteria->compare('bandwidth',$this->bandwidth);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('expire_time',$this->expire_time);
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
	 * @return Resource the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	// 生成登录信息(用户名/密码)图片
	public function genLoginImage()
	{
		CImageUtil::genTextPNG($this->login_user . "/". $this->login_pass);
	}
}
