<div class="seasons form">
<?php echo $this->Form->create('Season'); ?>
	<fieldset>
		<h2><?php echo __('Add Season'); ?></h2>
	<?php
		//echo $this->Form->input('SeasonID');
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
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-add"><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index')); ?></li>
	</ul></nav>
</div>
