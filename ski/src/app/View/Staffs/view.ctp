<div class="staffs view">
<h2><?php echo __('Staff'); ?></h2>
	<dl>
		<dt><?php echo __('StaffID'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['StaffID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SchoolID'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['SchoolID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PersonID'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['PersonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($staff['Staff']['role']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staff'), array('action' => 'edit', $staff['Staff']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staff'), array('action' => 'delete', $staff['Staff']['id']), null, __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('action' => 'add')); ?> </li>
	</ul>
</div>
