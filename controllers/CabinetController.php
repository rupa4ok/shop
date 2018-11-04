<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 04.11.2018
 * Time: 10:53
 */

class CabinetController
{
    public function actionIndex()
    {
        require_once (ROOT.'/views/cabinet/index.php');
        
        return true;
    }
}