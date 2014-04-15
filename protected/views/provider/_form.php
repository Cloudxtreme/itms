<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'provider-form',
       'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
)); ?>

<p class="help-block">标注 <span class="required">*</span> 的为必填项.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->dropdownListRow($model,'type', Lookup::items('ProviderType'), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'login_user',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->passwordFieldRow($model,'login_pass',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'login_url',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'admin_user',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->passwordFieldRow($model,'admin_pass',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'admin_url',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->dropdownListRow($model,'payment_type',Lookup::items('ProviderPaymentType'), array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'payment_info',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
