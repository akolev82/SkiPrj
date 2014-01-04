<div class="domains form">
<?php echo $this->Form->create('Domain'); ?>
	<fieldset>
		<legend><?php echo __('Edit Domain'); ?></legend>
	<?php
		echo $this->Form->input('DomainID');
		echo $this->Form->input('DomainName');
		echo $this->Form->input('DomainDesc');
		echo $this->Form->input('enabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Domain.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Domain.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Domains'), array('action' => 'index')); ?></li>
	</ul>
</div>
