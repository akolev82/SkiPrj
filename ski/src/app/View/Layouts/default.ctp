<?php echo $this->element('header');

echo '<div id="container">';
  echo $this->element('main-banner');
  echo $this->element('menus');
  echo '<div id="content">';
    echo $this->Session->flash();
    echo $this->fetch('content');
  echo '</div>';
echo '</div>';
echo $this->element('sql_dump');
echo $this->element('footer'); ?>