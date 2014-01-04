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
