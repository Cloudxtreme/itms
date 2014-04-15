<?php
$this->breadcrumbs=array(
	'Stats'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Stat','url'=>array('index')),
array('label'=>'Manage Stat','url'=>array('admin')),
);
?>

<h1>Create Stat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>