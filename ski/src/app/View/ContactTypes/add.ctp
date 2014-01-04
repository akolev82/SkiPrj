<div class="contactTypes form">
<?php echo $this->Form->create('ContactType'); ?>
	<fieldset>
		<legend><?php echo __('Add Contact Type'); ?></legend>
	<?php
		echo $this->Form->input('ContactTypeID');
		echo $this->Form->input('caption');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contact Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
