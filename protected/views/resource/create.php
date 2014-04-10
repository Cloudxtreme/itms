<?php
$this->breadcrumbs=array(
	'资源'=>array('index'),
	'新增资源',
);

$this->menu=array(
array('label'=>'资源列表','url'=>array('index')),
array('label'=>'管理资源','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
