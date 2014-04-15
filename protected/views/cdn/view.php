<?php
$this->breadcrumbs=array(
	'Cdns'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Cdn','url'=>array('index')),
array('label'=>'Create Cdn','url'=>array('create')),
array('label'=>'Update Cdn','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Cdn','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cdn','url'=>array('admin')),
);
?>

<h1>View Cdn #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'quota',
		'create_time',
		'expire_time',
		'owner_id',
		'provider_id',
		'price',
		'memo',
),
)); ?>
