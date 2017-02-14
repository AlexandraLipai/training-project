<?php

include_once ROOT."/models/User.php";
include_once ROOT."/components/Db.php";

class UserController{
    public function actionRegister(){
        $name ='';
        $surname='';
        $email = '';
        $password = '';
        $password_repeat = '';



        if (isset($_POST['submit'])){
            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);

        }

        $errors = User::checkAllData($name,$surname,$email,$password,$password_repeat);

        if ($errors == false){
            $password = password_hash($password, PASSWORD_DEFAULT);
            User::register($name, $surname, $email, $password);
            header ("Location: /user/login");
        }

        require_once ROOT."/views/user/register.php";
        return true;
    }

    public function actionLogin(){

        if (isset($_POST['submit'])){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors = User::checkUserData($email,$password);
            if ($errors == false){
                User::auth($email);
                header ("Location: /");
            }
        }

        require_once ROOT."/views/user/login.php";
       return true;
    }

    public function actionLogout(){
        unset($_SESSION['user']);
        header ("Location: /");
        return true;
    }

}