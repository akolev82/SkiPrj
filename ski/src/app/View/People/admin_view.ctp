<div class="people view">
<h2><?php echo __('Person'); ?></h2>
	<dl>
		<dt><?php echo __('PersonID'); ?></dt>
		<dd>
			<?php echo h($person['Person']['PersonID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('UserID'); ?></dt>
		<dd>
			<?php echo h($person['Person']['UserID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
			<?php echo h($person['Person']['FirstName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
			<?php echo h($person['Person']['LastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MiddleName'); ?></dt>
		<dd>
			<?php echo h($person['Person']['MiddleName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($person['Person']['Gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BirthDate'); ?></dt>
		<dd>
			<?php echo h($person['Person']['BirthDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BirthPlace'); ?></dt>
		<dd>
			<?php echo h($person['Person']['BirthPlace']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['PersonID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['PersonID']), null, __('Are you sure you want to delete # %s?', $person['Person']['PersonID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($person['Users'])): ?>
		<dl>
			<dt><?php echo __('UserID'); ?></dt>
		<dd>
	<?php echo $person['Users']['UserID']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $person['Users']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Pass'); ?></dt>
		<dd>
	<?php echo $person['Users']['pass']; ?>
&nbsp;</dd>
		<dt><?php echo __('Super'); ?></dt>
		<dd>
	<?php echo $person['Users']['super']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Users'), array('controller' => 'users', 'action' => 'edit', $person['Users']['id'])); ?></li>
			</ul>
		</div>
	</div>
	