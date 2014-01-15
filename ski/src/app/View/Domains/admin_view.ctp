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
			<?php echo $this->Ace->toYesStr(h($domain['Domain']['enabled'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <h2><?php echo __('Actions'); ?></h2>
    <nav id="main-menu">
        <ul class="nav-bar">
		<li class="nav-button-edit"><?php echo $this->Html->link(__('Edit Domain'), array('action' => 'edit', $domain['Domain']['DomainID'])); ?> </li>
		<li class="nav-button-delete"><?php echo $this->Form->postLink(__('Delete Domain'), array('action' => 'delete', $domain['Domain']['DomainID']), null, __('Are you sure you want to delete # %s?', $domain['Domain']['DomainID'])); ?> </li>
		<li class="nav-button-list"><?php echo $this->Html->link(__('List Domains'), array('action' => 'index')); ?> </li>
		<li class="nav-button-add"><?php echo $this->Html->link(__('New Domain'), array('action' => 'add')); ?> </li>
	</ul></nav>
</div>
