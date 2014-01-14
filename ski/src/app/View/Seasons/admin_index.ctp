<div class="seasons index">
	<h2><?php echo __('Seasons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('SeasonID'); ?></th>
			<th><?php echo $this->Paginator->sort('SeasonName'); ?></th>
			<th><?php echo $this->Paginator->sort('DateBegin'); ?></th>
			<th><?php echo $this->Paginator->sort('DateEnd'); ?></th>
			<th><?php echo $this->Paginator->sort('NumberOfRuns'); ?></th>
			<th><?php echo $this->Paginator->sort('SeedOrderClass'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seasons as $season): ?>
	<tr>
		<td><?php echo h($season['Season']['SeasonID']); ?>&nbsp;</td>
		<td><?php echo h($season['Season']['SeasonName']); ?>&nbsp;</td>
		<td><?php echo h($season['Season']['DateBegin']); ?>&nbsp;</td>
		<td><?php echo h($season['Season']['DateEnd']); ?>&nbsp;</td>
		<td><?php echo h($season['Season']['NumberOfRuns']); ?>&nbsp;</td>
		<td><?php echo h($season['Season']['SeedOrderClass']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $season['Season']['SeasonID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $season['Season']['SeasonID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $season['Season']['SeasonID']), null, __('Are you sure you want to delete # %s?', $season['Season']['SeasonID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Season'), array('action' => 'add')); ?></li>
	</ul>
</div>
