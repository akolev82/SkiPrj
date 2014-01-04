<div class="teamTypes form">
<?php echo $this->Form->create('TeamType'); ?>
	<fieldset>
		<legend><?php echo __('Add Team Type'); ?></legend>
	<?php
		echo $this->Form->input('TeamTypeID');
		echo $this->Form->input('TeamTypeName');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Team Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
