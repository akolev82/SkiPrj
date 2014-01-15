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
  echo '<h2>' . __('Actions') . '</h2>';
  echo '<nav id="main-menu">';
    echo '<ul class="nav-bar">';
	    echo '<li class="nav-button-edit">' . $this->Html->link(__('Edit Role'), array('action' => 'edit', $RoleID)) . '</li>';
		echo '<li class="nav-button-delete">' . $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $RoleID), null, __('Are you sure you want to delete # %s?', $RoleID)) . '</li>';
		echo '<li class="nav-button-list">' . $this->Html->link(__('List Roles'), array('action' => 'index')) . '</li>';
		echo '<li class="nav-button-add">' . $this->Html->link(__('New Role'), array('action' => 'add')) . '</li>';
    echo '</ul>';
  echo '</nav>';
echo '</div>'; ?>
