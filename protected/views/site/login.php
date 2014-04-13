<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
// client MD5 of password
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . "/js/md5.js");

$this->pageTitle=Yii::app()->name . ' - 登录';
$this->breadcrumbs=array(
	'登录',
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions'=>array(
		'onsubmit'=>'return prePass()',	
	),
)); ?>
<script type="text/javascript">
function prePass() // md5 the inputed pass
{
	$('#LoginForm_password').val(hex_md5( $('#LoginForm_password').val() ));
	return true;
}
</script>
<p class="note">标注 <span class="required">*</span> 为必填项</p>
<?php
	echo $form->textFieldRow($model,'username',array('class'=>'span3'));
//	 echo $form->error($model,'username'); 
	echo $form->passwordFieldRow($model,'password',array('class'=>'span3'));
//		echo $form->error($model,'password'); 
	echo $form->captchaRow($model, 'verifyCode');
		echo $form->checkBoxRow($model,'rememberMe'); 
//		echo $form->error($model,'rememberMe'); 
//		echo CHtml::submitButton('Login',array('class'=>'btn')); 
?>
<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
                        'type'=>'primary',
                        'label'=>'登录',
                )); ?>
</div>


<?php $this->endWidget(); ?>
