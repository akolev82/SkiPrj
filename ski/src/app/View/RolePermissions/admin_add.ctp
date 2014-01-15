<div class="rolePermissions form">
<?php echo $this->Form->create('RolePermission'); ?>
	<fieldset>
		<h2><?php echo __('Add Role Permission'); ?></h2>
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
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li  class="nav-button-list"><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?></li>
	</ul></nav>
</div>
