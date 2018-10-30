<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 19:47
 */

class SiteController
{
    
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(6);
        
        require_once (ROOT.'/views/site/index.php');
        
        return true;
    }
    
}