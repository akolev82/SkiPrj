<div class="teamTypes view">
<h2><?php echo __('Team Type'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($teamType['TeamType']['TeamTypeID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team type'); ?></dt>
		<dd>
			<?php echo h($teamType['TeamType']['TeamTypeName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($is_admin) { ?>
			<li><?php echo $this->Html->link(__('Edit Team Type'), array('action' => 'edit', $teamType['TeamType']['TeamTypeID'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Team Type'), array('action' => 'delete', $teamType['TeamType']['TeamTypeID']), null, __('Are you sure you want to delete # %s?', $teamType['TeamType']['TeamTypeID'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Team Types'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Team Type'), array('action' => 'add')); ?> </li>
		<?php } else { ?>		
			<li><?php echo $this->Html->link(__('List Team Types'), array('action' => 'index')); ?> </li>
		<?php } ?>		
	</ul>
</div>
