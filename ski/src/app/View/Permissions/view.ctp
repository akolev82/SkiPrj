<div class="permissions view">
<h2><?php echo __('Permission'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aro'); ?></dt>
		<dd>
			<?php echo $this->Html->link($permission['Aro']['id'], array('controller' => 'aros', 'action' => 'view', $permission['Aro']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aco'); ?></dt>
		<dd>
			<?php echo $this->Html->link($permission['Aco']['id'], array('controller' => 'acos', 'action' => 'view', $permission['Aco']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __(' Create'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['_create']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __(' Read'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['_read']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __(' Update'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['_update']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __(' Delete'); ?></dt>
		<dd>
			<?php echo h($permission['Permission']['_delete']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Permission'), array('action' => 'edit', $permission['Permission']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Permission'), array('action' => 'delete', $permission['Permission']['id']), null, __('Are you sure you want to delete # %s?', $permission['Permission']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aros'), array('controller' => 'aros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aro'), array('controller' => 'aros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acos'), array('controller' => 'acos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aco'), array('controller' => 'acos', 'action' => 'add')); ?> </li>
	</ul>
</div>
