<div id="sidebar_left">
    <?php
        if ($this->get('title_for_layout') == "Schools" ){?>
        <div><img src="<?php echo $this->webroot; ?>img/snow_school.gif" style="width: 100%; height: auto"></div>
    <?php }
        if ($this->get('title_for_layout') == "Leagues" ) {?>
        <div><img src="<?php echo $this->webroot; ?>img/leagues.jpg" style="width: 100%; height: auto"></div>
    <?php }
        if ($this->get('title_for_layout') == "Seasons" ) {?>
        <div><img src="<?php echo $this->webroot; ?>img/ski_season.jpg" style="width: 100%; height: auto"></div>
    <?php }?>
</div>