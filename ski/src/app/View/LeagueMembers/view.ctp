<div class="leagueMembers view">
<h2><?php echo __('League Member'); ?></h2>
	<dl>
		<dt><?php echo __('LeagueID'); ?></dt>
		<dd>
			<?php echo h($leagueMember['LeagueMember']['LeagueID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TeamID'); ?></dt>
		<dd>
			<?php echo h($leagueMember['LeagueMember']['TeamID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit League Member'), array('action' => 'edit', $leagueMember['LeagueMember']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete League Member'), array('action' => 'delete', $leagueMember['LeagueMember']['id']), null, __('Are you sure you want to delete # %s?', $leagueMember['LeagueMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List League Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New League Member'), array('action' => 'add')); ?> </li>
	</ul>
</div>
