<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/

App::uses('JoinedPaginatorComponent', 'Controller/Component');

class AppController extends Controller {

  public $components = array('Session',
      'Paginator' => array('className' => 'JoinedPaginator'),
      'Auth' => array(
          'loginAction' => array(
              'controller' => 'users',
              'action' => 'login',
              'admin' => true
          ),
          'loginRedirect' => array(
              'controller' => 'pages',
              'admin' => true
          ),
          //'logoutRedirect' => '/',
          'authError' => 'Did you really think you are allowed to see that?',
          'authenticate' => array(
              'Form' => array(
                  'userModel' => 'User',
                  'fields' => array('username' => 'name', 'password' => 'pass'),
              )
          )
      )
  );
  public $cacheAction = "0";

  public function __construct($request = null, $response = null) {
    parent::__construct($request, $response);
  }

  protected function isAjax() {
    $lIsAjax = ($this->request->is('ajax')) ? true : false;
    if ($lIsAjax) {
      $this->layout = 'ajax';
    }
    return $lIsAjax;
  }

  protected function isLogin() {
    //$user = $this->getUser();
    //return (isset($user)) ? true : false;
    return $this->Auth->loggedIn();
  }

  protected function getUser() {
    return $this->Auth->user();
  }

  public function isAdminContext() {
    if (!isset($this->params['admin'])) return false;
    return ($this->params['admin'] === true) ? true : false;
  }

  /* public function afterFind($results, $primary = false) {
   return Router::getParam('prefix', true) == 'admin' ? $results : $this->locale(&$results);
  } */

  public function beforeFilter() {
    //$this->clear_cache();

    $this->Auth->allowedActions = array('display', 'index', 'view', 'find'); //do not require automatic login

    $is_admin = $this->isAdminContext();
    $this->set('is_admin', $is_admin);
    if ($is_admin) {
      AuthComponent::$sessionKey = 'Auth.Admin';
      $is_logged_in = $this->Auth->loggedIn();
      $this->set('is_logged_in', $is_logged_in);


      //Controller::cacheAction = false;
      if (!$is_logged_in && $this->action != 'login' && $this->action != 'logout') {
        //tell Auth to call the isAuthorized function before allowing access
        $this->Auth->allowedActions = array(); //to require automatic login
        $this->Auth->authorize = 'Controller';


        /*if ($this->Session->check('user') === false) {
         $this->redirect(array('controller' => 'users', 'action' => 'login'));
        $this->Session->setFlash('The URL you\'ve followed requires you login.');
        }*/
      }
      $this->layout = 'adminLayout';
    } else {
      //allow all non-logged in users access to items without a prefix
      if (!isset($this->params['prefix'])) $this->Auth->allow('*');

      AuthComponent::$sessionKey = 'Auth.Common';
      $is_logged_in = $this->Auth->loggedIn();
      $this->set('is_logged_in', $is_logged_in);
    }

    return true;
  }

  function isAuthorized() {
    //if the prefix is setup, make sure the prefix matches their role
    //if( isset($this->params['prefix']))
    //  return (strcasecmp($this->params['prefix'],$this->Auth->user('role'))===0);
    if (!$this->isLogin()) return false;
    return true;
     
    //shouldn't get here, better be safe than sorry
    //return false;
  }

  public function clear_cache() {
    Cache::clear();
    clearCache();

    $files = array();
    $files = array_merge($files, glob(CACHE . '*')); // remove cached css
    $files = array_merge($files, glob(CACHE . 'css' . DS . '*')); // remove cached css
    $files = array_merge($files, glob(CACHE . 'js' . DS . '*'));  // remove cached js
    $files = array_merge($files, glob(CACHE . 'models' . DS . '*'));  // remove cached models
    $files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));  // remove cached persistent

    foreach ($files as $f) {
      if (is_file($f)) {
        unlink($f);
      }
    }

    if(function_exists('apc_clear_cache')):
    apc_clear_cache();
    apc_clear_cache('user');
    endif;

    $this->set(compact('files'));
    //$this->layout = 'ajax';
  }

  protected function internalFind($numargs, $arg_list) {

  }

  protected final function doFind($numargs, $arg_list) {
    if ($numargs > 0 && $numargs % 2 != 0) {
      echo 'Invalid number of parameters.';
      $this->render('Errors/error');
      return;
    }
    $this->internalFind($numargs, $arg_list);
    $this->render('/Pages/find', 'ajax');
  }

  public function find() {
    $this->doFind(func_num_args(), func_get_args());
  }

  public function admin_find() {
    $this->doFind(func_num_args(), func_get_args());
  }

}
