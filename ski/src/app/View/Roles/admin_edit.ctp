<div class="users form">
<?php echo $this->Form->create('Role'); ?>
	<fieldset>
		<legend><?php echo __('Edit role'); ?></legend>
	<?php
   	    echo $this->Form->hidden('RoleID');
	    echo $this->Form->input('RoleName', array('type' => 'text', 'label' => 'Role name'));
		echo $this->Form->input('RoleDesc', array('type' => 'text', 'label' => 'Description'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.UserID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.UserID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?></li>
	</ul>
</div>
