<?php
echo $this->Form->create('User', array('type' => 'post', 'action' => 'login'));
  echo '<h1>Please login to admin panel</h1>';
  echo $this->Session->flash();
  echo $this->Form->input('name', array('label' => 'Username', 'type' => 'text'));
  echo $this->Form->input('pass', array('label' => 'Password', 'type' => 'password'));
  echo $this->Form->input('Login', array('div' => false, 'label' => false, 'type' => 'submit'));
echo $this->Form->end(); 
?>