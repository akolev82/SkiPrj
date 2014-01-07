<?php $record =& $user['User'];
$UserID = $record['UserID'];

echo '<div class="users view">';
  echo '<h2>' . __('User') . '</h2>';
  echo '<dl>';
    echo $this->Ace->toViewItem(__('UserID'), $UserID);
    echo $this->Ace->toViewItem(__('Name'), $record['name']);
    echo $this->Ace->toViewItem(__('Is super user'), $this->Ace->toYesStr($record['super']));
    echo $this->Ace->toViewItem(__('Is enabled'), $this->Ace->toYesStr($record['enabled']));
  echo '</dl>';
  echo '<fieldset class="admin-fieldset"><legend>Roles</legend>';
    if (isset($is_add_role) && $is_add_role === true) {
      echo $this->Form->create('UserRole', array('url' => array('controller' => 'users','action' => 'do_add_role', 'admin' => true), 'method' => 'post'));
        echo $this->Form->hidden('UserID', array('value' => $UserID));
        echo $this->Form->input('RoleID', array('options' => $roles, 'empty' => 'Please choose role', 'label' => 'Please choose role'));
      echo $this->Form->end(__('Submit')); 
    } else {
      echo '<div class="innerActions"><ul>';
        echo '<li>' . $this->Html->link(__('Add Role'), array('action' => 'add_role', $UserID)) . '</li>';
      echo '</ul></div>';
    }
    echo '<table>';
      echo '<tr>';
        echo '<th>Role</th>';
        echo '<th>Actions</th>';
      echo '</tr>';
      foreach($user_roles as $record) {
        $item =& $record['UserRole'];
        $RoleName = $item['RoleName'];
        echo '<tr>';
          echo '<td>' . $RoleName . '</td>';
          echo '<td class="actions">';
            echo $this->Form->postLink(__('Remove'), array('admin' => true, 'action' => 'remove_role', $item['UserID'], $item['id']), null, __('Are you sure you want to remove # %s?', $RoleName));
          echo '</td>';
        echo '</tr>';
      }
    echo '</table>'; 
    echo '<p>' . $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    )) . '</p>';
    echo '<div class="paging">';
    	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    	echo $this->Paginator->numbers(array('separator' => ''));
    	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    echo '</div>';
  echo '</fieldset>';
echo '</div>';
echo '<div class="actions">';
  echo '<h3>' . __('Actions') . '</h3>';
  echo '<ul>';
    echo '<li>' . $this->Html->link(__('Edit User'), array('action' => 'edit', $UserID)) . '</li>';
    echo '<li>' . $this->Html->link(__('Add Role'), array('action' => 'add_role', $UserID)) . '</li>';
	echo '<li>' . $this->Form->postLink(__('Delete User'), array('action' => 'delete', $UserID), null, __('Are you sure you want to delete # %s?', $UserID)) . '</li>';
	echo '<li>' . $this->Html->link(__('List Users'), array('action' => 'index')) . '</li>';
	echo '<li>' . $this->Html->link(__('New User'), array('action' => 'add')) . '</li>';
  echo '</ul>';
echo '</div>'; ?>
