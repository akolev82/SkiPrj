<div class="permissions form">
<?php echo $this->Form->create('Permission'); ?>
	<fieldset>
		<h2><?php echo __('Add Permission'); ?></h2>
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
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?></li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Domains'), array('controller' => 'domains', 'action' => 'index')); ?> </li>
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Domain'), array('controller' => 'domains', 'action' => 'add')); ?> </li>
	</ul></nav>
</div>
