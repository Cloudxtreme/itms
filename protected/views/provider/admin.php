<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . "/js/md5.js");
$this->breadcrumbs=array(
	'Providers'=>array('index'),
	'Manage',
);
?>
<!-- viewLogin modal Form -->
<div id="viewLoginForm" class="modal hide fade">
<div class="modal-header"><a class="close" data-dismiss="modal">&times;</a><h4>查看登录信息</h4></div>
<div class="modal-body">
<p>提供商信息:<span id="vlfIP"></span></p>
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
        pass = hex_md5(pass);
        $('#vlfResult').attr('src','./?r=provider/genpass&id='+id+'&pass='+pass);
        $('#vlfResult').css('display','');
}
</script>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'type' => 'striped bordered',
'id'=>'resource-grid',
'template' => "{items}\n{pager}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
array('name'=>'id','headerHtmlOptions'=>array('width'=>'50px')),
'name',
'login_user',
array('name'=>'type','value'=>'Lookup::item("ProviderType",$data->type)','filter'=>Lookup::items('ProviderType')),
array('header'=>'登录信息','type'=>'raw','value'=>'"<a href=\"javascript:openViewLoginForm({$data->id},\'{$data->name}
({$data->login_user})\')\">查看</a>"', 'filter'=>false),
array('name'=>'payment_type','value'=>'Lookup::item("ProviderPaymentType",$data->payment_type)','filter'=>Lookup::items('ProviderPaymentType')),
'payment_info',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
