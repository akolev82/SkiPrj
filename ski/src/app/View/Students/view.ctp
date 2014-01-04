<div class="students view">
<h2><?php echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('StudentID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['StudentID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SchoolID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['SchoolID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PersonID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['PersonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($student['Student']['Grade']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), null, __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
	</ul>
</div>
