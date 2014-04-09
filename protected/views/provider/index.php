<?php
$this->breadcrumbs=array(
	'Providers',
);

$this->menu=array(
array('label'=>'Create Provider','url'=>array('create')),
array('label'=>'Manage Provider','url'=>array('admin')),
);
?>

<h1>Providers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
