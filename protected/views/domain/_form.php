<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'domain-form',
  'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
)); ?>

<p class="help-block">标有 <span class="required">*</span> 为必填项</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'dns',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'beian',array('class'=>'span5','maxlength'=>128)); ?>
<?php echo $form->datePickerRow($model,'create_time',array('options'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))); ?>
<?php echo $form->datePickerRow($model,'expire_time',array('options'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))); ?>


	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

       <?php echo $form->dropdownListRow($model,'owner_id', User::all(), array('class'=>'span5')); ?>

        <?php echo $form->dropdownListRow($model,'provider_id', Provider::all(), array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
