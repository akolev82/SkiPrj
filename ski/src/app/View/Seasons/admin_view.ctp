<div class="seasons view">
<h2><?php echo __('Season'); ?></h2>
	<dl>
		<dt><?php echo __('SeasonID'); ?></dt>
		<dd>
			<?php echo h($season['Season']['SeasonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeasonName'); ?></dt>
		<dd>
			<?php echo h($season['Season']['SeasonName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DateBegin'); ?></dt>
		<dd>
			<?php echo h($season['Season']['DateBegin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DateEnd'); ?></dt>
		<dd>
			<?php echo h($season['Season']['DateEnd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NumberOfRuns'); ?></dt>
		<dd>
			<?php echo h($season['Season']['NumberOfRuns']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeedOrderClass'); ?></dt>
		<dd>
			<?php echo h($season['Season']['SeedOrderClass']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Season'), array('action' => 'edit', $season['Season']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Season'), array('action' => 'delete', $season['Season']['id']), null, __('Are you sure you want to delete # %s?', $season['Season']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('action' => 'add')); ?> </li>
	</ul>
</div>
