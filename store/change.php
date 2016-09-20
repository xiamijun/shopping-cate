<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/9/19
 * Time: 18:30
 */
$book_no=$_GET['book_no'];
$quantity=$_POST['quantity'];

//取得购物车信息
$book_no_array=explode(',',$_COOKIE['book_no_list']);
$book_name_array=explode(',',$_COOKIE['book_name_list']);
$price_array=explode(',',$_COOKIE['price_list']);
$quantity_array=explode(',',$_COOKIE['quantity_list']);

$key=array_search($book_no,$book_no_array);

//如果数量等于0，则删除
if($quantity==0||empty($quantity)){
    unset($book_no_array[$key]);
    unset($book_name_array[$key]);
    unset($price_array[$key]);
    unset($quantity_array[$key]);
}else{
    $quantity_array[$key]=$quantity;
}

//存储购物车信息
setcookie('book_no_list',implode(',',$book_no_array));
setcookie('book_name_list',implode(',',$book_name_array));
setcookie('price_list',implode(',',$price_array));
setcookie('quantity_list',implode(',',$quantity_array));

header('location:shopping_car.php');