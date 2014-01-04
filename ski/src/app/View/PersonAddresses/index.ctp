<div class="personAddresses index">
	<h2><?php echo __('Person Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('PersonAddressID'); ?></th>
			<th><?php echo $this->Paginator->sort('PersonID'); ?></th>
			<th><?php echo $this->Paginator->sort('AddressID'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($personAddresses as $personAddress): ?>
	<tr>
		<td><?php echo h($personAddress['PersonAddress']['PersonAddressID']); ?>&nbsp;</td>
		<td><?php echo h($personAddress['PersonAddress']['PersonID']); ?>&nbsp;</td>
		<td><?php echo h($personAddress['PersonAddress']['AddressID']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $personAddress['PersonAddress']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $personAddress['PersonAddress']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $personAddress['PersonAddress']['id']), null, __('Are you sure you want to delete # %s?', $personAddress['PersonAddress']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Person Address'), array('action' => 'add')); ?></li>
	</ul>
</div>
