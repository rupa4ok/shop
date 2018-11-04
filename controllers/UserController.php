<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 30.10.2018
 * Time: 6:49
 */

class UserController
{
    
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password= '';
        $results = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
        
        $errors = false;
        
        if (!User::checkName($name)) {
            $errors[] = 'Имя не должно быть короче 3-х симоволов';
        }
    
        if (!User::checkEmail($email)) {
            $errors[] = 'Неправильный email';
        }
    
        if (!User::checkPassword($password)) {
            $errors[] = 'Пароль не должен быть короче 3-х симоволов';
        }
    
        if (User::checkEmailExist($email)) {
            $errors[] = 'Такой email уже используется';
        }
        
        if ($errors == false) {
            $results = User::register($name,$email,$password);
        }
        
        require_once (ROOT.'/views/user/register.php');
        return true;
    }
}