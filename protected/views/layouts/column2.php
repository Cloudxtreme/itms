<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span3">
<div class="well sidebar-nav">
<?php
$this->widget(
    'bootstrap.widgets.TbMenu',
     array(
	'type'=>'list',
	'items'=>$this->menu,
     )
);
?>
</div><!-- well -->
</div><!-- span3 -->
<div class="span9">
<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>
