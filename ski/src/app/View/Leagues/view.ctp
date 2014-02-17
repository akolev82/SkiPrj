<div class="leagues view">
<h2><?php echo __('League'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($league['League']['LeagueID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('League'); ?></dt>
		<dd>
			<?php echo h($league['League']['LeagueName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($league['League']['CoachFullName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Theme'); ?></dt>
		<dd>
			<?php echo h($league['League']['ThemeName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subdomain'); ?></dt>
		<dd>
			<?php echo h($league['League']['subdomain']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($is_admin) { ?>
			<li><?php echo $this->Html->link(__('Edit League'), array('action' => 'edit', $league['League']['LeagueID'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete League'), array('action' => 'delete', $league['League']['LeagueID']), null, __('Are you sure you want to delete # %s?', $league['League']['LeagueID'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Leagues'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New League'), array('action' => 'add')); ?> </li>
		<?php } else { ?>
			<li><?php echo $this->Html->link(__('List Leagues'), array('action' => 'index')); ?> </li>
		<?php } ?>
	</ul>
</div>
