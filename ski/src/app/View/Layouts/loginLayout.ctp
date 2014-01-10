<?php
    echo $this->element('header');
    echo $this->element('main-banner');
    echo $this->element('menus');
    echo '<div class="container marketing">';
    echo '<div id="content">';
        echo $this->Session->flash();
        echo $this->fetch('content');
    echo '';
    echo $this->element('footer_other');
?>