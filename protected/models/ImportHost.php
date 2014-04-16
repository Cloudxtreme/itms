<?php
/**
 * ImportHost class.
 * 用于导入CSV数据到主机表中,  action: host/import
 */
Yii::import('application.vendor.CStringUtil');

class ImportHost extends CFormModel
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
	const FLD_PRICE = 15;
	const FLD_MEMO = 16;

	private function importFile($filename)
	{
		$row = 0;   // 当前行号
		$err_rows = 0;  //  错误行数
		$suc_rows = 0;  //  成功行数
		$err_msg = '';   //  错误累加信息
		
		$handle = fopen($filename,"r");

		if($handle === false) return array(false, '无法打开上传文件');
		$transaction=Host::model()->dbConnection->beginTransaction();
		//fgetcsv() 解析读入的行并找出 CSV格式的字段然后返回一个包含这些字段的数组。 
		
		// 开始数据库事务，任何一条记录导入失败，则回退，防止csv被修正后重复导入!
		// 不用使用 fgetcsv ! 对中文处理有bug
		while ( ($line = fgets($handle)) !== false) {
			$row ++;   // 记录行号
			$data = explode(",", $line);
    			$num = count($data);
			if($num < 17) continue;  // 跳过字段不完整行
			if(CStringUtil::startWith($data[0],'#')) continue;  // 跳过注释

			// 开始导入
			
			$host = new Host();
			$host->type = $data[ImportHost::FLD_TYPE];
			$host->ip = $data[ImportHost::FLD_IP];
			$host->location = CStringUtil::_U($data[ImportHost::FLD_LOCATION]);
			$host->login_user = $data[ImportHost::FLD_LOGIN_USER];
			$host->login_pass = $data[ImportHost::FLD_LOGIN_PASS];
			$host->cores = $data[ImportHost::FLD_CORES];
			$host->memory = $data[ImportHost::FLD_MEMORY];
			$host->disk = $data[ImportHost::FLD_DISK];
			$host->data = $data[ImportHost::FLD_DATA];
			$host->os = $data[ImportHost::FLD_OS];
			$host->osver = CStringUtil::_U($data[ImportHost::FLD_OSVER]);
			$host->bandwidth_type = $data[ImportHost::FLD_BANDWIDTH_TYPE];
			$host->bandwidth = $data[ImportHost::FLD_BANDWIDTH];
			$host->create_time = $data[ImportHost::FLD_CREATE_TIME];
			$host->expire_time = $data[ImportHost::FLD_EXPIRE_TIME];
			$host->price = $data[ImportHost::FLD_PRICE];
			$host->memo = CStringUtil::_U($data[ImportHost::FLD_MEMO]);

			$host->owner_id = $this->owner_id;
			$host->provider_id = $this->provider_id;
			
			if( $host->save() )  $suc_rows ++;
			else  {
				$err_msg =  '第'.$row.'行导入错误:' . CHtml::errorSummary($host,'','',array('firstError'=>true));
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
			$dst_file = './assets/upfile/hostcsv_'.time().'_'.rand(0,9999).'.'.$file->extensionName;
			$file->saveAs($dst_file);
			return $this->importFile($dst_file);
			// return array(true, 'OK');
		} else {
			return array(false,'非法的上传文件(上传失败)');
		}
	}
}
