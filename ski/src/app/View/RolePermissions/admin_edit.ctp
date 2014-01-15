<div class="rolePermissions form">
<?php echo $this->Form->create('RolePermission'); ?>
	<fieldset>
		<h2><?php echo __('Edit Role Permission'); ?></h2>
	<?php
		echo $this->Form->hidden('RolePermissionID');
		echo $this->Form->input('RoleID', array('label' => 'Role', 'options' => $roles, 'empty' => 'Please choose role'));
		echo $this->Form->input('PermissionID', array('label' => 'Permission', 'options' => $permissions, 'empty' => 'Please choose permission'));
		echo $this->Form->input('Action');
		echo $this->Form->input('enabled', array('label' => 'Is enabled', 'type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li  class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RolePermission.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RolePermission.id'))); ?></li>
		<li  class="nav-button-list"><?php echo $this->Html->link(__('List Role Permissions'), array('action' => 'index')); ?></li>
	</ul></nav>
</div>
