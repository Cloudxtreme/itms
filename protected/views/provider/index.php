<?php
$this->breadcrumbs=array(
	'提供商',
);

$this->menu=array(
array('label'=>'新增提供商','url'=>array('create')),
array('label'=>'管理提供商','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
