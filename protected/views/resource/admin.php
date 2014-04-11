<?php
$this->breadcrumbs=array(
	'Resources'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Resource','url'=>array('index')),
array('label'=>'Create Resource','url'=>array('create')),
);
?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'type' => 'striped bordered',
'id'=>'resource-grid',
'template' => "{items}\n{pager}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'bulkActions'=>array(
	'actionButtons' => array(
		array('id'=>'mod_expire','buttonType' => 'button', 'type' => 'primary', 'size' => 'small', 'label'=>'批量修改过期时间', 'click'=>'js:function(values){console.log(values);}'),
	),
	'checkBoxColumnConfig' => array( 'name'=>'id'),
),
'columns'=>array(
		'id',
		'type',
		'ip',
		'location',
		'login_user',
		'login_pass',
		
		'cores',
		'memory',
		/* 'disk',
		'data',
		'bandwidth_type',
		'bandwidth',
		'create_time',
		'expire_time',
		
		'owner_id',
		'provider_id',
		'memo',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
