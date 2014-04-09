<?php
$this->breadcrumbs=array(
	'Providers'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Provider','url'=>array('index')),
array('label'=>'Create Provider','url'=>array('create')),
array('label'=>'Update Provider','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Provider','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Provider','url'=>array('admin')),
);
?>

<h1>View Provider #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'login_user',
		'login_pass',
		'login_url',
		'admin_user',
		'admin_pass',
		'admin_url',
		'payment_type',
		'payment_info',
),
)); ?>
