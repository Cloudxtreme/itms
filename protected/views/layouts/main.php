<?php /* @var $this Controller */ ?>
<?php Yii::import('application.vendor.CStringUtil'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
</head>

<body>

<?php
$this->widget(
    'bootstrap.widgets.TbNavbar',
    array(
        'type' => 'inverse',
        'brand' => CHtml::encode(Yii::app()->name),
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => 'top',
	'fluid' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => '主页', 'url' => './?r=site/index', 'active' => CStringUtil::startWith(Yii::app()->controller->route, 'site') ),
		    array('label' => '资源', 'url' => './?r=resource', 'active' => CStringUtil::startWith(Yii::app()->controller->route, 'resource') ),
		    array('label' => '提供商', 'url' => './?r=provider','active' => CStringUtil::startWith(Yii::app()->controller->route, 'provider') ),
		    array('label' => '用户', 'url' => './?r=user','active' => CStringUtil::startWith(Yii::app()->controller->route, 'user') ),
                ),
            ),
            '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="查找"></form>',
	    array(
		'class' => 'bootstrap.widgets.TbMenu',
		'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
		    array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		    array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
        	),
    	    )
	)
   )
);
?>

<?php 
if(isset($this->breadcrumbs))
{
  $this->widget(
	'bootstrap.widgets.TbBreadcrumbs', 
	array('links'=>$this->breadcrumbs,)
  ); 
}
?>

<div class="container-fluid">
<div class="row-fluid">

	<?php echo $content; ?>

</div><!-- row -->
</div><!-- container -->

</body>
</html>
