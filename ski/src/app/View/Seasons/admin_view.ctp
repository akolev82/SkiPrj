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
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-edit"><?php echo $this->Html->link(__('Edit Season'), array('action' => 'edit', $season['Season']['SeasonID'])); ?> </li>
		<li class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete Season'), array('action' => 'delete', $season['Season']['SeasonID']), null, __('Are you sure you want to delete # %s?', $season['Season']['SeasonID'])); ?> </li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index')); ?> </li>
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Season'), array('action' => 'add')); ?> </li>
	</ul></nav>
</div>
