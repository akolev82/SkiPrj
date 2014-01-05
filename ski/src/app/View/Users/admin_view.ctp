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
echo '</div>';
echo '<div class="actions">';
  echo '<h3>' . __('Actions') . '</h3>';
  echo '<ul>';
	  echo '<li>' . $this->Html->link(__('Edit User'), array('action' => 'edit', $UserID)) . '</li>'; ?>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $UserID), null, __('Are you sure you want to delete # %s?', $UserID)); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
