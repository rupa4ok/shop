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
    
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;
        $results = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }
    
    public function actionLogout()
    {
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }
    
}