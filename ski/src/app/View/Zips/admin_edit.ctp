<div class="zips form">
<?php echo $this->Form->create('Zip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Zip'); ?></legend>
	<?php
		echo $this->Form->hidden('ZipID');
		echo $this->Form->input('CountryID', array('label' => 'Country', 'options' => $countries, 'empty' => 'Please choose country'));
		echo $this->Form->input('StateID', array('label' => 'State', 'options' => $states, 'empty' => 'Please choose state'));
		echo $this->Form->input('CityID', array('label' => 'City', 'options' => $cities, 'empty' => 'Please choose city'));
		echo $this->Form->input('ZipCode', array('label' => 'Zip'));
		echo $this->Form->input('latitude', array('label' => 'Latitude'));
		echo $this->Form->input('longitude', array('label' => 'Longitude'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Zip.ZipID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Zip.ZipID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Zips'), array('action' => 'index')); ?></li>
	</ul>
</div>
