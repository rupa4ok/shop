<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 28.10.2018
 * Time: 22:35
 */

class Product
{
    
    const SHOW_BY_DEFAULT = 10;
    
    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productList = array();
        $result = $db->query("SELECT id,name,price,image,is_new,status FROM product WHERE status = 1
        ORDER BY id DESC LIMIT $count");
        
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;
    }
    
    public static function getProductListByCategory($categoryId = false)
    {
        $db = Db::getConnection();
        $products = array();
        $count = self::SHOW_BY_DEFAULT;
        $result = $db->query("SELECT id,name,price,image,is_new,status FROM product WHERE status = 1 AND category_id = $categoryId
        ORDER BY id DESC LIMIT $count");
    
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        
        return $productList;
    }
    
    public static function getProductListById($productId)
    {
        $id = intval($productId);
        
        if ($productId) {
            $db = Db::getConnection();
            
            $result = $db->query("SELECT * FROM product WHERE id = $productId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
           return $result->fetch();
        }
    }
    
}