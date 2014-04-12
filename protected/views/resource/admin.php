<?php
$this->breadcrumbs=array(
	'Resources'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Resource','url'=>array('index')),
array('label'=>'Create Resource','url'=>array('create')),
);
?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'type' => 'striped bordered',
'id'=>'resource-grid',
'template' => "{items}\n{pager}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'bulkActions'=>array(
	'actionButtons' => array(
		array('id'=>'mod_expire','buttonType' => 'button', 'type' => 'primary', 'size' => 'small', 'label'=>'批量修改过期时间', 'click'=>'js:function(values){console.log(values);}'),
	),
	'checkBoxColumnConfig' => array( 'name'=>'id'),
),
'columns'=>array(
		'id',
		array('name'=>'type','value'=>'Lookup::item("ResourceType",$data->type)','filter'=>Lookup::items('ResourceType')),
		'ip',
		'location',
		'login_user',
		array('name'=>'login_pass', 'value'=>'"*****"', 'filter'=>false),
		
		'cores',
		'memory',
		/* 'disk',
		'data',
		'bandwidth_type',
		'bandwidth',
		'create_time',
		'expire_time',
		
		'owner_id',
		'provider_id',
		'memo',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
<!--
<script type="text/javascript">
jQuery(function($) {
 $(document).on('mouseenter', '[rel=tooltip]', function () {
        $(this).tooltip({
            container: 'body',
            trigger: 'manual'
        }).tooltip('show');
    });
    $(document).on('mouseleave', '[rel=tooltip]', function () {
        $(this).tooltip('hide');
    });
});
</script>
-->
