<div class="teamTypes index">
	<h2><?php echo __('Team Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('TeamTypeID', __('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('TeamTypeName', __('Team type')); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($teamTypes as $teamType): ?>
	<tr>
		<td><?php echo h($teamType['TeamType']['TeamTypeID']); ?>&nbsp;</td>
		<td><?php echo h($teamType['TeamType']['TeamTypeName']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $teamType['TeamType']['TeamTypeID']));
			if ($is_admin) {
				echo $this->Html->link(__('Edit'), array('action' => 'edit', $teamType['TeamType']['TeamTypeID']));
				echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $teamType['TeamType']['TeamTypeID']), null, __('Are you sure you want to delete # %s?', $teamType['TeamType']['TeamTypeID'])); 
			} ?>
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
		<?php if ($is_admin) { ?>
			<li><?php echo $this->Html->link(__('New Team Type'), array('action' => 'add')); ?></li>
		<?php } ?>
	</ul>
</div>
