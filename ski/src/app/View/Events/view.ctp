<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('EventID'); ?></dt>
		<dd>
			<?php echo h($event['Event']['EventID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeasonID'); ?></dt>
		<dd>
			<?php echo h($event['Event']['SeasonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('EventName'); ?></dt>
		<dd>
			<?php echo h($event['Event']['EventName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DateBegin'); ?></dt>
		<dd>
			<?php echo h($event['Event']['DateBegin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DateEnd'); ?></dt>
		<dd>
			<?php echo h($event['Event']['DateEnd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AddressID'); ?></dt>
		<dd>
			<?php echo h($event['Event']['AddressID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
	</ul>
</div>
