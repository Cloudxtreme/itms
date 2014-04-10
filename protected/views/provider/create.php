<?php
$this->breadcrumbs=array(
	'提供商'=>array('index'),
	'新增提供商',
);

$this->menu=array(
array('label'=>'提供商列表','url'=>array('index')),
array('label'=>'管理提供商','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
