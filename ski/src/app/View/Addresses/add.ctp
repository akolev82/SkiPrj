<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Add Address'); ?></legend>
	<?php
		echo $this->Form->input('AddressID');
		echo $this->Form->input('AddressName');
		echo $this->Form->input('StreetAddress');
		echo $this->Form->input('ZipID');
		echo $this->Form->input('CityID');
		echo $this->Form->input('StateID');
		echo $this->Form->input('CountryID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
	</ul>
</div>
