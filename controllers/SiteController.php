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
        require_once (ROOT.'/views/site/index.php');
        
        return true;
    }
    
}