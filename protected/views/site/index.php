<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$cs=Yii::app()->getClientScript();
$cs->registerCssFile('./css/modern.css');
$cs->registerScriptFile('./js/tile-slider.js');

// $cs->registerCssFile('./css/modern-responsive.css');
?>
<div class="row-fluid">
<div style="width:940px">
<!-- <div style="width: 940px;margin: auto;background-color: #fff;"> -->
<!-- <iframe frameborder="0" width="970px" height="800px" scrolling="no" src="./dashboard/"></iframe> -->
<div class="tiles clearfix">
<h4>欢迎来到IT管家!</h4>
<div class="tile image">
	<div class="tile-content">
    <img alt="" src="./images/myface.jpg">
    </div>
</div>

<div class="tile icon" onclick="top.location.href='./?r=host'">
	<div class="tile-content">
    	<img src="./images/Mail128.png">
    </div>
    <div class="brand">
    	<div class="badge">10</div>
    	<div class="name">信息</div>
    </div>
</div>

<div class="tile bg-color-orangeDark icon">
<b class="check"></b>
	<div class="tile-content">
		<img alt="" src="./images/Video128.png">
	</div>
    <div class="brand">
    	<span class="name">视频</span>
    </div>
</div>

<div class="tile double image">
	<div class="tile-content">
    <img alt="" src="images/5.jpg">
    </div>
    <div class="brand">
    	<span class="name">图片</span>
        <div class="badge bg-color-orange">5</div>
    </div>
</div>

<div class="tile double-vertical bg-color-yellow icon">
	<div class="tile-content">
		<img src="images/Calendar128.png">
    </div>
    <div class="brand">
        <span class="name">日历</span>
    </div>
</div>

<div class="tile bg-color-green icon">
	<b class="check"></b>
    <div class="tile-content">
		<img src="./images/Market128.png">
    </div>
    <div class="brand">
		<span class="name">Store</span>
    	<span class="badge">6</span>
    </div>
</div>

<div class="tile bg-color-red icon">
	<div class="tile-content">
		<img alt="" src="./images/Music128.png">
    </div>
    <div class="brand">
		<span class="name">Music</span>
    </div>
</div>

<div class="tile double bg-color-blueDark">
	<div class="tile-content">
		<img class="place-left" src="./images/michael.jpg">
        <h4 style="margin-bottom: 5px;">michael_angiulo</h4>
        <p>我们改变世界，重新定义流量价值.</p>
        <p></p>
     </div>
</div>

<div class="tile bg-color-darken icon">
	<div class="tile-content">
	    <img alt="" src="./images/YouTube128.png">
    </div>
    <div class="brand">
		<span class="name">YouTube</span>
    </div>
</div>

<div class="tile icon">
	<div class="tile-content">
		<img src="./images/excel2013icon.png">
	</div>
	<div class="brand">
		<span class="name">Excel 2013</span>
    </div>
</div>

<div data-param-period="3000" data-role="tile-slider" class="tile double bg-color-green">
	<div class="tile-content">
		<h4>mattberg@live.com</h4>
        <h5>Re: Wedding Annoucement!</h5>
        <p>从来都没有救世主...</p>
    </div>
   <div class="tile-content">
        <h4>clickwise@admin.com</h4>
        <h5>用户喜好永不违背!</h5>
        <p>在愉悦中接受产品</p>
    </div>
    <div class="brand">
		<div class="badge">12</div>
        <img src="images/Mail128.png" class="icon">
    </div>
</div>

<div class="tile double image">
	<div class="tile-content">
		<img alt="" src="./images/4.jpg">
    </div>
    <div class="brand bg-color-orange">
		<img src="./images/Rss128.png" class="icon">
		<p class="text">This is a desert eagle. He is very hungry and angry bird.</p>
        <div class="badge">10</div>
     </div>
</div>

<div data-param-period="3000" data-param-direction="left" data-role="tile-slider" class="tile double image-slider">
	<div class="tile-content">
	<img alt="" src="./images/1.jpg">
	</div>
    <div class="tile-content">
    <img alt="" src="./images/2.jpg">
    </div>
    <div class="tile-content">
    <img alt="" src="./images/3.jpg">
    </div>
    <div class="tile-content">
    <img alt="" src="./images/4.jpg">
    </div>
    <div class="tile-content">
    <img alt="" src="./images/5.jpg">
    </div>
    <div class="brand">
    <span class="name">Photos</span>
    </div>
</div>

<div class="tile bg-color-blue icon">
	<div class="tile-content">
	<img src="./images/InternetExplorer128.png">
	</div>
	<div class="brand">
	<span class="name">Internet Explorer</span>
	</div>
</div>

</div><!-- tiles -->
</div><!-- page --->
</div><!-- row-fluid -->
