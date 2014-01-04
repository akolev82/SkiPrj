<div class="staffs index">
	<h2><?php echo __('Staffs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('StaffID'); ?></th>
			<th><?php echo $this->Paginator->sort('SchoolID'); ?></th>
			<th><?php echo $this->Paginator->sort('PersonID'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($staffs as $staff): ?>
	<tr>
		<td><?php echo h($staff['Staff']['StaffID']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['SchoolID']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['PersonID']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['role']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $staff['Staff']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staff['Staff']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staff['Staff']['id']), null, __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Staff'), array('action' => 'add')); ?></li>
	</ul>
</div>
