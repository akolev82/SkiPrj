<?php App::uses('Component', 'Controller');

App::uses('PaginatorComponent', 'Controller/Component');

class AjaxComponent extends Component {

  // the other component your component uses
  public $components = array('Paginator');

  public $controller = null;

  protected $container = array(); //this is final data
  protected $messages = null;
  protected $data = null;

  public function initialize(Controller $controller) {
    $this->controller = $controller;
    $this->init();
  }

  protected function init() {
    $this->container = array();
    $this->container['messages'] = array();
    $this->messages =& $this->container['messages'];
    $this->container['data'] = array();
    $this->data =& $this->container['data'];
  }

  public function toJson() {
    $this->controller->autoRender = $this->controller->layout = false;
    echo json_encode($this->container);
  }

  public function addMessage($message, $type = 'info') {
    array_push($this->message, array('message' => $message, 'type' => $type));
  }

  public function addData($field, $data) {
    $this->data[$field] = $data;
  }

  public function clear() {
    $this->init();
  }

  protected function getValue(array &$array, $fieldname) {
    $fields = explode('.', $fieldname);
    $ref = null; $lInitalRef = $array;
    foreach($fields as $field) {
      $ref = $lInitalRef[$field];
      $lInitalRef = $ref;
    }
    return $ref;
  }

  protected function addPaginatedRecord($field, $records, $paging, $options = array()) {
    $type = '';
    if (isset($options['type'])) {
      $type = $options['type'];
    };
    if ($type <= '') $type = 'grid';
    if (isset($options['fields'])) $fields = $options['fields'];
    
    $empty = '';
    if (isset($options['empty'])) $empty = $options['empty'];
    
    $data = array('type' => $type, 'empty' => $empty);
    if ($type == 'oneitem') {
      $lPrimaryKey = $options['primaryKey'];
      $lDisplayFields = $options['displayFields'];
      $combo = array();
      foreach($records as $record) {
        $combo_item = array();
        foreach($lPrimaryKey as $field_name => $field_alias) {
          $combo_item['id'][$field_alias] = $this->getValue($record, $field_alias);
        }
        foreach($lDisplayFields as $field_name => $field_alias) {
          $combo_item['display'][$field_alias] = $this->getValue($record, $field_alias);
        }
        array_push($combo, $combo_item);
      }
      $data['records'] = $combo;
    } else if ($type == 'combo') {
      $lPrimaryKey = $options['primaryKey'];
      $lDisplayFields = $options['displayFields'];
      $combo = array();
      foreach($records as $record) {
        $combo_item = array();
        foreach($lPrimaryKey as $field_name => $field_alias) {
          $combo_item['id'][$field_alias] = $this->getValue($record, $field_name);
        }
        foreach($lDisplayFields as $field_name => $field_alias) {
          $combo_item['display'][$field_alias] = $this->getValue($record, $field_name);
        }
        array_push($combo, $combo_item);
      }
      $data['records'] = $combo;
    } else {
      $data['records'] = $records;
    }
    if (!empty($paging)) {
      $paging['url'] = $this->link();
      $data['paging'] = $paging;
    }
    $this->addData(strtolower($field), $data);
  }

  public function paginate(Model $model = null, $options = array()) {
    $name = '';
    if (isset($options['name'])) $name = $options['name'];
    if ($name <= '') $name = $model->name;

    $fields = array();
    if (isset($options['fields'])) $fields = $options['fields'];

    $conditions = array();
    if (isset($options['conditions'])) $conditions = $options['conditions'];

    $whitelist = array();
    if (isset($options['whitelist'])) $whitelist = $options['whitelist'];
    
    $type = '';
    if (isset($options['type'])) {
      $type = $options['type'];
    };
    if ($type <= '') $type = 'grid';

    $paging = null;
    if ($type == 'oneitem') {
      $one_item_options = $options;
      $one_item_options['fields'] = am($options['primaryKey'], $options['displayFields']);
      $data = $model->find('first', $one_item_options);
    } else {
      $data = $this->Paginator->paginate($model, $conditions, $whitelist);
      /*$paging = array(
       'page' => $page,
          'current' => count($results),
          'count' => $count,
          'prevPage' => ($page > 1),
          'nextPage' => ($count > ($page * $limit)),
          'pageCount' => $pageCount,
          'order' => $order,
          'limit' => $limit,
          'options' => Hash::diff($options, $defaults),
          'paramType' => $options['paramType']
      );*/
      $paging = $this->controller->request['paging'][$name];
    }
    $this->addPaginatedRecord($name, $data, $paging, $options);
    return true;
  }

  public function paginateCombo(Model $model = null, $options = array()) {
    $combo_options = array(
        'type' => 'combo',
        'primaryKey' => array($model->name . '.' . $model->primaryKey => $model->primaryKey), 
        'displayFields' => array($model->name . '.' . $model->displayField => $model->displayField)
    );
    $options = am($options, $combo_options);
    return $this->paginate($model, $options);
  }
  
  public function getOneItem(Model $model, $options = array()) {
    $combo_options = array(
        'type' => 'oneitem',
        'primaryKey' => array($model->name . '.' . $model->primaryKey => $model->primaryKey), 
        'displayFields' => array($model->name . '.' . $model->displayField => $model->displayField)
    );
    $options = am($options, $combo_options);
    return $this->paginate($model, $options);
  }
  
  public function url($url = null, $full = false) {
    return h(Router::url($url, $full));
  }
  
  public function link($additional_params = array(), $options = array()) {
    $is_named = false; $params = null;
    $request =& $this->controller->request->params;
    if ($request['named']) {
      $params =& $request['named'];
      $is_named_true;
    } else {
      $params =& $request['pass'];
    }
    $params = $this->controller->params['url'];
    $build = array();
    foreach($params as $key => $value) {
      if ($key == 'page') continue;
      if ($key == 'limit') continue;
      $build[$key] = $value;
    }
    $build = array_merge($build, $additional_params);
    //$build['page'] = '{page}'; //%7Bpage%7D
    //$build['limit'] = '{limit}'; //%7Blimit%7D
    unset($build['page']);
    unset($build['limit']);
    return $this->url($build, false);
  }

}