<?php echo '<div id="admin-menu">';
  echo '<ul>';
    echo '<li>' . $this->Html->link('Home', '/') . '</li>';
    echo '<li>' . $this->Html->link(__('Users'), array('action' => 'index', 'controller' => 'users')) . '</li>';
    
    echo '<li>' . $this->Html->link(__('Seasons'), array('action' => 'index', 'controller' => 'seasons')) . '</li>';
    echo '<li>' . $this->Html->link(__('Leagues'), array('action' => 'index', 'controller' => 'leagues')) . '</li>';
    echo '<li>' . $this->Html->link(__('Schools'), array('action' => 'index', 'controller' => 'schools')) . '</li>';
  echo '</ul>';
echo '</div>'; ?>