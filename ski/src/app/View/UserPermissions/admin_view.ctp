<div class="userPermissions view">
<h2><?php echo __('User Permission'); ?></h2>
	<dl>
		<dt><?php echo __('UserPermissionID'); ?></dt>
		<dd>
			<?php echo h($userPermission['UserPermission']['UserPermissionID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($userPermission['UserPermission']['UserName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permission'); ?></dt>
		<dd>
			<?php echo h($userPermission['UserPermission']['PermissionName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($userPermission['UserPermission']['Action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo $this->Ace->toYesStr(h($userPermission['UserPermission']['enabled'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Permission'), array('action' => 'edit', $userPermission['UserPermission']['UserPermissionID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Permission'), array('action' => 'delete', $userPermission['UserPermission']['UserPermissionID']), null, __('Are you sure you want to delete # %s?', $userPermission['UserPermission']['UserPermissionID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Permissions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Permission'), array('action' => 'add')); ?> </li>
	</ul>
</div>
