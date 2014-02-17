<div class="schools view">
<h2><?php echo __('School'); ?></h2>
	<dl>
		<dt><?php echo __('SchoolID'); ?></dt>
		<dd>
			<?php echo h($school['School']['SchoolID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School name'); ?></dt>
		<dd>
			<?php echo h($school['School']['SchoolName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is active'); ?></dt>
		<dd>
			<?php echo h($this->Ace->toYesStr($school['School']['Active'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($school['School']['SchoolLogo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Principal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($school['School']['PrincipalFullName'], array('controller' => 'coaches', 'action' => 'view', $school['School']['PrincipalID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street address'); ?></dt>
		<dd>
			<?php echo h($school['School']['StreetAddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo $this->Html->link($school['Zip']['ZipCode'], array('controller' => 'zips', 'action' => 'view', $school['Zip']['ZipID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($school['City']['CityName'], array('controller' => 'cities', 'action' => 'view', $school['City']['CityID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($school['State']['StateName'], array('controller' => 'states', 'action' => 'view', $school['State']['StateID'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($school['Country']['CountryName'], array('controller' => 'countries', 'action' => 'view', $school['Country']['CountryID'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($is_admin) { ?>
			<li><?php echo $this->Html->link(__('Edit School'), array('action' => 'edit', $school['School']['SchoolID'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete School'), array('action' => 'delete', $school['School']['SchoolID']), null, __('Are you sure you want to delete # %s?', $school['School']['SchoolID'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Schools'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New School'), array('action' => 'add')); ?> </li>
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
