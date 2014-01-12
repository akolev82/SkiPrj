<?php if (isset($is_debug) && $is_debug === true) {
  echo '<div id="admin-messages">';
    echo $this->Session->flash();
    echo $this->element('sql_dump');
  echo '</div>';
  var_dump($criterias);
}

echo '<option value="">' . $empty_caption . '</option>';
foreach($selectbox as $value => $caption) {
  echo '<option value="' . $value .'">' . $caption . '</option>';
} 
?>