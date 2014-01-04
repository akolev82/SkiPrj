<?php echo $this->element('header');
echo '<div id="admin-title">Admin panel for SKI '; 
  if ($is_logged_in) {
    echo $this->HTML->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'), array('id' => 'logout'));
  } else {
    echo '<div>Login</div>';
  }
echo ' </div>';
echo $this->element('admin_menus');
echo '<div id="container">';
  echo '<div id="content">';
    echo $this->Session->flash();
    echo $this->fetch('content');
  echo '</div>';
echo '</div>';
echo $this->element('sql_dump');
echo $this->element('footer'); ?>