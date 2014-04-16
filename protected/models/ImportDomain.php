<?php
/**
 * ImportDomain class.
 * 用于导入CSV数据到域名表中,  action: domain/import
 */
Yii::import('application.vendor.CStringUtil');

class ImportDomain extends CFormModel
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
	const FLD_NAME = 0;
	const FLD_DNS = 1;
	const FLD_BEIAN = 2;
	const FLD_CREATE_TIME = 3;
	const FLD_EXPIRE_TIME = 4;
	const FLD_PRICE = 5;
	const FLD_MEMO = 6;
	const FLD_END = 7;

	private function importFile($filename)
	{
		$row = 0;   // 当前行号
		$err_rows = 0;  //  错误行数
		$suc_rows = 0;  //  成功行数
		$err_msg = '';   //  错误累加信息
		
		$handle = fopen($filename,"r");

		if($handle === false) return array(false, '无法打开上传文件');
		$transaction=Domain::model()->dbConnection->beginTransaction();
		//fgetcsv() 解析读入的行并找出 CSV格式的字段然后返回一个包含这些字段的数组。 
		
		// 开始数据库事务，任何一条记录导入失败，则回退，防止csv被修正后重复导入!
		// 不用使用 fgetcsv ! 对中文处理有bug
		while ( ($line = fgets($handle)) !== false) {
			$row ++;   // 记录行号
			$data = explode(",", $line);
    			$num = count($data);
			if($num != ImportDomain::FLD_END) continue;  // 跳过字段不完整行
			if(CStringUtil::startWith($data[0],'#')) continue;  // 跳过注释

			// 开始导入
			
			$domain = new Domain();
			$domain->name = $data[ImportDomain::FLD_NAME];
			$domain->dns = $data[ImportDomain::FLD_DNS];
			$domain->beian = CStringUtil::_U($data[ImportDomain::FLD_BEIAN]);
			$domain->create_time = $data[ImportDomain::FLD_CREATE_TIME];
			$domain->expire_time = $data[ImportDomain::FLD_EXPIRE_TIME];
			$domain->price = $data[ImportDomain::FLD_PRICE];
			$domain->memo = CStringUtil::_U($data[ImportDomain::FLD_MEMO]);

			$domain->owner_id = $this->owner_id;
			$domain->provider_id = $this->provider_id;
			
			if( $domain->save() )  $suc_rows ++;
			else  {
				$err_msg =  '第'.$row.'行导入错误:' . CHtml::errorSummary($domain,'','',array('firstError'=>true));
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
			$dst_file = './assets/upfile/domaincsv_'.time().'_'.rand(0,9999).'.'.$file->extensionName;
			$file->saveAs($dst_file);
			return $this->importFile($dst_file);
			// return array(true, 'OK');
		} else {
			return array(false,'非法的上传文件(上传失败)');
		}
	}
}
