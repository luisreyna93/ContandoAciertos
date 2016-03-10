<?php
include_once('../DB/db.php');

//echo 'entro a controller ';
$action=  $_GET['action'];
//echo $action;
$action();
    function invoke()
    {
        redirect('../views/login.php');
    }
    function login()
    {
        $username = $_GET['username'];
        $password = $_GET['pass'];
        $db = new Db();
        $rows = $db -> select("SELECT nombre apellido FROM usuario WHERE username='".mysql_escape_string($username)."' and password='".mysql_escape_string($password) ."'");
        if(sizeof($rows)==0){
            //login fail
            echo "login fail";
        }else{
          session_start();

          if (!isset($_SESSION['currentUser'])) {
            $_SESSION['currentUser'] = $userame;
            $_SESSION['firstName'] = $row["nombre"];
            $_SESSION['lastName'] = $row["apellido"];
          }

          redirect('../views/menu.php');
        }
        /*$this->loadModel('users');
        if ($this->users->validate($username, $password))
        {
            $userData = $this->users->fetch($username);
            AuthStorage::save($username, $userData);
            $this->redirect('secret_area');
        }
        else
        {
            $this->view->message = 'Invalid login';
            $this->view->render('error');
        }*/
    }

    function logout()
    {
        if (AuthStorage::logged())
        {
            AuthStorage::remove();
            $this->redirect('index');
        }
        else
        {
            $this->view->message = 'You are not logged in.';
            $this->view->render('error');
        }
    }
    function redirect($url, $statusCode = 303)
    {
       header('Location: ' . $url, true, $statusCode);
       die();
    }
