<div class="personAddresses form">
<?php echo $this->Form->create('PersonAddress'); ?>
	<fieldset>
		<legend><?php echo __('Edit Person Address'); ?></legend>
	<?php
		echo $this->Form->input('PersonAddressID');
		echo $this->Form->input('PersonID');
		echo $this->Form->input('AddressID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PersonAddress.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PersonAddress.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Person Addresses'), array('action' => 'index')); ?></li>
	</ul>
</div>
