<div class="teams view">
<h2><?php echo __('Team'); ?></h2>
	<dl>
		<dt><?php echo __('TeamID'); ?></dt>
		<dd>
			<?php echo h($team['Team']['TeamID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TeamTypeID'); ?></dt>
		<dd>
			<?php echo h($team['Team']['TeamTypeID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TeamName'); ?></dt>
		<dd>
			<?php echo h($team['Team']['TeamName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CoachID'); ?></dt>
		<dd>
			<?php echo h($team['Team']['CoachID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['id']), null, __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?> </li>
	</ul>
</div>
