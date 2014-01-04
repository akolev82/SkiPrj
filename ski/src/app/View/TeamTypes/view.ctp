<div class="teamTypes view">
<h2><?php echo __('Team Type'); ?></h2>
	<dl>
		<dt><?php echo __('TeamTypeID'); ?></dt>
		<dd>
			<?php echo h($teamType['TeamType']['TeamTypeID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TeamTypeName'); ?></dt>
		<dd>
			<?php echo h($teamType['TeamType']['TeamTypeName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team Type'), array('action' => 'edit', $teamType['TeamType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team Type'), array('action' => 'delete', $teamType['TeamType']['id']), null, __('Are you sure you want to delete # %s?', $teamType['TeamType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
