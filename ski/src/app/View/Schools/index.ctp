<div class="schools index">
	<h2><?php echo __('Schools'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr><?php
    	echo '<th>' . $this->Paginator->sort('SchoolID') . '</th>' ;
    	echo '<th>' . $this->Paginator->sort('SchoolName') . '</th>' ;
    	//echo '<th>' . $this->Paginator->sort('PrimaryAddressID') . '</th>' ;
    	echo '<th>' . $this->Paginator->sort('Active') . '</th>' ;
    	//echo '<th>' . $this->Paginator->sort('SchoolLogo') . '</th>' ;
    	//echo '<th>' . $this->Paginator->sort('PrincipalID') . '</th>' ;
    	if ($is_admin) echo '<th class="actions">' . __('Actions') . '</th>';
	?></tr>
	<?php foreach ($schools as $school): ?>
	<tr>
		<td><?php echo h($school['School']['SchoolID']); ?>&nbsp;</td>
		<td><?php echo h($school['School']['SchoolName']); ?>&nbsp;</td>
		<td><?php echo h($school['School']['PrimaryAddressID']); ?>&nbsp;</td>
		<td><?php echo h($this->Ace->toYesNoStr($school['School']['Active'])); ?>&nbsp;</td>
		<td><?php echo h($school['School']['SchoolLogo']); ?>&nbsp;</td>
		<td><?php echo h($school['School']['PrincipalID']); ?>&nbsp;</td>
		<?php if ($is_admin) {
		  echo '<td class="actions">';
			echo $this->Html->link(__('View'), array('action' => 'view', $school['School']['SchoolID']));
			echo $this->Html->link(__('Edit'), array('action' => 'edit', $school['School']['SchoolID']));
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $school['School']['SchoolID']), null, __('Are you sure you want to delete # %s?', $school['School']['SchoolID']));
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
		echo '<li>' . $this->Html->link(__('New School'), array('action' => 'add')) . '</li>';
	echo '</ul>';
  echo '</div>';
} ?>