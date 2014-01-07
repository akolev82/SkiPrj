<div class="permissions form">
<?php echo $this->Form->create('Permission'); ?>
	<fieldset>
		<legend><?php echo __('Add Permission'); ?></legend>
	<?php
		echo $this->Form->input('PermissionName', array('label' => 'Permission'));
		echo $this->Form->input('PermissionDesc', array('label' => 'Description'));
		echo $this->Form->input('DomainID', array('label' => 'Domain', 'options' => $domains, 'empty' => __('Please choose domain')));
		echo $this->Form->input('enabled', array('type' => 'checkbox', 'label' => 'Is enabled'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Domains'), array('controller' => 'domains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Domain'), array('controller' => 'domains', 'action' => 'add')); ?> </li>
	</ul>
</div>
