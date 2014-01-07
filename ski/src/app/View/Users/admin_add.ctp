<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name', array('type' => 'text', 'label' => 'Username'));
		echo $this->Form->input('pass', array('type' => 'password', 'label' => 'Password'));
		echo $this->Form->input('super', array('type' => 'checkbox'));
		echo $this->Form->input('enabled', array('type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
