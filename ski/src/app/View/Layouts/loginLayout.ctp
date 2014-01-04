<?php echo $this->element('header');
echo '<div id="container">';
    echo $this->Session->flash();
    echo $this->fetch('content');
echo '</div>';
echo $this->element('footer'); ?>