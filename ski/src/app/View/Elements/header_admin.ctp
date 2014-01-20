<?php header('Cache-Control: no-store, private, no-cache, must-revalidate');                  // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);    // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');                                       // Date in the past
header('Expires: 0', false);
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Pragma: no-cache'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <!-- Bootstrap -->
    <?php echo $this->Html->css('bootstrap');
    echo $this->Html->css('carousel');?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title><?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    $javascript_options = array();
    echo '<script type="text/javascript">';
    echo 'var AcePath = "'. $this->Html->toUrl('', '', '') . '";';
    echo '</script>';
    echo $this->Html->script('/js/jquery/jquery.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery-ui.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.core.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.position.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.widget.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.mouse.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.draggable.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.resizable.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.button.js', $javascript_options);
    echo $this->Html->script('/js/jquery/ui/jquery.ui.dialog.js', $javascript_options);
    echo $this->Html->script('/css/js/bootstrap.js', $javascript_options);
    echo $this->Html->script('/js/global.js', $javascript_options);
    echo $this->Html->script('/js/splitter.js', $javascript_options);
    echo $this->Html->script('/js/combo.js', $javascript_options);
    echo $this->Html->script('/css/js/menu_jquery.js', $javascript_options);
    echo $this->Html->script('/css/js/holder.js', $javascript_options);

    $base = 'layouts' . DS . Inflector::underscore($this->layout);
    $js_link = $this->Html->toUrlJS($base); //layout css
    if (is_file($this->Html->toPathExtended('js', $base, '.js'))) {
        echo $this->Html->script($js_link);
    }

    $base = Inflector::underscore($this->Html->getCurrentController()) . DS . Inflector::underscore($this->Html->getCurrentAction()); //css by controller and action
    $js_link = $this->Html->toUrlJS($base); //layout css
    if (is_file($this->Html->toPathExtended('js', $base, '.js'))) {
        echo $this->Html->script($js_link);
    }

    $is_admin = true;
    if ($is_admin) {
        $this->Html->css('admin/admin.css');
        echo $this->Html->css('front');
        echo $this->Html->css('styles');
        echo $this->Html->css('final'); //IMPORTANT this css should be the last added css, in order to override css layouts
    } else {
        //echo $this->Html->css('cake.generic');
        echo $this->fetch('css');
        // echo $this->Html->css('front');
        // echo $this->Html->css('styles');
        echo $this->Html->css('menus');
        // echo $this->Html->css('final'); //IMPORTANT this css should be the last added css, in order to override css layouts
    }
    echo $this->Html->css('combo.css');

    /* if (isset($css_list)) {
         foreach($css_list as $item) {
             $src = $item['src'];
             echo $this->Html->css($src);
         }
     }*/

    $base = 'layouts' . DS . Inflector::underscore($this->layout);
    $css_link = $this->Html->toUrlCSS($base); //layout css
    //echo $css_link;
    if (is_file($this->Html->toPathExtended('css', $base, '.css'))) {
        echo $this->Html->css($css_link);
    }

    $base = Inflector::underscore($this->Html->getCurrentController()) . DS . Inflector::underscore($this->Html->getCurrentAction());
    $css_link = $this->Html->toUrlCSS($base); //css by controller and action
    //echo $css_link;
    if (is_file($this->Html->toPathExtended('css', $base, '.css'))) {
        echo $this->Html->css($css_link);
    }
    ?>
</head>
<body>