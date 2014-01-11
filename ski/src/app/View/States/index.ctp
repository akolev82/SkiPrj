<div class="states index">
	<h2><?php echo __('States'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('StateID'); ?></th>
			<th><?php echo $this->Paginator->sort('CountryName', __('Country')); ?></th>
			<th><?php echo $this->Paginator->sort('StateCode', __('Code')); ?></th>
			<th><?php echo $this->Paginator->sort('StateName', __('Name')); ?></th>
			<?php if ($is_admin) echo '<th class="actions">' . __('Actions') . '</th>'; ?>
	</tr>
	<?php foreach ($states as $state): ?>
	<tr>
		<td><?php echo h($state['State']['StateID']); ?>&nbsp;</td>
		<td><?php echo h($state['State']['CountryName']); ?>&nbsp;</td>
		<td><?php echo h($state['State']['StateCode']); ?>&nbsp;</td>
		<td><?php echo h($state['State']['StateName']); ?>&nbsp;</td>
		<?php if ($is_admin) {
		  echo '<td class="actions">';
			echo $this->Html->link(__('View'), array('action' => 'view', $state['State']['StateID']));
			echo $this->Html->link(__('Edit'), array('action' => 'edit', $state['State']['StateID']));
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $state['State']['StateID']), null, __('Are you sure you want to delete # %s?', $state['State']['StateID']));
		  echo '</td>';
        } ?>
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
<?php if ($is_admin) {
  echo '<div class="actions">';
	echo '<h3>' . __('Actions') . '</h3>';
	echo '<ul>';
		echo '<li>' . $this->Html->link(__('New State'), array('action' => 'add')) . '</li>';
	echo '</ul>';
  echo '</div>';
} ?>
