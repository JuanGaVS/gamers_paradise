<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function login($username, $password) {

    require_once '../entities/User.php';

    $user = new User();
    $login_success = $user->user_login($username, $password);

   /* if ($login_success) {
        session_start();
       // $_SESSION['username'] = $username;
        //header('Location: admin.php');
        
    }
    */
    echo $login_success;
}

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    login($_POST['username'], $_POST['password']);
    echo '1';
//}
/*
  elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if($_SESSION['username'] != '' || $_SESSION['username'] != NULL ){
  header('Location: admin.php');
  }
  } */

?>
