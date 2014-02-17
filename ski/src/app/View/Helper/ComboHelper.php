<?php //class helper 

class ComboMaker {
  protected $helper = null;
  protected $model = null;
  protected $js_object = '';
  protected $Form = null;
  
  protected $fields = array();
  
  protected $mInitComboCode = '';
  protected $mExecComboCode = '';
  
  public function __construct(Helper &$helper, $js_object, $model = '', $conf = array()) { //do not instantiate directly
    $this->helper = $helper;
    $this->Form = $this->helper->Form;
    $this->js_object = $js_object;
    $this->model = ($model > '') ? $model : $this->Form->defaultModel;
    $this->fields = $this->init($conf);
  }
  
  protected function init(array &$conf) {
    $options = array();
    foreach($conf as $key => &$params) {
      if (!is_array($params)) {
        throw new NotFoundException(__('The option ' . $name . ' is not an array.'));
      }
      $model = '';
      if ($this->isEmpty($params, 'model')) $params['model'] = $this->model;
      if ($this->isEmpty($params, 'name')) {
        throw new NotFoundException(__('Missing field "name".'));
      }
      $model = $params['model'];
      $name = $params['name'];
      $options[$key] = $this->helper->toOptions($model, $name, $params);
      $opt =& $options[$key];
      if (!$this->isEmpty($opt, 'id')) {
        $opt['id'] = '#' . $opt['id'];
      }
      if ($this->isEmpty($opt, 'value')) {
        $opt['value'] = '';
      }
      //$options[$key] = $opt;
    }
    return $options;
  }
  
  protected function toJavaScriptObject(&$data) {
    return json_encode($data);
  }
  
  protected function isEmpty(array &$data, $name) {
    if (!isset($data[$name])) return true;
    return (empty($data[$name]) == true) ? true : false;
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
  
  public function getValue(&$options, $name, $type = '') {
    if ($options == null) {
      if ($type > '') {
        $options = $this->fields[$type][$name];
      } else {
        $options =& $this->fields[$name];
      }
    }
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
  
  protected function isDefinedOption(&$options) {
    return (isset($options) && is_array($options) && count($options) > 0) ? true : false;
  }
  
  public function addAutoComplete($name, $script, $options) {
    if (!$this->isDefinedOption($options)) {
      if (isset($this->fields[$name])) { //TODO: edit this
        $options = $this->fields[$name]; //then name of is used as model(combotype)
        $name = $options['name'];
        echo $name;
      } else {
        $options = array();
      }
    }
    $options['autocomplete'] = true;
    return $this->addCustomCombo($name, $script, $options);
  }
  
  public function printClientScript() {
    echo '<script type="text/javascript">$(document).ready(function() {';
    echo $this->mInitComboCode;
    echo "\n";
    //echo $this->mExecComboCode;
    echo '});</script>';
  }
  
}

class LocationComboMaker extends ComboMaker {

  public function __construct(Helper &$helper, $js_object, $model = '', $fields = array()) { //do not instantiate directly
    parent::__construct($helper, $js_object, $model, $fields);
    $this->addInitComboCode($this->js_object . ' = new Ace.Locations(' . $this->toJavaScriptObject($this->fields) . ');');
  }
  
  public function addCountryCombo($name, $options = NULL) {
    if (!$this->isDefinedOption($options)) {
      $values =& $this->fields;
    } else {
      $values =& $options;
    }
    return $this->addAutoComplete($name, $this->call('changeCountry("' . $this->getValue($values, 'CountryID') .'")'), $options);
  }

  public function addStateCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeState("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '")'), $options);
  }

  public function addCityCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeCity("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '")'), $options);
  }

  public function addZipCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeZip("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '","' . $this->getValue($options, 'ZipID') . '")'), $options);
  }
  
  public function addSchoolCombo($name, $options) {
    return $this->addAutoComplete($name, $this->call('changeSchool("' . $this->getValue($options, 'CountryID') .'","' . $this->getValue($options, 'StateID') . '","' . $this->getValue($options, 'CityID') . '","' . $this->getValue($options, 'ZipID') . '","' . $this->getValue($options, 'SchoolID') . '")'), $options);
  }

}

class ModeledComboMaker extends ComboMaker {
  public function __construct(Helper &$helper, $js_object, $model = '', $fields = array()) { //do not instantiate directly
    parent::__construct($helper, $js_object, $helper->Form->defaultModel, $fields);
    $this->addInitComboCode($this->js_object . ' = new Ace.Combo.Ajax(' . $this->toJavaScriptObject($this->fields) . ');');
  }
}

class ComboHelper extends FormHelper {
  
  public $helpers = array('Html', 'Form', 'Ace');
  
  protected $booleanMap = array('0' => 'No', '1' => 'Yes');
  
  public function toOptions($model, $fieldName, $options = array()) {
    $this->setEntity($model, true);
    $options['type'] = 'hidden';
    
    $secure = false;
    if (isset($options['secure']) === true) {
      $secure = $options['secure'];
      unset($options['secure']);
    }
  
    $options = $this->_initInputField($fieldName, array_merge(
        $options, array('secure' => FormHelper::SECURE_SKIP)
    ));
  
    if ($secure === true) {
      $this->_secure(true, null, '' . $options['value']);
    }
  
    return $options;
  }
  
  public function addCustomCombo($name, $options) {
    $merged_options = array_merge(array('options' => array(), 'autocomplete' => 'on'), $options);
    if (isset($merged_options['autocomplete']) && ($merged_options['autocomplete'] === true || strtolower($merged_options['autocomplete']) == 'on')) {
      unset($merged_options['options']);
    }
    return $this->Form->input($name, $merged_options);
  }
  
  public function getCombos($js_object, $fields = array()) {
    return new ComboMaker($this, $js_object, $this->Form->defaultModel, $fields);
  }
  
  public function getLocationCombos($js_object, $fields = array()) {
    return new LocationComboMaker($this, $js_object, $this->Form->defaultModel, $fields);
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