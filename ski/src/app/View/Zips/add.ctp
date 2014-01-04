<div class="zips form">
<?php echo $this->Form->create('Zip'); ?>
	<fieldset>
		<legend><?php echo __('Add Zip'); ?></legend>
	<?php
		echo $this->Form->input('ZipID');
		echo $this->Form->input('CountryID');
		echo $this->Form->input('CityID');
		echo $this->Form->input('StateID');
		echo $this->Form->input('ZipCode');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Zips'), array('action' => 'index')); ?></li>
	</ul>
</div>
