<div class="students index">
	<h2><?php echo __('Students'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('StudentID', __('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('SchoolID', __('School')); ?></th>
			<th><?php echo $this->Paginator->sort('Grade'); ?></th>
			<th><?php echo $this->Paginator->sort('FullName', __('Name')); ?></th>
			<th><?php echo $this->Paginator->sort('Gender'); ?></th>
			<th><?php echo $this->Paginator->sort('StreetAddress', __('Street address')); ?></th>
			<th><?php echo $this->Paginator->sort('ZipID', __('ZipCode')); ?></th>
			<th><?php echo $this->Paginator->sort('CityID', __('City')); ?></th>
			<th><?php echo $this->Paginator->sort('StateID', __('State')); ?></th>
			<th><?php echo $this->Paginator->sort('CountryID', __('Country')); ?></th>			
			<th><?php echo $this->Paginator->sort('BirthDate', __('Birth date')); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['StudentID']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['SchoolName']); ?>&nbsp;</td>
		
		<td><?php echo h($student['Student']['Grade']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['FullName']); ?>&nbsp;</td>
		<td><?php echo h($this->Ace->toGenderName($student['Student']['Gender'])); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['StreetAddress']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($student['Zip']['ZipCode'], array('controller' => 'zips', 'action' => 'view', $student['Zip']['ZipID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($student['City']['CityName'], array('controller' => 'cities', 'action' => 'view', $student['City']['CityID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($student['State']['StateName'], array('controller' => 'states', 'action' => 'view', $student['State']['StateID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($student['Country']['CountryName'], array('controller' => 'countries', 'action' => 'view', $student['Country']['CountryID'])); ?>
		</td>
		
		<td><?php echo h($student['Student']['BirthDate']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($student['Student']['BirthPlaceName'], array('controller' => 'cities', 'action' => 'view', $student['BirthPlace']['CityID'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $student['Student']['StudentID'])); ?>
			<?php if ($is_admin) {
			        echo $this->Html->link(__('Edit'), array('action' => 'edit', $student['Student']['StudentID']));
			        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $student['Student']['StudentID']), null, __('Are you sure you want to delete # %s?', $student['Student']['StudentID'])); 
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
<?php if ($is_admin) { ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?></li>
	</ul>
</div>
<?php } ?>
