<?php
$this->breadcrumbs=array(
	'Cdns'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Cdn','url'=>array('index')),
array('label'=>'Manage Cdn','url'=>array('admin')),
);
?>

<h1>Create Cdn</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>