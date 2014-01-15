<div class="rolePermissions view">
<h2><?php echo __('Role Permission'); ?></h2>
	<dl>
		<dt><?php echo __('RolePermissionID'); ?></dt>
		<dd>
			<?php echo h($rolePermission['RolePermission']['RolePermissionID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($rolePermission['RolePermission']['RoleName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permission'); ?></dt>
		<dd>
			<?php echo h($rolePermission['RolePermission']['PermissionName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($rolePermission['RolePermission']['Action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo $this->Ace->toYesStr(h($rolePermission['RolePermission']['enabled'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li  class="nav-button-edit"><?php echo $this->Html->link(__('Edit Role Permission'), array('action' => 'edit', $rolePermission['RolePermission']['RolePermissionID'])); ?> </li>
		<li  class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete Role Permission'), array('action' => 'delete', $rolePermission['RolePermission']['RolePermissionID']), null, __('Are you sure you want to delete # %s?', $rolePermission['RolePermission']['RolePermissionID'])); ?> </li>
		<li  class="nav-button-list"><?php echo $this->Html->link(__('List Role Permissions'), array('action' => 'index')); ?> </li>
		<li  class="nav-button-add"><?php echo $this->Html->link(__('New Role Permission'), array('action' => 'add')); ?> </li>
	</ul></nav>
</div>
