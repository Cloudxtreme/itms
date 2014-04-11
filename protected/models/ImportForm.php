<?php
/**
 * ImportForm class.
 * 用于导入CSV数据到资源表中,  action: resource/import
 */
Yii::import('application.vendor.CStringUtil');

class ImportForm extends CFormModel
{
	public $owner_id;
	public $provider_id;
	public $csv_file;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('owner_id, provider_id', 'required'),
			array('owner_id, provider_id', 'numerical', 'integerOnly'=>true),
			array('csv_file', 'file', 'types'=>'txt,csv', 'maxSize'=>1024*1024, 'tooLarge'=>'请上传小于1M的文件'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'owner_id' => '所有者',
			'provider_id' => '提供商',
			'csv_file'=>'上传CSV文件',
		);
	}

	// import 字段索引
	const FLD_TYPE = 0;
	const FLD_IP = 1;
	const FLD_LOCATION = 2;
	const FLD_LOGIN_USER = 3;
	const FLD_LOGIN_PASS = 4;
	const FLD_CORES = 5;
	const FLD_MEMORY = 6;
	const FLD_DISK = 7;
	const FLD_DATA = 8;
	const FLD_OS = 9;
	const FLD_OSVER = 10;
	const FLD_BANDWIDTH_TYPE = 11;
	const FLD_BANDWIDTH = 12;
	const FLD_CREATE_TIME = 13;
	const FLD_EXPIRE_TIME = 14;
	const FLD_MEMO = 15;

	private function importFile($filename)
	{
		$row = 0;   // 当前行号
		$err_rows = 0;  //  错误行数
		$suc_rows = 0;  //  成功行数
		$err_msg = '';   //  错误累加信息
		
		$handle = fopen($filename,"r");

		if($handle === false) return array(false, '无法打开上传文件');
		$transaction=Resource::model()->dbConnection->beginTransaction();
		//fgetcsv() 解析读入的行并找出 CSV格式的字段然后返回一个包含这些字段的数组。 
		
		// 开始数据库事务，任何一条记录导入失败，则回退，防止csv被修正后重复导入!
		// 不用使用 fgetcsv ! 对中文处理有bug
		while ( ($line = fgets($handle)) !== false) {
			$row ++;   // 记录行号
			$data = explode(",", $line);
    			$num = count($data);
			if($num < 16) continue;  // 跳过字段不完整行
			if(CStringUtil::startWith($data[0],'#')) continue;  // 跳过注释

			// 开始导入
			
			$resource = new Resource();
			$resource->type = $data[ImportForm::FLD_TYPE];
			$resource->ip = $data[ImportForm::FLD_IP];
			$resource->location = CStringUtil::_U($data[ImportForm::FLD_LOCATION]);
			$resource->login_user = $data[ImportForm::FLD_LOGIN_USER];
			$resource->login_pass = $data[ImportForm::FLD_LOGIN_PASS];
			$resource->cores = $data[ImportForm::FLD_CORES];
			$resource->memory = $data[ImportForm::FLD_MEMORY];
			$resource->disk = $data[ImportForm::FLD_DISK];
			$resource->data = $data[ImportForm::FLD_DATA];
			$resource->os = $data[ImportForm::FLD_OS];
			$resource->osver = CStringUtil::_U($data[ImportForm::FLD_OSVER]);
			$resource->bandwidth_type = $data[ImportForm::FLD_BANDWIDTH_TYPE];
			$resource->bandwidth = $data[ImportForm::FLD_BANDWIDTH];
			$resource->create_time = $data[ImportForm::FLD_CREATE_TIME];
			$resource->expire_time = $data[ImportForm::FLD_EXPIRE_TIME];
			$resource->memo = CStringUtil::_U($data[ImportForm::FLD_MEMO]);

			$resource->owner_id = $this->owner_id;
			$resource->provider_id = $this->provider_id;
			
			if( $resource->save() )  $suc_rows ++;
			else  {
				$err_msg =  '第'.$row.'行导入错误:' . CHtml::errorSummary($resource,'','',array('firstError'=>true));
				$err_rows ++;
				$transaction->rollback();
				break;
			}
		}
		fclose($handle);

		if( $err_rows == 0) {
			$transaction->commit();
			return array(true, '导入成功! 共有'. $suc_rows. '条记录导入.');
		} else {
			return array(false, $err_msg);
		}

	}

	public function import()
	{
		$file = CUploadedFile::getInstance($this, 'csv_file');
		if(is_object($file)&&get_class($file) === 'CUploadedFile'){
			$dst_file = './assets/upfile/rescsv_'.time().'_'.rand(0,9999).'.'.$file->extensionName;
			$file->saveAs($dst_file);
			return $this->importFile($dst_file);
			// return array(true, 'OK');
		} else {
			return array(false,'非法的上传文件(上传失败)');
		}
	}
}
