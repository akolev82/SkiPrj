<div class="leagues view">
<h2><?php echo __('League'); ?></h2>
	<dl>
		<dt><?php echo __('LeagueID'); ?></dt>
		<dd>
			<?php echo h($league['League']['LeagueID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LeagueName'); ?></dt>
		<dd>
			<?php echo h($league['League']['LeagueName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PersonContactID'); ?></dt>
		<dd>
			<?php echo h($league['League']['PersonContactID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ThemeID'); ?></dt>
		<dd>
			<?php echo h($league['League']['ThemeID']); ?>
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
		<li><?php echo $this->Html->link(__('Edit League'), array('action' => 'edit', $league['League']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete League'), array('action' => 'delete', $league['League']['id']), null, __('Are you sure you want to delete # %s?', $league['League']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Leagues'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New League'), array('action' => 'add')); ?> </li>
	</ul>
</div>
