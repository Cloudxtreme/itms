<?php 
$this->beginWidget(
    'bootstrap.widgets.TbHeroUnit',
    array(
        'heading' => '批量导入资源信息',
    )
); ?>
<p>
快速从文本文件中批量导入资源信息，如果文本中任何一条记录出现格式错误，将不会发生任何数据导入。点击按钮下载CSV样本文件。
</p>
<p>
<?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'type' => 'info',
                'size' => 'large',
		'url' => './sample/sample.csv',
                'label' => '下载CSV样本',
            )
); ?></p>
 
<?php $this->endWidget(); ?>

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
