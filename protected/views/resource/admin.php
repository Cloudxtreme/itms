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
<! -- viewLogin modal Form -->
<div id="viewLoginForm" class="modal hide fade">
<div class="modal-header"><a class="close" data-dismiss="modal">&times;</a><h4>查看登录信息</h4></div>
<div class="modal-body">
<p>IP地址:<span id="vlfIP"></span></p>
请输入用户口令: <br><input name="pass" type="password" id="vlfPass"><br>
<input name="id" id="vlfID" type="hidden">
<button class="btn btn-info" onclick="postViewLoginForm()">查看</button>
<p><img id="vlfResult" src=""></img></p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
</div>
</div> <!-- viewLogin modal Form -->
<script type="text/javascript">
function openViewLoginForm(id, ip) {
	$('#vlfIP').text(ip);
	$('#vlfID').val(id);
	$('#vlfPass').val('');
	$('#vlfResult').css('display','none');
	$('#viewLoginForm').modal('show');
	$('#vlfPass').focus();
}
function postViewLoginForm() {
	var id = $('#vlfID').val();
	var pass = $('#vlfPass').val();
	if( id.length == 0 || pass.length == 0) { alert('不能为空!'); return; }
	$('#vlfResult').attr('src','./?r=resource/genpass&id='+id+'&pass='+pass);
	$('#vlfResult').css('display','');
}
</script>
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
		array('name'=>'id','headerHtmlOptions'=>array('width'=>'50px')),
		array('name'=>'type','value'=>'Lookup::item("ResourceType",$data->type)','filter'=>Lookup::items('ResourceType')),
		'ip',
		'location',
//		'login_user',
		array('header'=>'登录信息','type'=>'raw','value'=>'"<a href=\"javascript:openViewLoginForm({$data->id},\'{$data->ip}\')\">查看</a>"', 'filter'=>false),
		array('header'=>'配置','value'=>'"{$data->cores}核,{$data->memory}M内存,{$data->disk}G系统盘,{$data->data}G数据盘". Lookup::item("ResourceOS",$data->os)." ".$data->osver','filter'=>false),	
		array('header'=>'带宽','value'=>'Lookup::item("ResourceBandwidthType",$data->bandwidth_type)." {$data->bandwidth}M"', 'filter'=>false),
		array('name'=>'create_time','value'=>'substr($data->create_time,0,10)'),
		array('name'=>'expire_time','value'=>'substr($data->expire_time,0,10)',
			'class'=>'bootstrap.widgets.TbEditableColumn',
			'editable'=>array('type'=>'text','title'=>'输入过期日期','url'=>'/example')
//			'editable'=>array('type'=>'date','title'=>'输入过期日期','url' => '/example/editable', 'options'=>array('datepicker'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))  )
		),

		/*	
		'owner_id',
		'provider_id',
		'memo',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
