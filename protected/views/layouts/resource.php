<?php /* @var $this Controller */ ?>
<?php Yii::import('application.vendor.CStringUtil'); ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span2">
<div class="well">
<?php
/* commonly shared resource menu */
$this->widget(
'bootstrap.widgets.TbMenu',
array(
'type'=>'pills',
'stacked'=>true,
'items'=> array(
	array('label'=>'资源列表','url'=>array('admin'),
    'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/admin')
    ),
	array('label'=>'新增资源','url'=>array('create'),
	'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/create')
	),
        array('label'=>'批量导入','url'=>array('import'),
        'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/import')
        ),
),

));
?>
</div>
</div><!-- span3 -->
<div class="span9">
<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>
