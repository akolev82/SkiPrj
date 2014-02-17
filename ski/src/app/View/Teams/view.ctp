<div class="teams view">
<h2><?php echo __('Team'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($team['Team']['TeamID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($team['Team']['TeamTypeName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo h($team['Team']['TeamName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coach'); ?></dt>
		<dd>
			<?php echo h($team['Team']['CoachFullName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($is_admin) {?>
			<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['TeamID'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['TeamID']), null, __('Are you sure you want to delete # %s?', $team['Team']['TeamID'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?> </li>
		<?php } else { ?>
			<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
		<?php } ?>
	</ul>
</div>
