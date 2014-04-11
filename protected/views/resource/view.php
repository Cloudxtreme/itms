<?php
$this->breadcrumbs=array(
	'Resources'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Resource','url'=>array('index')),
array('label'=>'Create Resource','url'=>array('create')),
array('label'=>'Update Resource','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Resource','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Resource','url'=>array('admin')),
);
?>

<h1>View Resource #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'type',
		'ip',
		'location',
		'login_user',
		'login_pass',
		'cores',
		'memory',
		'disk',
		'data',
		'os',
		'osver',
		'bandwidth_type',
		'bandwidth',
		'create_time',
		'expire_time',
		'owner_id',
		'provider_id',
		'memo',
),
)); ?>
