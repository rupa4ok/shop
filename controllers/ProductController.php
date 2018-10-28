<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 20:05
 */

class ProductController {
    
    public function actionView($id)
    {
        require_once (ROOT.'/views/product/index.php');
        
        return true;
    }
}