<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Add City'); ?></legend>
	<?php
		$combo = $this->Combo->getLocationCombos('mLocations', 'CountryID', 'StateID', '', '');
		echo $combo->addCountryCombo('CountryID', array('label' => 'Country'));
		echo $combo->addStateCombo('StateID', array('label' => 'State'));
		echo $this->Form->input('CityName');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));
$combo->loadData();
$combo->printClientScript(); 
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul> 
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?></li>
	</ul>
</div>
