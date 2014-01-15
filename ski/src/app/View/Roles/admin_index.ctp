<div class="roles index">
	<h2><?php echo __('Roles'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="ski_table">
	<tr class="ski_tr">
			<th><?php echo $this->Paginator->sort('RoleID', 'ID'); ?></th>
			<th><?php echo $this->Paginator->sort('RoleName', 'Name'); ?></th>
			<th><?php echo $this->Paginator->sort('RoleDesc', 'Description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($roles as $role): ?>
	<tr class="ski_tr_sub">
		<td><?php echo h($role['Role']['RoleID']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['RoleName']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['RoleDesc']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $role['Role']['RoleID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $role['Role']['RoleID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $role['Role']['RoleID']), null, __('Are you sure you want to delete # %s?', $role['Role']['RoleID'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li  class="nav-button-add"><?php echo $this->Html->link(__('New role'), array('action' => 'add')); ?></li>
	</ul></nav>
</div>
