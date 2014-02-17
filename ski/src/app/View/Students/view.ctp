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
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($student['Student']['Grade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
			<?php echo h($student['Student']['FirstName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
			<?php echo h($student['Student']['LastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MiddleName'); ?></dt>
		<dd>
			<?php echo h($student['Student']['MiddleName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($student['Student']['Gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StreetAddress'); ?></dt>
		<dd>
			<?php echo h($student['Student']['StreetAddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ZipID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['ZipID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CityID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['CityID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StateID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['StateID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountryID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['CountryID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BirthDate'); ?></dt>
		<dd>
			<?php echo h($student['Student']['BirthDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BirthPlace'); ?></dt>
		<dd>
			<?php echo h($student['Student']['BirthPlace']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['StudentID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['StudentID']), null, __('Are you sure you want to delete # %s?', $student['Student']['StudentID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
	</ul>
</div>
