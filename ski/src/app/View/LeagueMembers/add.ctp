<div class="leagueMembers form">
<?php echo $this->Form->create('LeagueMember'); ?>
	<fieldset>
		<legend><?php echo __('Add League Member'); ?></legend>
	<?php
		echo $this->Form->input('LeagueID');
		echo $this->Form->input('TeamID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List League Members'), array('action' => 'index')); ?></li>
	</ul>
</div>
