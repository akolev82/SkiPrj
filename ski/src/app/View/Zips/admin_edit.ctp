<div class="zips form">
<?php echo $this->Form->create('Zip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Zip'); ?></legend>
	<?php
		echo $this->Form->hidden('ZipID');
		
		$CountryID = $this->Form->value('Zip.CountryID');
	    $StateID = $this->Form->value('Zip.StateID');
	    $CityID = $this->Form->value('Zip.CityID');
		$combo = $this->Combo->getLocationCombos('mLocations', 'CountryID', 'StateID', 'CityID', '');
		echo $combo->addCountryCombo('CountryID', array('label' => 'Country', /*'options' => $countries, 'empty' => 'Please choose country',*/ 'CountryID' => $CountryID));
		echo $combo->addStateCombo('StateID', array('label' => 'State', 'CountryID' => $CountryID, 'StateID' => $StateID));
		echo $combo->addCityCombo('CityID', array('label' => 'City', 'CountryID' => $CountryID, 'StateID' => $StateID, 'CityID' => $CityID));
		
		echo $this->Form->input('ZipCode', array('label' => 'Zip'));
		echo $this->Form->input('latitude', array('label' => 'Latitude'));
		echo $this->Form->input('longitude', array('label' => 'Longitude'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));
$combo->loadData($CountryID, $StateID, $CityID);
$combo->printClientScript(); 
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Zip.ZipID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Zip.ZipID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Zips'), array('action' => 'index')); ?></li>
	</ul>
</div>
