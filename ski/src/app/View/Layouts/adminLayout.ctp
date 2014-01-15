<?php echo $this->element('header_admin');
echo '<div class="menu-container">';
  if ($is_logged_in) {
    echo $this->HTML->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'), array('id' => 'logout'));
  } else {
    echo '<div class="login_right">';
     echo $this->HTML->link(__('Login'), array('controller' => 'users', 'action' => 'login'), array('id' => 'login'));
    echo '</div>';
  }
echo $this->element('admin_menus_horisontal');
echo ' </div>';
echo '<div class="left-sidebar">';
  echo '<div class="logo-admin"></div>';
    echo $this->element('admin_menus');
  echo '</div>';
echo '</div>';
echo '<div id="admin-container">';
  echo $this->fetch('content');
echo '</div>';
/*echo '<div id="splitter">&nbsp;</div>';
echo '<div id="admin-messages">';
  echo $this->Session->flash();
  echo $this->element('sql_dump');
echo '</div>'*/;
