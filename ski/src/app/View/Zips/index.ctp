<div class="zips index">
	<h2><?php echo __('Zips'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ZipID'); ?></th>
			<th><?php echo $this->Paginator->sort('CountryName', 'Country'); ?></th>
			<th><?php echo $this->Paginator->sort('CityName', 'City'); ?></th>
			<th><?php echo $this->Paginator->sort('StateName', 'State'); ?></th>
			<th><?php echo $this->Paginator->sort('ZipCode', 'Zip'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude', 'Latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude', 'Longitude'); ?></th>
			<?php if ($is_admin) echo '<th class="actions">' . __('Actions') . '</th>'; ?>
	</tr>
	<?php foreach ($zips as $zip): ?>
	<tr>
		<td><?php echo h($zip['Zip']['ZipID']); ?>&nbsp;</td>
		<td><?php echo h($zip['Zip']['CountryName']); ?>&nbsp;</td>
		<td><?php echo h($zip['Zip']['CityName']); ?>&nbsp;</td>
		<td><?php echo h($zip['Zip']['StateName']); ?>&nbsp;</td>
		<td><?php echo h($zip['Zip']['ZipCode']); ?>&nbsp;</td>
		<td><?php echo h($zip['Zip']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($zip['Zip']['longitude']); ?>&nbsp;</td>
		<?php if ($is_admin) {
		  echo '<td class="actions">';
			echo $this->Html->link(__('View'), array('action' => 'view', $zip['Zip']['ZipID']));
			echo $this->Html->link(__('Edit'), array('action' => 'edit', $zip['Zip']['ZipID']));
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $zip['Zip']['ZipID']), null, __('Are you sure you want to delete # %s?', $zip['Zip']['ZipID']));
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
		echo '<li>' . $this->Html->link(__('New Zip'), array('action' => 'add')) . '</li>';
	echo '</ul>';
  echo '</div>';
} ?>