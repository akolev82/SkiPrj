<?php
class LocationComboMaker {
  protected $helper = null;
  protected $model = null;
  protected $js_object = '';
  protected $Form = null;
  
  protected $mInitComboCode = '';
  protected $mExecComboCode = '';

  public function __construct(Helper &$helper, $js_object, $model = '', $fields = array(), $values = array()) { //do not instantiate directly
    $this->helper = $helper;
    $this->Form = $this->helper->Form;
    $this->js_object = $js_object;
    $this->model = ($model > '') ? $model : $this->Form->defaultModel;
    $CountryID = $this->toID($fields, 'country');
    $StateID = $this->toID($fields, 'state');
    $CityID = $this->toID($fields, 'city');
    $ZipID = $this->toID($fields, 'zip');
    
    $initialValues = '';
    if (isset($values['country']) == true) $initialValues .= '"country": "' . $values['country'] . '"';
    if (isset($values['state']) == true) {
      if ($initialValues > '') $initialValues .= ',';
      $initialValues .= '"state": "' . $values['state'] . '"';
    }
    if (isset($values['city']) == true) {
      if ($initialValues > '') $initialValues .= ',';
      $initialValues .= '"city": "' . $values['city'] . '"';
    }
    if (isset($values['zip']) == true) {
      if ($initialValues > '') $initialValues .= ',';
      $initialValues .= '"zip": "' . $values['zip'] . '"';
    }
    $initialValues = '{' . $initialValues . '}';
    $this->addInitComboCode($this->js_object . ' = new Ace.Locations("' . $CountryID . '","' . $StateID . '","' . $CityID . '","' . $ZipID . '", ' . $initialValues . ');');
  }
  
  public function loadData($CountryValue = '', $StateValue = '', $CityValue = '', $ZipValue = '') {
    //$this->addInitComboCode($this->js_object . '.changeCountry("' . $CountryValue . '")');
    //$this->addInitComboCode($this->js_object . '.changeState("' . $StateValue . '")');
    //$this->addInitComboCode($this->js_object . '.changeCity("' . $CityValue . '")');
    //$this->addInitComboCode($this->js_object . '.changeZip("' . $ZipValue . '")');
  }
  
  public function toID(array &$fields, $name) {
    if (!isset($fields[$name])) return '';
    $name = $fields[$name];
    if ($name <= '') return '';
    return '#' . $this->model . $name; 
  }
  
  protected function call($statement) {
    return $this->js_object . '.' . $statement;
  }
  
  public function addInitComboCode($code) {
    if ($this->mInitComboCode > '') $this->mInitComboCode .= "\n";
    $this->mInitComboCode .= $code;
  }
  
  public function addExecComboCode($code) {
    if ($this->mExecComboCode > '') $this->mExecComboCode .= "\n";
    $this->mExecComboCode .= $code;
  }
  
  public function getInitComboCode() {
    return $this->mInitComboCode;
  }
  
  public function getExecComboCode() {
    return $this->mExecComboCode;
  }

  public function getValue(&$options, $name) {
    if (!array_key_exists($name, $options)) {
      return 'null';
    }
    return $options[$name];
  }
  
  public function addCustomCombo($name, $script, $options) {
    $str = $this->helper->addCustomCombo($name, $options);
    $this->addExecComboCode($script);
    return $str;
  }
  
  public function addAutoComplete($name, $script, $options) {
    if (!isset($options)) $options = array();
    $options['autocomplete'] = true;
    return $this->addCustomCombo($name, $script, $options);
  }

  public function addCountryCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeCountry("' . $this->getValue($options, 'CountryID') .'")'), $options);
  }

  public function addStateCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeState("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '")'), $options);
  }

  public function addCityCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeCity("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '")'), $options);
  }

  public function addZipCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeCity("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '","' . $this->getValue($options, 'ZipID') . '")'), $options);
  }
  
  public function printClientScript() {
    echo '<script type="text/javascript">$(document).ready(function() {';
    echo $this->mInitComboCode;
    echo "\n";
    //echo $this->mExecComboCode; 
    echo '});</script>';
  }

}

class ComboHelper extends Helper {
  
  public $helpers = array('Html', 'Form', 'Ace');
  
  protected $booleanMap = array('0' => 'No', '1' => 'Yes');
  
  public function addCustomCombo($name, $options) {
    $merged_options = array_merge(array('options' => array(), 'autocomplete' => 'on'), $options);
    if (isset($merged_options['autocomplete']) && ($merged_options['autocomplete'] === true || strtolower($merged_options['autocomplete']) == 'on')) {
      unset($merged_options['options']);
    }
    return $this->Form->input($name, $merged_options);
  }
  
  public function getLocationCombos($js_object, $fields = array(), $values = array()) {
    return new LocationComboMaker($this, $js_object, $this->Form->defaultModel, $fields, $values);
  }
  
  public function getYesNoMap() {
    return $this->booleanMap();
  }
  
  public function comboBoolean($name, $true_caption = 'true', $false_caption = 'false', $empty = 'Please choose', $options = array()) {
    return $this->Form->input($name, array_merge(array('options' => array('1' => $true_caption, '0' => $false_caption), 'empty' => $empty), $options));
  }
  
  public function comboYesNo($name, $empty = 'Please choose Yes or No', $options = array()) {
    return $this->comboBoolean($name, 'Yes', 'No', $empty, $options);
  }
  
} ?>