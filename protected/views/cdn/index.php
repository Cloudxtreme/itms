<?php
$this->breadcrumbs=array(
	'Cdns',
);

$this->menu=array(
array('label'=>'Create Cdn','url'=>array('create')),
array('label'=>'Manage Cdn','url'=>array('admin')),
);
?>

<h1>Cdns</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
