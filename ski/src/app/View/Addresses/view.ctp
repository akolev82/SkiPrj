<div class="addresses view">
<h2><?php echo __('Address'); ?></h2>
	<dl>
		<dt><?php echo __('AddressID'); ?></dt>
		<dd>
			<?php echo h($address['Address']['AddressID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AddressName'); ?></dt>
		<dd>
			<?php echo h($address['Address']['AddressName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StreetAddress'); ?></dt>
		<dd>
			<?php echo h($address['Address']['StreetAddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ZipID'); ?></dt>
		<dd>
			<?php echo h($address['Address']['ZipID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CityID'); ?></dt>
		<dd>
			<?php echo h($address['Address']['CityID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StateID'); ?></dt>
		<dd>
			<?php echo h($address['Address']['StateID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountryID'); ?></dt>
		<dd>
			<?php echo h($address['Address']['CountryID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
	</ul>
</div>
