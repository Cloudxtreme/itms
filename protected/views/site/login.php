<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 登录';
$this->breadcrumbs=array(
	'登录',
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php
	echo $form->textFieldRow($model,'username',array('class'=>'span5'), array('label'=>'用户名'));
	 echo $form->error($model,'username'); 
	echo $form->passwordFieldRow($model,'password',array('class'=>'span5'), array('label'=>'密码'));
		echo $form->error($model,'password'); 
		echo $form->checkBoxRow($model,'rememberMe'); 
		echo $form->error($model,'rememberMe'); 
		echo CHtml::submitButton('Login',array('class'=>'btn')); 
?>
<?php $this->endWidget(); ?>
