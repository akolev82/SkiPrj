<div class="userRoles view">
<h2><?php echo __('User Role'); ?></h2>
	<dl>
		<dt><?php echo __('UserID'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['UserID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RoleID'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['RoleID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Role'), array('action' => 'edit', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Role'), array('action' => 'delete', $userRole['UserRole']['id']), null, __('Are you sure you want to delete # %s?', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('action' => 'add')); ?> </li>
	</ul>
</div>
