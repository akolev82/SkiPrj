<div class="reves view">
<h2><?php echo __('Ref'); ?></h2>
	<dl>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($ref['Ref']['Code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc'); ?></dt>
		<dd>
			<?php echo h($ref['Ref']['Desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($ref['Ref']['Value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ref'), array('action' => 'edit', $ref['Ref']['Code'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ref'), array('action' => 'delete', $ref['Ref']['Code']), null, __('Are you sure you want to delete # %s?', $ref['Ref']['Code'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reves'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ref'), array('action' => 'add')); ?> </li>
	</ul>
</div>
