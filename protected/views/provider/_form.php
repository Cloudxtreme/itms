<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'provider-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'login_user',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'login_pass',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'login_url',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'admin_user',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'admin_pass',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'admin_url',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'payment_type',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'payment_info',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
