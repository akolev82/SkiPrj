<div class="teamMembers view">
<h2><?php echo __('Team Member'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($teamMember['TeamMember']['TeamMemberID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo h($teamMember['TeamMember']['TeamName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StudentID'); ?></dt>
		<dd>
			<?php echo h($teamMember['TeamMember']['StudentFullName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($is_admin) { ?>
			<li><?php echo $this->Html->link(__('Edit Team Member'), array('action' => 'edit', $teamMember['TeamMember']['TeamMemberID'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Team Member'), array('action' => 'delete', $teamMember['TeamMember']['TeamMemberID']), null, __('Are you sure you want to delete # %s?', $teamMember['TeamMember']['TeamMemberID'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Team Members'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Team Member'), array('action' => 'add')); ?> </li>
		<?php } else { ?>
			<li><?php echo $this->Html->link(__('List Team Members'), array('action' => 'index')); ?> </li>
		<?php }?>
	</ul>
</div>
