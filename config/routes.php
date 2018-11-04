<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 19:40
 */

return array(
    'product/([0-9]+)' => 'product/view/$1', //Обработка продуктов
    'catalog' => 'catalog/index', //Страница каталога
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //Страница пагинации
    'category/([0-9]+)' => 'catalog/category/$1', //Страница категории
    'user/register' => 'user/register', //Страница регистрации
    'user/login' => 'user/login', //Страница авторизации
    'user/logout' => 'user/logout', //Страница выхода
    'cabinet/edit' => 'cabinet/edit', //Страница редактирования персональной информации
    'cabinet' => 'cabinet/index',//Страница личного кабинета
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', //Главная страница
);