<div class="schools form">
<?php echo $this->Form->create('School'); ?>
	<fieldset>
		<legend><?php echo __('Add School'); ?></legend>
	<?php
		//echo $this->Form->input('SchoolID');
		echo $this->Form->input('SchoolName');
		//echo $this->Form->input('PrimaryAddressID');
		echo $this->Combo->comboYesNo('Active');
		//echo $this->Form->input('SchoolLogo');
		//echo $this->Form->input('PrincipalID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Schools'), array('action' => 'index')); ?></li>
	</ul>
</div>
