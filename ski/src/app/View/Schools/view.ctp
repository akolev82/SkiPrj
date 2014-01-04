<div class="schools view">
<h2><?php echo __('School'); ?></h2>
	<dl>
		<dt><?php echo __('SchoolID'); ?></dt>
		<dd>
			<?php echo h($school['School']['SchoolID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SchoolName'); ?></dt>
		<dd>
			<?php echo h($school['School']['SchoolName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PrimaryAddressID'); ?></dt>
		<dd>
			<?php echo h($school['School']['PrimaryAddressID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($school['School']['Active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SchoolLogo'); ?></dt>
		<dd>
			<?php echo h($school['School']['SchoolLogo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PrincipalID'); ?></dt>
		<dd>
			<?php echo h($school['School']['PrincipalID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit School'), array('action' => 'edit', $school['School']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete School'), array('action' => 'delete', $school['School']['id']), null, __('Are you sure you want to delete # %s?', $school['School']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('action' => 'add')); ?> </li>
	</ul>
</div>
