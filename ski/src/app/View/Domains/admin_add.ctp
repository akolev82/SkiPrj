<div class="domains form">
<?php echo $this->Form->create('Domain'); ?>
	<fieldset>
		<h2><?php echo __('Add Domain'); ?></h2>
	<?php
		//echo $this->Form->input('DomainID');
		echo $this->Form->input('DomainName', array('label' => 'Domain'));
		echo $this->Form->input('DomainDesc', array('label' => 'Description'));
		echo $this->Form->input('enabled', array('type' => 'checkbox', 'label' => 'Is enabled'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Domains'), array('action' => 'index')); ?></li>
	</ul>
        </nav>
</div>
