<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Edit City'); ?></legend>
	<?php
		echo $this->Form->hidden('CityID');
		echo $this->Form->input('CountryID', array('label' => 'Country', 'options' => $countries, 'empty' => 'Please choose country'));
		echo $this->Form->input('StateID', array('label' => 'State', 'options' => $states, 'empty' => 'Please choose state'));
		echo $this->Form->input('CityName');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('City.CityID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('City.CityID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?></li>
	</ul>
</div>
