<h4>查看主机 #<?php echo $model->id; ?></h4>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		// 'type',
		array('name'=>'type','value'=>Lookup::item("HostType",$model->type)),
		'ip',
		'location',
		'login_user',
		array('name'=>'login_pass','value'=>'***'),
		'cores',
		'memory',
		'disk',
		'data',
		// 'os',
		array('name'=>'os','value'=>Lookup::item("HostOS",$model->os)),
		'osver',
		// 'bandwidth_type',
		array('name'=>'bandwidth_type','value'=>Lookup::item("HostBandwidthType",$model->bandwidth_type)),
		'bandwidth',
		'create_time',
		'expire_time',
		'price',
		'owner_id',
		'provider_id',
		'memo',
),
)); ?>
<div class='span2'><?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'继续添加','url'=>$this->createUrl('host/create')))
;
?></div><div class='span2'>
<?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'修改','url'=>$this->createUrl('host/update', array
('id'=>$model->id) ) ));
?></div>
