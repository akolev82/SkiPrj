<?php echo '<div class="main-menu">';
  echo '<ul>';
    echo '<li>' . $this->Html->link('Home', '/') . '</li>';
    echo '<li>' . $this->Html->link('Seasons', '/Seasons') . '</li>';
    echo '<li>' . $this->Html->link('Leagues', '/Leagues') . '</li>';
    echo '<li>' . $this->Html->link('Schools', '/Schools') . '</li>';
  echo '</ul>';
echo '</div>'; ?>