<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_user')); ?>:</b>
	<?php echo CHtml::encode($data->login_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_pass')); ?>:</b>
	<?php echo CHtml::encode($data->login_pass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cores')); ?>:</b>
	<?php echo CHtml::encode($data->cores); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('memory')); ?>:</b>
	<?php echo CHtml::encode($data->memory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disk')); ?>:</b>
	<?php echo CHtml::encode($data->disk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bandwidth_type')); ?>:</b>
	<?php echo CHtml::encode($data->bandwidth_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bandwidth')); ?>:</b>
	<?php echo CHtml::encode($data->bandwidth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expire_time')); ?>:</b>
	<?php echo CHtml::encode($data->expire_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_id')); ?>:</b>
	<?php echo CHtml::encode($data->owner_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider_id')); ?>:</b>
	<?php echo CHtml::encode($data->provider_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memo')); ?>:</b>
	<?php echo CHtml::encode($data->memo); ?>
	<br />

	*/ ?>

</div>