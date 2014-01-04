<div class="domains view">
<h2><?php echo __('Domain'); ?></h2>
	<dl>
		<dt><?php echo __('DomainID'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['DomainID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DomainName'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['DomainName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DomainDesc'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['DomainDesc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['enabled']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Domain'), array('action' => 'edit', $domain['Domain']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Domain'), array('action' => 'delete', $domain['Domain']['id']), null, __('Are you sure you want to delete # %s?', $domain['Domain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Domains'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Domain'), array('action' => 'add')); ?> </li>
	</ul>
</div>
