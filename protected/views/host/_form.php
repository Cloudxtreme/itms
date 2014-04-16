<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'host-form',
	'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
//	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">标有 <span class="required">*</span> 为必填项</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropdownListRow($model,'type', Lookup::items('HostType'), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ip',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'login_user',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->passwordFieldRow($model,'login_pass',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'cores',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'memory',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'disk',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'data',array('class'=>'span5')); ?>
	<?php echo $form->dropdownListRow($model,'os',Lookup::items('HostOS'), array('class'=>'span5')); ?>
	<?php echo $form->textFieldRow($model,'osver',array('class'=>'span5')); ?>
	<?php echo $form->dropdownListRow($model,'bandwidth_type',Lookup::items('HostBandwidthType'), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bandwidth',array('class'=>'span5')); ?>

	<?php echo $form->datePickerRow($model,'create_time',array('options'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))); ?>

	<?php echo $form->datePickerRow($model,'expire_time',array('options'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))); ?>

	<?php echo $form->dropdownListRow($model,'owner_id', User::all(), array('class'=>'span5')); ?>

	<?php echo $form->dropdownListRow($model,'provider_id', Provider::all(), array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '添加' : '保存',
		)); ?>
</div>

<?php $this->endWidget(); ?>
