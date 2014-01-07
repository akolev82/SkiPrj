<div class="userPermissions form">
<?php echo $this->Form->create('UserPermission'); ?>
	<fieldset>
		<legend><?php echo __('Add User Permission'); ?></legend>
	<?php
		//echo $this->Form->input('UserPermissionID');
	    echo $this->Form->input('UserID', array('label' => 'User', 'options' => $users, 'empty' => 'Please choose user'));
		echo $this->Form->input('PermissionID', array('label' => 'Permission', 'options' => $permissions, 'empty' => 'Please choose permission'));
		echo $this->Form->input('Action');
		echo $this->Form->input('enabled', array('label' => 'Is enabled', 'type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List User Permissions'), array('action' => 'index')); ?></li>
	</ul>
</div>
