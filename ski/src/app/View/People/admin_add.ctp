<div class="people form">
<?php echo $this->Form->create('Person'); ?>
	<fieldset>
		<h2><?php echo __('Admin Add Person'); ?></h2>
	<?php
		echo $this->Form->input('FirstName');
		echo $this->Form->input('LastName');
		echo $this->Form->input('MiddleName');
		echo $this->Form->input('Gender', array('options' => $this->Ace->getGenderMap(), 'empty' => 'Please choose gender'));
		//echo $this->Form->input('BirthDate'); TODO: Please see why is not accepting format data
		
		echo '<fieldset><legend>Birth place</legend>';
    		//echo $this->Form->input('BirthPlace', array('options' => $cities, 'empty' => 'Please choose city'));
    		$combo = $this->Combo->getLocationCombos('mLocations', 'CountryID', 'StateID', 'BirthPlace', '');
    		echo $combo->addCountryCombo('CountryID', array('label' => 'Country'));
    		echo $combo->addStateCombo('StateID', array('label' => 'State'));
    		echo $combo->addCityCombo('BirthPlace', array('label' => 'City'));
    	echo '</fieldset>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); 
$combo->loadData();
$combo->printClientScript();
?>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-list"><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?></li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul></nav>
</div>
