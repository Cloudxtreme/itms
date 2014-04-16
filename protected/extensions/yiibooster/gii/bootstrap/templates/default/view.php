<h4>查看 <?php echo $this->modelClass . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h4>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
	echo "\t\t'" . $column->name . "',\n";
}
?>
),
)); ?>
<div class='span2'><?php echo "<?php
\$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'继续添加','url'=>\$this->createUrl('". $this->class2id($this->modelClass). "/create'))); ?>"; ?></div><div class='span2'>
<?php echo "<?php
\$this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','label'=>'修改','url'=>\$this->createUrl('". $this->class2id($this->modelClass). "/update', array('id'=>\$model->id) ) )); ?>"; ?></div>
