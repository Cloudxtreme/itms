<?php
$this->breadcrumbs=array(
	'Providers'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Provider','url'=>array('index')),
array('label'=>'Create Provider','url'=>array('create')),
array('label'=>'Update Provider','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Provider','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Provider','url'=>array('admin')),
);
?>

<h4>资源提供商 #<?php echo $model->id; ?></h4>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		array('name'=>'type','value'=>Lookup::item("ProviderType",$model->type)),
		'login_user',
		array('name'=>'login_pass','value'=>'***'),
		array('name'=>'login_url','type'=>'raw','value'=>CHtml::link($model->login_url,$model->login_url,array('target'=>'_blank'))),
		'admin_user',
		array('name'=>'admin_pass','value'=>'***'),
		'admin_url',
		array('name'=>'payment_type','value'=>Lookup::item("ProviderPaymentType",$model->payment_type)),
		'payment_info',
),
)); ?>
<div class='span2'><?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'继续添加','url'=>$this->createUrl('provider/create')));
?></div><div class='span2'>
<?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'修改','url'=>$this->createUrl('provider/update', array('id'=>$model->id) ) ));
?></div>
