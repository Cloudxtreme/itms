<?php
$this->breadcrumbs=array(
	'资源',
);

$this->menu=array(
array('label'=>'新增资源','url'=>array('create')),
array('label'=>'管理资源','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
