<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'stat-form',
	'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
)); ?>

<p class="help-block">标有 <span class="required">*</span> 为必填项</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'siteid',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->passwordFieldRow($model,'view_pass',array('class'=>'span5','maxlength'=>128)); ?>

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
