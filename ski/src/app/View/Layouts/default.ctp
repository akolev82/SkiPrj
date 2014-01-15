<?php
  echo $this->element('header');
  echo $this->element('main-banner');
  echo $this->element('menus');
  echo '<div class="container marketing">';
    echo $this->element('sidebar_left');
     echo '<div id="content">';
        echo $this->Session->flash();
            echo $this->fetch('content');
        echo '</div>';
    echo $this->element('footer_other');
//echo $this->element('sql_dump');
?>