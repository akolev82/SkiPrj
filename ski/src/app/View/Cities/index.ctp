<div class="cities index">
	<h2><?php echo __('Cities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('CityID', __('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('CountryName', __('Country')); ?></th>
			<th><?php echo $this->Paginator->sort('StateName', __('State')); ?></th>
			<th><?php echo $this->Paginator->sort('CityName'), __('City'); ?></th>
			<?php if ($is_admin) echo '<th class="actions">' . __('Actions') . '</th>'; ?>
	</tr>
	<?php foreach ($cities as $city): ?>
	<tr>
		<td><?php echo h($city['City']['CityID']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['CountryName']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['StateName']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['CityName']); ?>&nbsp;</td>
		<?php if ($is_admin) {
		  echo '<td class="actions">';
			echo $this->Html->link(__('View'), array('action' => 'view', $city['City']['CityID']));
			echo $this->Html->link(__('Edit'), array('action' => 'edit', $city['City']['CityID']));
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $city['City']['CityID']), null, __('Are you sure you want to delete # %s?', $city['City']['CityID']));
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
		echo '<li>' . $this->Html->link(__('New City'), array('action' => 'add')) . '</li>';
	echo '</ul>';
  echo '</div>';
} ?>
