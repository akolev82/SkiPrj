<div class="people form">
<?php echo $this->Form->create('Person'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Person'); ?></legend>
	<?php
	    echo $this->Form->hidden('PersonID');
		//echo $this->Form->hidden('UserID');
		echo $this->Form->input('FirstName');
		echo $this->Form->input('LastName');
		echo $this->Form->input('MiddleName');
		echo $this->Form->input('Gender', array('options' => $this->Ace->getGenderMap(), 'empty' => 'Please choose gender'));
		//echo $this->Form->input('BirthDate');
		//echo $this->Form->input('BirthPlace');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Person.PersonID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Person.PersonID'))); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
