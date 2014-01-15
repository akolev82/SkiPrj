<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
		<legend><?php echo __('Add Country'); ?></legend>
	<?php
		echo $this->Form->input('CountryName', array('type' => 'text', 'label' => __('Country name')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li  class="nav-button-list"><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?></li>
	</ul></nav>
</div>
