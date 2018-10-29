<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 23:52
 */


include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

class CatalogController
{
    
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(10);
        
        require_once (ROOT.'/views/catalog/index.php');
        
        return true;
    }
    
    public function actionCategory($categoryId)
    {
        $categories = array();
        $categories = Category::getCategoryList();
        
        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId);
    
        require_once (ROOT.'/views/catalog/category.php');
    
        return true;
    }
    
}