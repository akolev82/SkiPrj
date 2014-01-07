<?php $record =& $permission['Permission'];
$PermissionID = $record['PermissionID'];

echo '<div class="permissions view">';
  echo '<h2>' . __('Permission') . '</h2>';
  echo '<dl>';
    echo $this->Ace->toViewItem(__('UserID'), $PermissionID);
    echo $this->Ace->toViewItem(__('Name'), $record['PermissionName']);
    echo $this->Ace->toViewItem(__('Description'), $record['PermissionDesc']);
    echo $this->Ace->toViewItem(__('Domain'), $record['DomainName']);
    echo $this->Ace->toViewItem(__('Is enabled'), $this->Ace->toYesStr($record['enabled']));
  echo '</dl>';
echo '</div>';
echo '<div class="actions">';
  echo '<h3>' . __('Actions') . '</h3>';
  echo '<ul>';
	  echo '<li>' . $this->Html->link(__('Edit Permission'), array('action' => 'edit', $PermissionID)) . '</li>';
		echo '<li>' . $this->Form->postLink(__('Delete Permission'), array('action' => 'delete', $PermissionID), null, __('Are you sure you want to delete # %s?', $PermissionID)) . '</li>';
		echo '<li>' . $this->Html->link(__('List Permissions'), array('action' => 'index')) . '</li>';
		echo '<li>' . $this->Html->link(__('New Permission'), array('action' => 'add')) . '</li>';
      echo '</ul>';
echo '</div>'; ?>