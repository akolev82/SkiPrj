<div class="userPermissions index">
	<h2><?php echo __('User Permissions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('UserPermissionID'); ?></th>
			<th><?php echo $this->Paginator->sort('RoleName', 'Role'); ?></th>
			<th><?php echo $this->Paginator->sort('PermissionName', 'Permission'); ?></th>
			<th><?php echo $this->Paginator->sort('Action'); ?></th>
			<th><?php echo $this->Paginator->sort('enabled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userPermissions as $record):
	  $item =& $record['UserPermission'];
	  $id = $item['UserPermissionID'];
     ?>
	<tr>
		<td><?php echo h($id); ?>&nbsp;</td>
		<td><?php echo h($item['UserName']); ?>&nbsp;</td>
		<td><?php echo h($item['PermissionName']); ?>&nbsp;</td>
		<td><?php echo h($item['Action']); ?>&nbsp;</td>
		<td><?php echo $this->Ace->toYesStr(h($item['enabled'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $id)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $id)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $id), null, __('Are you sure you want to delete # %s?', $id)); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Permission'), array('action' => 'add')); ?></li>
	</ul>
</div>
