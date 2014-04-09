<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_user')); ?>:</b>
	<?php echo CHtml::encode($data->login_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_pass')); ?>:</b>
	<?php echo CHtml::encode($data->login_pass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_url')); ?>:</b>
	<?php echo CHtml::encode($data->login_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_user')); ?>:</b>
	<?php echo CHtml::encode($data->admin_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_pass')); ?>:</b>
	<?php echo CHtml::encode($data->admin_pass); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_url')); ?>:</b>
	<?php echo CHtml::encode($data->admin_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_type')); ?>:</b>
	<?php echo CHtml::encode($data->payment_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_info')); ?>:</b>
	<?php echo CHtml::encode($data->payment_info); ?>
	<br />

	*/ ?>

</div>