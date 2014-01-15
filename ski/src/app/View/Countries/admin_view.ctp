<div class="countries view">
<h2><?php echo __('Country'); ?></h2>
	<dl>
		<dt><?php echo __('CountryID'); ?></dt>
		<dd>
			<?php echo h($country['Country']['CountryID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountryName'); ?></dt>
		<dd>
			<?php echo h($country['Country']['CountryName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-edit"><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['CountryID'])); ?> </li>
		<li class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['CountryID']), null, __('Are you sure you want to delete # %s?', $country['Country']['CountryID'])); ?> </li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
	</ul></nav>
</div>
