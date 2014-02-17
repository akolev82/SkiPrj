<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */

class AceHelper extends Helper {
  
  public $helpers = array('Html', 'Form', 'Combo');
  protected $defaultClass = 'TitledForm';
  protected $genderMap = array('M' => 'Male', 'F' => 'Female', 'U' => 'Unknown');
  
  public function create($model, $title, $options) {
    if (!isset($options['class'])) {
      $options['class'] = $this->defaultClass;
    }
    $html = $this->Form->create($model, $options);
    if ($title > '') {
      $html .= "\n\t" . '<div class="title"><span>' . $title . '</span>';
      if (isset($options['title_tags'])) $html .= $options['title_tags'];
      $html .= '</div>';  
    }
    $html .= "\n\t" . '<div class="content">';
    return $html;
  }
  
  public function end($options = null) {
    return '</div>' . $this->Form->end($options);
  }
  
  public function toBool($aValue) {
    return ((int)$aValue != 0) ? true : false;
  }
  
  public function toYesStr($aValue) {
    return ($this->toBool($aValue)) ? 'Yes' : 'No';
  }
  
  public function toViewItem($caption, $value) {
    echo '<dt>' . $caption . '</dt>';
    echo '<dd>' . $value . '&nbsp;</dd>';
  }
  
  public function getGenderMap() {
    return $this->genderMap;
  }
  
  public function toGenderName($GenderCode) {
    $GenderCode = strtoupper($GenderCode);
    if (isset($this->genderMap[$GenderCode])) return $this->genderMap[$GenderCode];
    return 'Unknown';
  }
  
  public function toBoolean($value) {
    $value = (int)$value;
    return ($value == 1) ? true : false;
  }
  
  public function toYesNoStr($value) {
    $bool = $this->toBoolean($value);
    return ($bool === true) ? 'Yes' : 'No';
  }
  
  public function createGenderCombo($name, $options = null) {
    $params = array('label' => 'Gender', 'empty' => 'Please choose gender', 'options' => $this->genderMap);
    if (!empty($options) && is_array($options)) {
      $params = am($params, $options);
    }
    return $this->Form->input($name, $params);
  }
  
} ?>