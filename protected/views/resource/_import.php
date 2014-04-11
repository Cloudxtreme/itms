<?php
$this->widget('bootstrap.widgets.TbAlert', array(
	'alerts'=>array('success','error'),
));
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'resource-import-form',
	'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
//	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">标有 <span class="required">*</span> 为必填项</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropdownListRow($model,'owner_id', User::all(), array('class'=>'span5')); ?>
	<?php echo $form->dropdownListRow($model,'provider_id', Provider::all(), array('class'=>'span5')); ?>
	
	<?php echo $form->fileFieldRow($model,'csv_file',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'导入',
		)); ?>
</div>

<?php $this->endWidget(); ?>
