<div class="zips view">
<h2><?php echo __('Zip'); ?></h2>
	<dl>
		<dt><?php echo __('ZipID'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['ZipID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountryID'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['CountryID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CityID'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['CityID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StateID'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['StateID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ZipCode'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['ZipCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($zip['Zip']['longitude']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Zip'), array('action' => 'edit', $zip['Zip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Zip'), array('action' => 'delete', $zip['Zip']['id']), null, __('Are you sure you want to delete # %s?', $zip['Zip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Zips'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zip'), array('action' => 'add')); ?> </li>
	</ul>
</div>
