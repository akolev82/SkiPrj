<?php $record =& $role['Role'];
$RoleID = $record['RoleID'];

echo '<div class="roles view">';
  echo '<h2>' . __('Role') . '</h2>';
  echo '<dl>';
    echo $this->Ace->toViewItem(__('RoleID'), $RoleID);
    echo $this->Ace->toViewItem(__('Name'), $record['RoleName']);
    echo $this->Ace->toViewItem(__('Description'), $record['RoleDesc']);
  echo '</dl>';
echo '</div>';
echo '<div class="actions">';
  echo '<h3>' . __('Actions') . '</h3>';
  echo '<ul>';
	  echo '<li>' . $this->Html->link(__('Edit Role'), array('action' => 'edit', $RoleID)) . '</li>';
		echo '<li>' . $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $RoleID), null, __('Are you sure you want to delete # %s?', $RoleID)) . '</li>';
		echo '<li>' . $this->Html->link(__('List Roles'), array('action' => 'index')) . '</li>';
		echo '<li>' . $this->Html->link(__('New Role'), array('action' => 'add')) . '</li>';
      echo '</ul>';
echo '</div>'; ?>
