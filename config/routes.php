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
    'cabinet' => 'cabinet/index',//Страница личного кабинета
    '' => 'site/index', //Главная страница
);