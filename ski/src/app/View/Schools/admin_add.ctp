<div class="schools form">
<?php echo $this->Form->create('School'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add School'); ?></legend>
	<?php
		echo $this->Form->input('SchoolName', array('label' => __('Name')));
		echo $this->Form->input('Active', array('label' => 'Is active', 'type' => 'checkbox'));
		//echo $this->Form->input('SchoolLogo', array('label' => 'Logo'));
		echo $this->Form->input('PrincipalID', array('label' => 'Principal', 'empty' => 'Choose principal', 'options' => $principal));
		echo $this->Form->input('StreetAddress', array('label' => 'Street address'));
		$CountryID = '';
		$StateID = '';
		$CityID = '';
		$ZipID = '';
		$options = array( //modelname (or combotype), fieldname
		    'country' => array(
		        'name' => 'CountryID',
		        'label' => 'Country',
		        'value' => $CountryID
		    ),
		    'state' => array(
		        'name' => 'StateID',
		        'value' => $StateID,
		        'depends' => array(
		            'country' => array(
		                'field' => 'Country.CountryID',
		                'alias' => 'CountryID'
		            )
		        )
		    ),
		    'city' => array(
		        'name' => 'CityID',
		        'value' => $CityID,
		        'depends' => array(
		            'state' => array(
		                'field' => 'State.StateID',
		                'alias' => 'StateID'
		            ),
		            'country' => array(
		                'field' => 'Country.CountryID',
		                'alias' => 'CountryID'
		            )
		        )
		    ),
		    'zip' => array(
		        'name' => 'ZipID',
		        'value' => $CityID,
		        'depends' => array(
		            'city' => array(
		                'field' => 'City.CityID',
		                'alias' => 'CityID'
		            ),
		            'state' => array(
		                'field' => 'State.StateID',
		                'alias' => 'StateID'
		            ),
		            'country' => array(
		                'field' => 'Country.CountryID',
		                'alias' => 'CountryID'
		            )
		        )
		    )
		);
		$combo = $this->Combo->getLocationCombos('mLocations', $options);
		echo $combo->addCountryCombo('CountryID', array('label' => 'Country'));
		echo $combo->addStateCombo('StateID', array('label' => 'State'));
		echo $combo->addCityCombo('CityID', array('label' => 'City'));
		echo $combo->addZipCombo('ZipID', array('label' => 'Zip'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));
$combo->printClientScript(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Schools'), array('action' => 'index')); ?></li>
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
	</ul>
</div>
