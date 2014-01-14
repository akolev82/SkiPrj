<div class="seasons form">
<?php echo $this->Form->create('Season'); ?>
	<fieldset>
		<legend><?php echo __('Edit Season'); ?></legend>
	<?php
		echo $this->Form->hidden('SeasonID');
		echo $this->Form->input('SeasonName');
		echo $this->Form->input('DateBegin');
		echo $this->Form->input('DateEnd');
		echo $this->Form->input('NumberOfRuns');
		echo $this->Form->input('SeedOrderClass');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Season.SeasonID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Season.SeasonID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index')); ?></li>
	</ul>
</div>
