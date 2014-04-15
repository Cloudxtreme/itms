<?php
$this->breadcrumbs=array(
	'Stats',
);

$this->menu=array(
array('label'=>'Create Stat','url'=>array('create')),
array('label'=>'Manage Stat','url'=>array('admin')),
);
?>

<h1>Stats</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
