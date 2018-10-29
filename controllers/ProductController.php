<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 20:05
 */

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

class ProductController {
    
    public function actionView($productId)
    {
        
        $categories = array();
        $categories = Category::getCategoryList();
        
        $product = Product::getProductListById($productId);
        
        require_once (ROOT.'/views/product/index.php');
        
        return true;
    }
}