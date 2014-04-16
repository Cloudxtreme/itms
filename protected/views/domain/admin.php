<!-- bulkTimeForm -->
<div id="bulkTimeForm" class="modal hide fade">
<div class="modal-header"><a class="close" data-dismiss="modal">&times;</a><h4>批量修改过期时间</h4></div>
<div class="modal-body">
<p>待修改资源ID列表:<span id="btfIDList"></span></p>
请输入新的过期时间:<br><input name="expire" type="text" id="btfExpire"><br>
<input name="ids" id="btfIDs" type="hidden">
<button class="btn btn-info" onclick="postBulkTimeForm()">设置</button>
<p><div id="btfResult" src=""></div></p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
</div>
</div> <!-- bulkTimeForm -->
<!-- bulkDeleteForm -->
<div id="bulkDeleteForm" class="modal hide fade">
<div class="modal-header"><a class="close" data-dismiss="modal">&times;</a><h4>批量删除记录</h4></div>
<div class="modal-body">
<p>待删除记录ID列表:<span id="bdfIDList"></span></p>
<input name="ids" id="bdfIDs" type="hidden">
<button class="btn btn-danger" onclick="postBulkDeleteForm()">确认删除</button>
<p><div id="bdfResult" src=""></div></p>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
</div>
</div> <!-- bulkDeleteForm -->
<script type="text/javascript">
function openBulkTimeForm(values) {
        var dstr = '';
        var first = true;
        $.each(values, function(i,val) {
                if( first ) first = false;
                else dstr += ",";
                dstr += val.value;
        });
        $('#btfIDList').text(dstr);
        $('#btfIDs').val(dstr);
        $('#btfResult').css('display','none');
        $('#bulkTimeForm').modal('show');
        $('#btfExpire').focus();
}
function postBulkTimeForm() {
        var ids = $('#btfIDs').val();
        var expire = $('#btfExpire').val();
        if( ids.length == 0 || expire.length == 0) { alert('不能为空!'); return; }
        if( !expire.match(/^([1-2]\d{3})[\/|\-](0?[1-9]|10|11|12)[\/|\-]([1-2]?[0-9]|0[1-9]|30|31)$/)) { alert('非法的日期格式!'); r
eturn; }
        $.post('./?r=domain/bulkexpire', 
        {ids:ids, expire:expire}, 
        function(result){ 
                $('#btfResult').html('<div class="alert alert-success">'+result+'</div>'); 
                $('#btfResult').css('display',''); 
                $('#domain-grid').yiiGridView('update');
        });
}
function openBulkDeleteForm(values) {
        var dstr = '';
        var first = true;
        $.each(values, function(i,val) {
                if( first ) first = false;
                else dstr += ",";
                dstr += val.value;
        });
        $('#bdfIDList').text(dstr);
        $('#bdfIDs').val(dstr);
        $('#bdfResult').css('display','none');
        $('#bulkDeleteForm').modal('show');
}
function postBulkDeleteForm() {
        var ids = $('#bdfIDs').val();
        if( ids.length == 0) { alert('不能为空!'); return; }
        $.post('./?r=domain/bulkdelete', 
        {ids:ids}, 
        function(result){ 
                $('#bdfResult').html('<div class="alert alert-success">'+result+'</div>'); 
                $('#bdfResult').css('display',''); 
                $('#domain-grid').yiiGridView('update');
        });
}
</script>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'type' => 'striped bordered',
'id'=>'domain-grid',
'template' => "{items}\n{pager}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'bulkActions'=>array(
        'noCheckedMessage' => '没有选择任何数据!',
        'actionButtons' => array(
array('id'=>'mod_expire','buttonType' => 'button', 'type' => 'primary', 'size'=>'','label'=>'批量修改过期时间', 'click'=>'js:openBulkTimeForm'),
	array('id'=>'bulk_delete','buttonType' => 'button', 'type' => 'danger', 'size'=>'','label'=>'批量删除', 'click'=>'js:openBulkDeleteForm'),
        ),
        'checkBoxColumnConfig' => array( 'name'=>'id'),
),
'columns'=>array(
                array('name'=>'id','headerHtmlOptions'=>array('width'=>'50px')),
		'name',
		'dns',
		'beian',
                array('name'=>'create_time','value'=>'substr($data->create_time,0,10)'),
                array('name'=>'expire_time','value'=>'substr($data->expire_time,0,10)',
                        'class'=>'bootstrap.widgets.TbEditableColumn',
//                      'editable'=>array('type'=>'text','title'=>'输入过期日期','url'=>'./?r=host/sinmod')
                       'editable'=>array('type'=>'date','title'=>'输入过期日期','url' => './?r=domain/sinmod', 'options'=>array('datepicker'=>array('language'=>'zh-CN','format'=>'yyyy-mm-dd'))  )
                ),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
