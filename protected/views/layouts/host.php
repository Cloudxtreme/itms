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
	array('label'=>'主机列表','url'=>array('admin'),
    'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/admin')
    ),
	array('label'=>'新增主机','url'=>array('create'),
	'active'=>CStringUtil::endWith( Yii::app()->controller->route, '/create')
	),
        array('label'=>'查看/修改','url'=>array('view&id=1'),
        'active'=>CStringUtil::contains( Yii::app()->controller->route, array('/view','/update'))
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
