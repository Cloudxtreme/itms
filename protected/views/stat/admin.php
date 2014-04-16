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
        $.post('./?r=stat/bulkdelete', 
        {ids:ids}, 
        function(result){ 
                $('#bdfResult').html('<div class="alert alert-success">'+result+'</div>'); 
                $('#bdfResult').css('display',''); 
                $('#stat-grid').yiiGridView('update');
        });
}
</script>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'type' => 'striped bordered',
'id'=>'stat-grid',
'template' => "{items}\n{pager}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'bulkActions'=>array(
'noCheckedMessage' => '没有选择任何数据!',
'actionButtons' => array(
array('id'=>'bulk_delete','buttonType' => 'button', 'type' => 'danger', 'size'=>'','label'=>'批量删除', 'click'=>'js:openBulkDeleteForm'),
),
'checkBoxColumnConfig' => array( 'name'=>'id'),
),
'columns'=>array(
		'id',
		'name',
		'siteid',
		'view_pass',
		'owner_id',
		'provider_id',
		/*
		'memo',
		*/

array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>