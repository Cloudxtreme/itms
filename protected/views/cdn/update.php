<?php
$this->breadcrumbs=array(
	'Cdns'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cdn','url'=>array('index')),
	array('label'=>'Create Cdn','url'=>array('create')),
	array('label'=>'View Cdn','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Cdn','url'=>array('admin')),
	);
	?>

	<h1>Update Cdn <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>