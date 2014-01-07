<div class="rolePermissions form">
<?php echo $this->Form->create('RolePermission'); ?>
	<fieldset>
		<legend><?php echo __('Add Role Permission'); ?></legend>
	<?php
		//echo $this->Form->input('RolePermissionID');
	    echo $this->Form->input('RoleID', array('label' => 'Role', 'options' => $roles, 'empty' => 'Please choose role'));
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
		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?></li>
	</ul>
</div>
