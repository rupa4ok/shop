<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 31.10.2018
 * Time: 21:04
 */

class User
{
    public static function register($name, $email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, password) '
            . 'VALUES (:name, :email, :password)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    
    //Проверка имя не меньше 3-х символов
    public static function checkName($name)
    {
        if (strlen($name) >=3) {
            return true;
    }
    return false;
    }
    
    //Проверка пароль не меньше 6-х символов
    public static function checkPassword($password)
    {
        if (strlen($password) >=6) {
            return true;
        }
        return false;
    }
    
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    public static function checkEmailExist($email) {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }
    
    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }
    
    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }
    
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        
        header("Location: /user/login");
    }
    
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE id = :id';
        
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
    public static function edit($id, $name, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = "UPDATE user
            SET name = :name, password = :password
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    
}