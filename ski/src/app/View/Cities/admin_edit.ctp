<div class="cities form">
	<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend>
			<?php echo __('Edit City'); ?>
		</legend>
		<?php
		$CountryID = $this->Form->value('City.CountryID');
		$StateID = $this->Form->value('City.StateID');
		echo $this->Form->hidden('CityID');

		$options = array(
		    'country' => array(
		        'name' => 'CountryID',
		        'value' => $CountryID
		    ),
		    'state' => array(
		        'name' => 'StateID',
		        'value' => $StateID,
		        'depends' => array(
		            'country' => array(
		                'field' => 'State.CountryID',
		                'alias' => 'CountryID'
		            )
		        )
		    )
		);
		$combo = $this->Combo->getLocationCombos('mLocations', $options);
		echo $combo->addCountryCombo('CountryID', array('label' => 'Country'));
		echo $combo->addStateCombo('StateID', array('label' => 'State'));
		echo $this->Form->input('CityName');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit'));
	$combo->printClientScript();
	?>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('City.CityID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('City.CityID'))); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?>
		</li>
	</ul>
</div>
