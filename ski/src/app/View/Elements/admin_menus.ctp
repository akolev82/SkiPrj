<?php echo '<div id="admin-menu">';
  echo '<ul>';
    echo '<li>' . $this->Html->link('Home', '/') . '</li>';
  echo '</ul>';
    
  echo '<fieldset><legend>User management</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Users'), array('action' => 'index', 'controller' => 'users')) . '</li>';
      echo '<li>' . $this->Html->link(__('Roles'), array('action' => 'index', 'controller' => 'roles')) . '</li>';
      echo '<li>' . $this->Html->link(__('Permissions'), array('action' => 'index', 'controller' => 'permissions')) . '</li>';
    echo '</ul>';
  echo '</fieldset>';
        
  echo '<fieldset><legend>Peoples</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Peoples'), array('action' => 'index', 'controller' => 'peoples')) . '</li>';
      echo '<li>' . $this->Html->link(__('Students'), array('action' => 'index', 'controller' => 'students')) . '</li>';
      echo '<li>' . $this->Html->link(__('Coaches'), array('action' => 'index', 'controller' => 'coaches')) . '</li>';
    echo '</ul>';
  echo '</fieldset>';

  echo '<fieldset><legend>Teams</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Teams'), array('action' => 'index', 'controller' => 'teams')) . '</li>';
      echo '<li>' . $this->Html->link(__('Schools'), array('action' => 'index', 'controller' => 'schools')) . '</li>';
    echo '</ul>';
  echo '</fieldset>';
      
  echo '<fieldset><legend>Events</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Seasons'), array('action' => 'index', 'controller' => 'seasons')) . '</li>';
      echo '<li>' . $this->Html->link(__('Leagues'), array('action' => 'index', 'controller' => 'leagues')) . '</li>';
      echo '<li>' . $this->Html->link(__('Events'), array('action' => 'index', 'controller' => 'events')) . '</li>';
    echo '</ul>';
  echo '</fieldset>';

  echo '<fieldset><legend>Locations</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Countries'), array('action' => 'index', 'controller' => 'countries')) . '</li>';
      echo '<li>' . $this->Html->link(__('States'), array('action' => 'index', 'controller' => 'states')) . '</li>';
      echo '<li>' . $this->Html->link(__('Cities'), array('action' => 'index', 'controller' => 'cities')) . '</li>';
      echo '<li>' . $this->Html->link(__('Zips'), array('action' => 'index', 'controller' => 'zips')) . '</li>';
    echo '</ul>';
  echo '</fieldset>';
echo '</div>'; ?>