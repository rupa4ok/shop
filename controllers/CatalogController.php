<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 23:52
 */

class CatalogController
{
    
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(6);
        
        require_once (ROOT.'/views/catalog/index.php');
        
        return true;
    }
    
    public function actionCategory($categoryId,$page = 1)
    {
        
        $categories = array();
        $categories = Category::getCategoryList();
        
        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId,$page);
        
        $total = Product::getTotalProductInCategory($categoryId);
        
        //Создаем постраничную навигацию
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
    
        require_once (ROOT.'/views/catalog/category.php');
    
        return true;
    }
    
}