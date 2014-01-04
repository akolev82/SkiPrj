<div class="personAddresses view">
<h2><?php echo __('Person Address'); ?></h2>
	<dl>
		<dt><?php echo __('PersonAddressID'); ?></dt>
		<dd>
			<?php echo h($personAddress['PersonAddress']['PersonAddressID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PersonID'); ?></dt>
		<dd>
			<?php echo h($personAddress['PersonAddress']['PersonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AddressID'); ?></dt>
		<dd>
			<?php echo h($personAddress['PersonAddress']['AddressID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person Address'), array('action' => 'edit', $personAddress['PersonAddress']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person Address'), array('action' => 'delete', $personAddress['PersonAddress']['id']), null, __('Are you sure you want to delete # %s?', $personAddress['PersonAddress']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Person Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person Address'), array('action' => 'add')); ?> </li>
	</ul>
</div>
