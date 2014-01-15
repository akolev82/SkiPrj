<div class="domains index">
	<h2><?php echo __('Domains'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="ski_table">
	<tr class="ski_tr">
			<th><?php echo $this->Paginator->sort('DomainID'); ?></th>
			<th><?php echo $this->Paginator->sort('DomainName', 'Domain'); ?></th>
			<th><?php echo $this->Paginator->sort('DomainDesc', 'Description'); ?></th>
			<th><?php echo $this->Paginator->sort('enabled', 'Enabled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($domains as $record):
	echo '<tr class="ski_tr_sub">';
	  $domain =& $record['Domain'];
	  $DomainID = $domain['DomainID']; ?>
		<td><?php echo h($DomainID); ?>&nbsp;</td>
		<td><?php echo h($domain['DomainName']); ?>&nbsp;</td>
		<td><?php echo h($domain['DomainDesc']); ?>&nbsp;</td>
		<td><?php echo $this->Ace->toYesStr(h($domain['enabled'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $DomainID)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $DomainID)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $DomainID), null, __('Are you sure you want to delete # %s?', $DomainID)); ?>
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
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Domain'), array('action' => 'add')); ?></li>
	</ul></nav>
</div>
