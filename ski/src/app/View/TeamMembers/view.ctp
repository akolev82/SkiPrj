<div class="teamMembers view">
<h2><?php echo __('Team Member'); ?></h2>
	<dl>
		<dt><?php echo __('TeamMemberID'); ?></dt>
		<dd>
			<?php echo h($teamMember['TeamMember']['TeamMemberID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TeamID'); ?></dt>
		<dd>
			<?php echo h($teamMember['TeamMember']['TeamID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StudentID'); ?></dt>
		<dd>
			<?php echo h($teamMember['TeamMember']['StudentID']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team Member'), array('action' => 'edit', $teamMember['TeamMember']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team Member'), array('action' => 'delete', $teamMember['TeamMember']['id']), null, __('Are you sure you want to delete # %s?', $teamMember['TeamMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Member'), array('action' => 'add')); ?> </li>
	</ul>
</div>
