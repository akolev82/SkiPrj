<div class="leagueMembers index">
	<h2><?php echo __('League Members'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('LeagueID'); ?></th>
			<th><?php echo $this->Paginator->sort('TeamID'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($leagueMembers as $leagueMember): ?>
	<tr>
		<td><?php echo h($leagueMember['LeagueMember']['LeagueID']); ?>&nbsp;</td>
		<td><?php echo h($leagueMember['LeagueMember']['TeamID']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leagueMember['LeagueMember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leagueMember['LeagueMember']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leagueMember['LeagueMember']['id']), null, __('Are you sure you want to delete # %s?', $leagueMember['LeagueMember']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New League Member'), array('action' => 'add')); ?></li>
	</ul>
</div>
