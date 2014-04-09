<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>128)); ?>

		<?php echo $form->textFieldRow($model,'login_user',array('class'=>'span5','maxlength'=>128)); ?>

		<?php echo $form->textFieldRow($model,'login_pass',array('class'=>'span5','maxlength'=>128)); ?>

		<?php echo $form->textFieldRow($model,'cores',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'memory',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'disk',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'data',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'bandwidth_type',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'bandwidth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'expire_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'owner_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'provider_id',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
