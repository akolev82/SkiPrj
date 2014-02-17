<div class="schools index">
	<h2><?php echo __('Schools'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('SchoolID', __('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('SchoolName', __('Name')); ?></th>
			<th><?php echo $this->Paginator->sort('Active', __('Active')); ?></th>
			<th><?php echo $this->Paginator->sort('SchoolLogo', __('Logo')); ?></th>
			<th><?php echo $this->Paginator->sort('PrincipalID', __('Principal')); ?></th>
			<th><?php echo $this->Paginator->sort('StreetAddress', __('Street address')); ?></th>
			<th><?php echo $this->Paginator->sort('ZipID', __('Zip')); ?></th>
			<th><?php echo $this->Paginator->sort('CityID', __('City')); ?></th>
			<th><?php echo $this->Paginator->sort('StateID', __('State')); ?></th>
			<th><?php echo $this->Paginator->sort('CountryID', __('Country')); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($schools as $school): ?>
	<tr>
		<td><?php echo h($school['School']['SchoolID']); ?>&nbsp;</td>
		<td><?php echo h($school['School']['SchoolName']); ?>&nbsp;</td>
		<td><?php echo h($this->Ace->toYesStr($school['School']['Active'])); ?>&nbsp;</td>
		<td><?php echo h($school['School']['SchoolLogo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($school['School']['PrincipalFullName'], array('controller' => 'coaches', 'action' => 'view', $school['School']['PrincipalID'])); ?>
		</td>
		<td><?php echo h($school['School']['StreetAddress']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($school['Zip']['ZipCode'], array('controller' => 'zips', 'action' => 'view', $school['Zip']['ZipID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($school['City']['CityName'], array('controller' => 'cities', 'action' => 'view', $school['City']['CityID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($school['State']['StateName'], array('controller' => 'states', 'action' => 'view', $school['State']['StateID'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($school['Country']['CountryName'], array('controller' => 'countries', 'action' => 'view', $school['Country']['CountryID'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $school['School']['SchoolID']));
			if ($is_admin) {
				echo $this->Html->link(__('Edit'), array('action' => 'edit', $school['School']['SchoolID']));
				echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $school['School']['SchoolID']), null, __('Are you sure you want to delete # %s?', $school['School']['SchoolID'])); 
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
		<li><?php echo $this->Html->link(__('New School'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zips'), array('controller' => 'zips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zip'), array('controller' => 'zips', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coaches'), array('controller' => 'coaches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Principal'), array('controller' => 'coaches', 'action' => 'add')); ?> </li>
	<?php } else { ?>
		<li><?php echo $this->Html->link(__('List Zips'), array('controller' => 'zips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>		
<?php } ?>		
	</ul>
</div>
