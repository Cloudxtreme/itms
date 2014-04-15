<?php
$this->breadcrumbs=array(
	'Providers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Provider','url'=>array('index')),
	array('label'=>'Create Provider','url'=>array('create')),
	array('label'=>'View Provider','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Provider','url'=>array('admin')),
	);
	?>

	<h4>编辑提供商信息 #<?php echo $model->id; ?></h4>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
