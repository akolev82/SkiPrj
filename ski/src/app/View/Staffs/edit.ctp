<div class="staffs form">
<?php echo $this->Form->create('Staff'); ?>
	<fieldset>
		<legend><?php echo __('Edit Staff'); ?></legend>
	<?php
		echo $this->Form->input('StaffID');
		echo $this->Form->input('SchoolID');
		echo $this->Form->input('PersonID');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Staff.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Staff.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('action' => 'index')); ?></li>
	</ul>
</div>
