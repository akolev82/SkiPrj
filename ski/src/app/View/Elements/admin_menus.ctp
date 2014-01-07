<?php echo '<div id="admin-menu">';
  echo '<ul>';
    echo '<li>' . $this->Html->link(__('Home'), array('action' => 'display', 'controller' => 'pages', 'admin' => true)) . '</li>';
  echo '</ul>';
    
  echo '<fieldset><legend>User management</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Users'), array('action' => 'index', 'controller' => 'users', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Roles'), array('action' => 'index', 'controller' => 'roles', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Domains'), array('action' => 'index', 'controller' => 'domains', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Permissions'), array('action' => 'index', 'controller' => 'permissions', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Role permissions'), array('action' => 'index', 'controller' => 'RolePermissions', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('User permissions'), array('action' => 'index', 'controller' => 'UserPermissions', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</fieldset>';
        
  echo '<fieldset><legend>Peoples</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Peoples'), array('action' => 'index', 'controller' => 'peoples', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Students'), array('action' => 'index', 'controller' => 'students', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Coaches'), array('action' => 'index', 'controller' => 'coaches', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Contact types'), array('action' => 'index', 'controller' => 'ContactTypes', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</fieldset>';

  echo '<fieldset><legend>Teams</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Teams'), array('action' => 'index', 'controller' => 'teams', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Schools'), array('action' => 'index', 'controller' => 'schools', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</fieldset>';
      
  echo '<fieldset><legend>Events</legend>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Seasons'), array('action' => 'index', 'controller' => 'seasons', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Leagues'), array('action' => 'index', 'controller' => 'leagues', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Events'), array('action' => 'index', 'controller' => 'events', 'admin' => true)) . '</li>';
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