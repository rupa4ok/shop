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
        
        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();
        
        if ($result->fetchColumn()) {
            return true;
        }
        return false;
        
    }
}