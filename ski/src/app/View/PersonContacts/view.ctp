<div class="personContacts view">
<h2><?php echo __('Person Contact'); ?></h2>
	<dl>
		<dt><?php echo __('PersonContactID'); ?></dt>
		<dd>
			<?php echo h($personContact['PersonContact']['PersonContactID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PersonID'); ?></dt>
		<dd>
			<?php echo h($personContact['PersonContact']['PersonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ContactTypeID'); ?></dt>
		<dd>
			<?php echo h($personContact['PersonContact']['ContactTypeID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($personContact['PersonContact']['Value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person Contact'), array('action' => 'edit', $personContact['PersonContact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person Contact'), array('action' => 'delete', $personContact['PersonContact']['id']), null, __('Are you sure you want to delete # %s?', $personContact['PersonContact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Person Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person Contact'), array('action' => 'add')); ?> </li>
	</ul>
</div>
