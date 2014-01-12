<?php
class LocationComboMaker {
  protected $helper = null;
  protected $js_object = '';
  protected $Form = null;
  
  protected $mInitComboCode = '';
  protected $mExecComboCode = '';

  public function __construct(&$helper, $js_object, $CountryID = '', $StateID = '', $CityID = '', $ZipID = '') { //do not instantiate directly
    $this->helper = $helper;
    $this->Form = $this->helper->Form;
    $this->js_object = $js_object;
    $CountryID = $this->toID($CountryID);
    $StateID = $this->toID($StateID);
    $CityID = $this->toID($CityID);
    $ZipID = $this->toID($ZipID);
    $this->addInitComboCode($this->js_object . ' = new Ace.Locations("' . $CountryID . '","' . $StateID . '","' . $CityID . '","' . $ZipID . '");');
  }
  
  public function loadData($CountryValue = '', $StateValue = '', $CityValue = '', $ZipValue = '') {
    $this->addInitComboCode($this->js_object . '.reloadAll("' . $CountryValue . '","' . $StateValue . '","' . $CityValue . '","' . $ZipValue . '");');
  }
  
  public function toID($name) {
    if ($name <= '') return '';
    return '#' . $this->Form->defaultModel . $name; 
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
    $this->helper->addCustomCombo($name, $options);
    $this->addExecComboCode($script);
  }

  public function addCountryCombo($name, $options) {
    $this->addCustomCombo($name, $this->call('changeCountry("' . $this->getValue($options, 'CountryID') .'")'), $options);
  }

  public function addStateCombo($name, $options) {
    $this->addCustomCombo($name, $this->call('changeState("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '")'), $options);
  }

  public function addCityCombo($name, $options) {
    $this->addCustomCombo($name, $this->call('changeCity("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '")'), $options);
  }

  public function addZipCombo($name, $options) {
    $this->addCustomCombo($name, $this->call('changeCity("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '","' . $this->getValue($options, 'ZipID') . '")'), $options);
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
  
  public function addCustomCombo($name, $options) {
    $merged_options = array_merge(array('options' => array(), 'empty' => 'Please choose'), $options);
    echo $this->Form->input($name, $merged_options);
  }
  
  public function getLocationCombos($js_object, $CountryID = '', $StateID = '', $CityID = '', $ZipID = '') {
    return new LocationComboMaker($this, $js_object, $CountryID, $StateID, $CityID, $ZipID);
  }
  
} ?>