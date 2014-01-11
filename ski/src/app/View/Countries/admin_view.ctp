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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['CountryID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['CountryID']), null, __('Are you sure you want to delete # %s?', $country['Country']['CountryID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
	</ul>
</div>
