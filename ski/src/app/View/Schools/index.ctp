<?php echo '<div class="schools index">';
  echo '<h2>' . __('Schools') . '</h2>';
  echo '<table cellpadding="0" cellspacing="0" class="ski_table">';
  echo '<tr class="ski_tr">';
    echo '<th>' . $this->Paginator->sort('SchoolID') . '</th>' ;
    echo '<th>' . $this->Paginator->sort('SchoolName') . '</th>' ;
    echo '<th>' . $this->Paginator->sort('AddressStreetAddress') . '</th>' ;
    echo '<th>' . $this->Paginator->sort('Active') . '</th>' ;
    //echo '<th>' . $this->Paginator->sort('SchoolLogo') . '</th>' ;
    //echo '<th>' . $this->Paginator->sort('PrincipalID') . '</th>' ;
    if ($is_admin) echo '<th class="actions">' . __('Actions') . '</th>';
  echo '</tr>';
  foreach ($schools as $school) {
	echo '<tr class="ski_tr_sub">';
	var_dump($school);
      echo '<td>' . h($school['School']['SchoolID']) . '&nbsp;</td>';
      echo '<td>' . h($school['School']['SchoolName']) . '&nbsp;</td>';
      echo '<td>' . h($school['School']['AddressStreetAddress']) . '&nbsp;</td>';
      echo '<td>' . h($this->Ace->toYesNoStr($school['School']['Active'])) . '&nbsp;</td>';
      //echo '<td>' . h($school['School']['SchoolLogo']) . '&nbsp;</td>';
      //echo '<td>' . h($school['School']['PrincipalID']) . '&nbsp;</td>';
      if ($is_admin) {
        echo '<td class="actions">';
          echo $this->Html->link(__('View'), array('action' => 'view', $school['School']['SchoolID']));
          echo $this->Html->link(__('Edit'), array('action' => 'edit', $school['School']['SchoolID']));
          echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $school['School']['SchoolID']), null, __('Are you sure you want to delete # %s?', $school['School']['SchoolID']));
        echo '</td>';
      }
	echo '</tr>';
  } 
  echo '</table>';
  echo '<p>';
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
  echo '</p>';
  echo '<div class="paging">';
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  echo '</div>';
echo '</div>';
if ($is_admin) {
  echo '<div class="actions">';
	echo '<h3>' . __('Actions') . '</h3>';
	echo '<ul>';
		echo '<li>' . $this->Html->link(__('New School'), array('action' => 'add')) . '</li>';
	echo '</ul>';
  echo '</div>';
  echo $this->element('sql_dump');
} ?>