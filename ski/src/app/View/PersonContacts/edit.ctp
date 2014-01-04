<div class="personContacts form">
<?php echo $this->Form->create('PersonContact'); ?>
	<fieldset>
		<legend><?php echo __('Edit Person Contact'); ?></legend>
	<?php
		echo $this->Form->input('PersonContactID');
		echo $this->Form->input('PersonID');
		echo $this->Form->input('ContactTypeID');
		echo $this->Form->input('Value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PersonContact.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PersonContact.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Person Contacts'), array('action' => 'index')); ?></li>
	</ul>
</div>
