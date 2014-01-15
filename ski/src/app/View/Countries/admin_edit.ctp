<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
		<h2><?php echo __('Edit Country'); ?></h2>
	<?php
		echo $this->Form->hidden('CountryID');
		echo $this->Form->input('CountryName', array('type' => 'text', 'label' => __('Country name')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Country.CountryID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Country.CountryID'))); ?></li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?></li>
	</ul></nav>
</div>
