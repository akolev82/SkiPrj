<?php
  echo $this->element('header');
  //echo $this->element('main-banner');
  echo $this->element('menus');

  echo '<div id="container">';
     echo '<div id="content">';
        echo $this->Session->flash();
            echo $this->fetch('content');
            echo '';
    echo $this->element('footer');
echo $this->element('sql_dump');
?>