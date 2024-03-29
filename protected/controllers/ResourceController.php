<?php
Yii::import('yiibooster.widgets.TbEditableSaver');

class ResourceController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/resource';

public $defaultAction='admin';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

public function actionGenpass($id)
{
$model=$this->loadModel($id);
$model->genLoginImage();
}

// 更新一组记录的expire_time
public function actionBulkexpire()
{
$ids_str =  explode(',',$_POST['ids']);
$ids = array_map('intval', $ids_str);

$cri = new CDbCriteria();
$cri->addInCondition('id', $ids);

$expire = $_POST['expire'];

$ret = Resource::model()->updateAll(
	array('expire_time'=>$expire),
	$cri 
);

if( $ret) echo 'success';
else echo 'fail';
}

// 更新单个记录的expire_time
public function actionSinexpire()
{
	$saver = new TbEditableSaver('resource');
	$saver->update();
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Resource;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Resource']))
{
$model->attributes=$_POST['Resource'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Resource']))
{
$model->attributes=$_POST['Resource'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Resource');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Resource('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Resource']))
$model->attributes=$_GET['Resource'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Import CSV file
*/
public function actionImport()
{
$model=new ImportForm;
          
// if it is ajax validation request
if(isset($_POST['ajax']) && $_POST['ajax']==='resource-import-form')
{               
echo CActiveForm::validate($model);
Yii::app()->end();
}
// collect user input data
if(isset($_POST['ImportForm']))
{
	$model->attributes=$_POST['ImportForm'];
        // validate user input and redirect to the previous page if valid
        if($model->validate())
	{
		list($ret, $msg) = $model->import();
		if($ret)
			Yii::app()->user->setFlash('success', $msg);
		else
			Yii::app()->user->setFlash('error', $msg);

		$this->refresh();
//		$this->redirect(Yii::app()->user->returnUrl);
	}
}       
// display the login form
$this->render('import',array('model'=>$model));
}                       

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Resource::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='resource-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
