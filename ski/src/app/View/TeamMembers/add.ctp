<div class="teamMembers form">
<?php echo $this->Form->create('TeamMember'); ?>
	<fieldset>
		<legend><?php echo __('Add Team Member'); ?></legend>
	<?php
		echo $this->Form->input('TeamMemberID');
		echo $this->Form->input('TeamID');
		echo $this->Form->input('StudentID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Team Members'), array('action' => 'index')); ?></li>
	</ul>
</div>
