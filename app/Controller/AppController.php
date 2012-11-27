<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    //Auth login logout routes
    public $components = array(
        'Session',
        'Auth' => array(
            //'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'authorize' => array('Controller') 
            //No log out route set yet...
            //'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        )
    );
    
    public function isAuthorized($user) {
    // superadmin & admin can access every action
    if (isset($user['role']) && ($user['role'] === 'admin' || $user['role'] === 'superadmin' )) {
        return true;
    }
    
    else
        // Default deny
        $this->Session->setFlash('Sorry, you don\'t have permission to access that page.');
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
        return false;
}
    
    // allow login page to be accessable
    public function beforeFilter() {
        $this->Auth->allow(array('controller' => 'users', 'action' => 'login'));
         $this->Auth->autoRedirect = false; //for last login time
    }
    
     function uploadFiles($folder, $formdata, $itemId = null) {
//print_r($formdata);
// echo "<br />";
// echo $formdata['name'];
// setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

// create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

// if itemId is set create an item folder
        if ($itemId) {
// set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
// set new relative folder
            $rel_url = $folder . '/' . $itemId;
// create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

// list of permitted file types
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

// replace spaces with underscores
        $filename = str_replace(' ', '_', $formdata['name']);
// assume filetype is false
        $typeOK = false;
// check filetype is ok
        foreach ($permitted as $type) {
            if ($type == $formdata['type']) {
                $typeOK = true;
                break;
            }
        }
// if file type ok upload the file
        if ($typeOK) {
// switch based on error code
            switch ($formdata['error']) {
                case 0:
// create full filename
                    $full_url = $folder_url . '/' . $formdata['name'];
                    $url = $rel_url . '/' . $formdata['name'];
// upload the file - overwrite existing file
                    $success = move_uploaded_file($formdata['tmp_name'], $url);

// if upload was successful
                    if ($success) {
//save the filename of the file
                        $result['urls'][] = $formdata['name'];
                    } else {
                        $result['errors'][] = "Error uploaded " . $formdata['name'] . "Please try again.";
                    }
                    break;
                case 3:
// an error occurred
                    $result['errors'][] = "Error uploading " . $formdata['name'] . " Please try again.";
                    break;
                default:
// an error occurred
                    $result['errors'][] = "System error uploading " . $formdata['name'] . "Contact webmaster.";
                    break;
            }
        } elseif ($formdata['error'] == 4) {
// no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } else {
// unacceptable file type
            $result['errors'][] = $formdata['name'] . " cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }

        return $result;
    }
    
    function sendEmailConfirmation($first_name, $last_name, $emailaddress, $dob) {
        
            $email = new CakeEmail();
            $email->config('default');
            $email->from(array('lifestylebreakthroughtest@gmail.com' => 'Lifestyle Breakthrough'))
                    ->to($emailaddress)
                    ->subject('Welcome to Lifestyle Breakthrough!')
                    ->send("Dear $first_name $last_name, \n\nWelcome to Lifestyle Breakthough!\nTo access your account, please follow the link: www.test.com \nUsername:  $emailaddress \nPassword:  $dob (Your date of birth in 8 digits) \n\nRegards,\nLifestyle Breakthrough team"
                   );
    }
    
    
}

