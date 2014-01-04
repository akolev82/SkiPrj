<div class="domains index">
	<h2><?php echo __('Domains'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('DomainID'); ?></th>
			<th><?php echo $this->Paginator->sort('DomainName'); ?></th>
			<th><?php echo $this->Paginator->sort('DomainDesc'); ?></th>
			<th><?php echo $this->Paginator->sort('enabled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($domains as $domain): ?>
	<tr>
		<td><?php echo h($domain['Domain']['DomainID']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['DomainName']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['DomainDesc']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['enabled']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $domain['Domain']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $domain['Domain']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $domain['Domain']['id']), null, __('Are you sure you want to delete # %s?', $domain['Domain']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Domain'), array('action' => 'add')); ?></li>
	</ul>
</div>
