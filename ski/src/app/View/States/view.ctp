<div class="states view">
<h2><?php echo __('State'); ?></h2>
	<dl>
		<dt><?php echo __('StateID'); ?></dt>
		<dd>
			<?php echo h($state['State']['StateID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country Name'); ?></dt>
		<dd>
			<?php echo h($state['State']['CountryName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($state['State']['StateCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($state['State']['StateName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if ($is_admin) { ?>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-edit"><?php echo $this->Html->link(__('Edit State'), array('action' => 'edit', $state['State']['StateID'])); ?> </li>
		<li class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete State'), array('action' => 'delete', $state['State']['StateID']), null, __('Are you sure you want to delete # %s?', $state['State']['StateID'])); ?> </li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List States'), array('action' => 'index')); ?> </li>
		<li class="nav-button-add"><?php echo $this->Html->link(__('New State'), array('action' => 'add')); ?> </li>
	</ul></nav>
</div>
<?php } ?>
