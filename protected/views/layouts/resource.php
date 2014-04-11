<?php /* @var $this Controller */ ?>
<?php Yii::import('application.vendor.CStringUtil'); ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span2">
<div class="well sidebar-nav">
<?php
/* commonly shared resource menu */
$this->widget(
'bootstrap.widgets.TbMenu',
array(
'type'=>'list',
'items'=> array(
	array('label'=>'资源列表','url'=>array('index'),
    'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/index')
    ),
	array('label'=>'新增资源','url'=>array('create'),
	'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/create')
	),
        array('label'=>'导入CSV文件','url'=>array('import'),
        'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/import')
        ),
),

));
?>
</div><!-- well -->
</div><!-- span3 -->
<div class="span9">
<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>
