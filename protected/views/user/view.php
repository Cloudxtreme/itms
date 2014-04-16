<h4>查看 User #<?php echo $model->id; ?></h4>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'profile',
),
)); ?>
<div class='span2'><?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'继续添加','url'=>$this->createUrl('user/create'))); ?></div><div class='span2'>
<?php
$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'修改','url'=>$this->createUrl('user/update', array('id'=>$model->id) ) )); ?></div>
