<h4>查看 Cdn #<?php echo $model->id; ?></h4>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'quota',
		'create_time',
		'expire_time',
                array('name'=>'owner_id','value'=>User::getName($model->owner_id)),
                array('name'=>'provider_id','value'=>Provider::getName($model->provider_id)),
		'price',
		'memo',
),
)); ?>
<div class='span2'><?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'继续添加','url'=>$this->createUrl('cdn/create'))); ?></div><div class='span2'>
<?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'修改','url'=>$this->createUrl('cdn/update', array('id'=>$model->id) ) )); ?></div>
