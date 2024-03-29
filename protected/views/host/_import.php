<?php if( !Yii::app()->user->hasFlash('success') && !Yii::app()->user->hasFlash('error')): ?>
<div class="alert alert-info">
<p>
快速从文本文件(.CSV格式，以逗号分隔字段)中批量导入主机信息。所导入的主机必须是归属同一所有者和同一提供商。如果文本中任何一条记录出现格式错误，将不会发生任何数据导入。点击按钮下载CSV样本文件。
</p>
<p>
<?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'type' => 'info',
//                'size' => 'large',
		'url' => './sample/sample_host.csv',
                'label' => '下载主机信息CSV样本',
            )
); ?></p>
</div>
<?php endif; ?>

<?php
$this->widget('bootstrap.widgets.TbAlert', array(
'alerts'=>array('success','error'),
));
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'host-import-form',
'enableClientValidation'=>true,
'clientOptions'=>array(
	'validateOnSubmit'=>true,
),
'htmlOptions'=>array('enctype'=>'multipart/form-data'),
//	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">标有 <span class="required">*</span> 为必填项 </p> 

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
