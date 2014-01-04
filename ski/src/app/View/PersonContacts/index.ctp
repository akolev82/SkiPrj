<div class="personContacts index">
	<h2><?php echo __('Person Contacts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('PersonContactID'); ?></th>
			<th><?php echo $this->Paginator->sort('PersonID'); ?></th>
			<th><?php echo $this->Paginator->sort('ContactTypeID'); ?></th>
			<th><?php echo $this->Paginator->sort('Value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($personContacts as $personContact): ?>
	<tr>
		<td><?php echo h($personContact['PersonContact']['PersonContactID']); ?>&nbsp;</td>
		<td><?php echo h($personContact['PersonContact']['PersonID']); ?>&nbsp;</td>
		<td><?php echo h($personContact['PersonContact']['ContactTypeID']); ?>&nbsp;</td>
		<td><?php echo h($personContact['PersonContact']['Value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $personContact['PersonContact']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $personContact['PersonContact']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $personContact['PersonContact']['id']), null, __('Are you sure you want to delete # %s?', $personContact['PersonContact']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Person Contact'), array('action' => 'add')); ?></li>
	</ul>
</div>
