<div class="countries index">
	<h2><?php echo __('Countries'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="ski_table">
	<tr class="ski_tr">
			<th><?php echo $this->Paginator->sort('CountryID'); ?></th>
			<th><?php echo $this->Paginator->sort('CountryName'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($countries as $country): ?>
	<tr class="ski_tr_sub">
		<td><?php echo h($country['Country']['CountryID']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['CountryName']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $country['Country']['CountryID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['CountryID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['CountryID']), null, __('Are you sure you want to delete # %s?', $country['Country']['CountryID'])); ?>
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
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?></li>
	</ul></nav>
</div>
