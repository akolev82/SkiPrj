<div class="people index">
	<h2><?php echo __('People'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('PersonID'); ?></th>
			<th><?php echo $this->Paginator->sort('FirstName', 'First name'); ?></th>
			<th><?php echo $this->Paginator->sort('LastName', 'Last name'); ?></th>
			<th><?php echo $this->Paginator->sort('MiddleName', 'Middle name'); ?></th>
			<th><?php echo $this->Paginator->sort('Gender'); ?></th>
			<th><?php echo $this->Paginator->sort('BirthDate', 'Birth place'); ?></th>
			<th><?php echo $this->Paginator->sort('BirthPlaceName', 'Birth place'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($people as $person): ?>
	<tr>
		<td><?php echo h($person['Person']['PersonID']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['UserID']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['FirstName']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['LastName']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['MiddleName']); ?>&nbsp;</td>
		<td><?php echo h($this->Ace->toGenderName($person['Person']['Gender'])); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['BirthDate']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['BirthPlaceName']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $person['Person']['PersonID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $person['Person']['PersonID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $person['Person']['PersonID']), null, __('Are you sure you want to delete # %s?', $person['Person']['PersonID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
