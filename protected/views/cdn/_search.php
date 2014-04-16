<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

		<?php echo $form->textFieldRow($model,'quota',array('class'=>'span5')); ?>

		<?php echo $form->datePickerRow($model,'create_time',array('options'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))); ?>

		<?php echo $form->datePickerRow($model,'expire_time',array('options'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))); ?>

		<?php echo $form->textFieldRow($model,'owner_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'provider_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
