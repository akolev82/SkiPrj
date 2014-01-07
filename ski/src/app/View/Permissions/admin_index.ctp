<div class="permissions index">
	<h2><?php echo __('Permissions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('PermissionID'); ?></th>
			<th><?php echo $this->Paginator->sort('PermissionName', 'Name'); ?></th>
			<th><?php echo $this->Paginator->sort('PermissionDesc', 'Description'); ?></th>
			<th><?php echo $this->Paginator->sort('DomainName', 'Domain'); ?></th>
			<th><?php echo $this->Paginator->sort('enabled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($permissions as $record) {
	  $permission =& $record['Permission'];
	  $id = $permission['PermissionID'];
	  echo '<tr>';
	    echo '<td>' . h($id) . '&nbsp;</td>';
	    echo '<td>' . h($permission['PermissionName']) . '&nbsp;</td>';
	    echo '<td>' . h($permission['PermissionDesc']) . '&nbsp;</td>';
	    echo '<td>' . $this->Html->link(h($permission['DomainName']), array('controller' => 'domains', 'action' => 'view', $permission['DomainID'])) . '&nbsp;</td>';
	    echo '<td>' . $this->Ace->toYesStr(h($permission['enabled'])) . '&nbsp;</td>';
	    echo '<td class="actions">';
	      echo $this->Html->link(__('View'), array('action' => 'view', $id));
	      echo $this->Html->link(__('Edit'), array('action' => 'edit', $id));
	      echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $id), null, __('Are you sure you want to delete # %s?', $id));
	    echo '</td>';
	  echo '</tr>';
	} ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Permission'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Domains'), array('controller' => 'domains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Domain'), array('controller' => 'domains', 'action' => 'add')); ?> </li>
	</ul>
</div>
