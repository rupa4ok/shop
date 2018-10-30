<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 30.10.2018
 * Time: 6:49
 */

class UserControoler
{
    
    public function actionUser()
    {
        require_once (ROOT.'/views/user/register.php');
        
        return true;
    }
}