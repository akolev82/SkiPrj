<?php
echo '<div id="cssmenu">';
  echo '<ul>';
    echo '<li class="cssmenu active">';
    echo $this->Html->link(__('Home'), array('action' => 'display', 'controller' => 'pages', 'admin' => true));
    echo '</li>';
  echo '<li class="has-sub"><a href="#"><span>User management</span></a>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Users'), array('action' => 'index', 'controller' => 'users', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Roles'), array('action' => 'index', 'controller' => 'roles', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Domains'), array('action' => 'index', 'controller' => 'domains', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Permissions'), array('action' => 'index', 'controller' => 'permissions', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Role permissions'), array('action' => 'index', 'controller' => 'RolePermissions', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('User permissions'), array('action' => 'index', 'controller' => 'UserPermissions', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</li>';
        
  echo '<li class="has-sub"><a href="#"><span>Peoples</span></a>';
    echo '<ul>';
      //echo '<li>' . $this->Html->link(__('People'), array('action' => 'index', 'controller' => 'people', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Students'), array('action' => 'index', 'controller' => 'students', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Coaches'), array('action' => 'index', 'controller' => 'coaches', 'admin' => true)) . '</li>';
      //echo '<li>' . $this->Html->link(__('Contact types'), array('action' => 'index', 'controller' => 'ContactTypes', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</li>';

  echo '<li class="has-sub"><a href="#"><span>Teams</span></a>';
    echo '<ul>';
    	echo '<li>' . $this->Html->link(__('Team types'), array('action' => 'index', 'controller' => 'TeamTypes', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Teams'), array('action' => 'index', 'controller' => 'teams', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Team members'), array('action' => 'index', 'controller' => 'TeamMembers', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Schools'), array('action' => 'index', 'controller' => 'schools', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</li>';
      
  echo '<li class="has-sub"><a href="#"><span>Events</span></a>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Seasons'), array('action' => 'index', 'controller' => 'seasons', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Leagues'), array('action' => 'index', 'controller' => 'leagues', 'admin' => true)) . '</li>';
      echo '<li>' . $this->Html->link(__('Events'), array('action' => 'index', 'controller' => 'events', 'admin' => true)) . '</li>';
    echo '</ul>';
  echo '</li>';

  echo '<li class="has-sub"><a href="#"><span>Locations</span></a>';
    echo '<ul>';
      echo '<li>' . $this->Html->link(__('Countries'), array('action' => 'index', 'controller' => 'countries')) . '</li>';
      echo '<li>' . $this->Html->link(__('States'), array('action' => 'index', 'controller' => 'states')) . '</li>';
      echo '<li>' . $this->Html->link(__('Cities'), array('action' => 'index', 'controller' => 'cities')) . '</li>';
      echo '<li>' . $this->Html->link(__('Zips'), array('action' => 'index', 'controller' => 'zips')) . '</li>';
    echo '</ul>';
  echo '</li>';
 echo '</ul>';
echo '</div>'; ?>