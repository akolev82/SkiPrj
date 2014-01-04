<div class="permissions form">
<?php echo $this->Form->create('Permission'); ?>
	<fieldset>
		<legend><?php echo __('Add Permission'); ?></legend>
	<?php
		echo $this->Form->input('aro_id');
		echo $this->Form->input('aco_id');
		echo $this->Form->input('_create');
		echo $this->Form->input('_read');
		echo $this->Form->input('_update');
		echo $this->Form->input('_delete');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Aros'), array('controller' => 'aros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aro'), array('controller' => 'aros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acos'), array('controller' => 'acos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aco'), array('controller' => 'acos', 'action' => 'add')); ?> </li>
	</ul>
</div>
