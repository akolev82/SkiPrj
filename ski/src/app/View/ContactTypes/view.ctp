<div class="contactTypes view">
<h2><?php echo __('Contact Type'); ?></h2>
	<dl>
		<dt><?php echo __('ContactTypeID'); ?></dt>
		<dd>
			<?php echo h($contactType['ContactType']['ContactTypeID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caption'); ?></dt>
		<dd>
			<?php echo h($contactType['ContactType']['caption']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact Type'), array('action' => 'edit', $contactType['ContactType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contact Type'), array('action' => 'delete', $contactType['ContactType']['id']), null, __('Are you sure you want to delete # %s?', $contactType['ContactType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
