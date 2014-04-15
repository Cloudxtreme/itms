<?php
$this->breadcrumbs=array(
	'Stats'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Stat','url'=>array('index')),
array('label'=>'Create Stat','url'=>array('create')),
array('label'=>'Update Stat','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Stat','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Stat','url'=>array('admin')),
);
?>

<h1>View Stat #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'siteid',
		'view_pass',
		'owner_id',
		'provider_id',
		'memo',
),
)); ?>
