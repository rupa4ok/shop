<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 20:33
 * Класс Db
 * Компонент для работы с базой данных
 */

class Db
{
    /**
     * Устанавливает соединение с базой данных
     * @return \PDO <p>Объект класса PDO для работы с БД</p>
     */
    public static function getConnection()
    {
        // Получаем параметры подключения из файла
        $paramsPath = ROOT . '/config/dbconfig.php';
        $params = include($paramsPath);
        
        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // Задаем кодировку
        $db->exec("set names utf8");
        return $db;
    }
}