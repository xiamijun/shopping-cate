<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/9/19
 * Time: 16:01
 */
$book_no=$_GET['book_no'];
$book_name=$_GET['book_name'];
$price=$_GET['price'];
$quantity=$_POST['quantity'];

if(empty($quantity)){
    $quantity=1;
}

//若购物车为空，则直接加入产品数据
if(empty($_COOKIE['book_no_list'])){
    setcookie('book_no_list',$book_no);
    setcookie('book_name_list',$book_name);
    setcookie('price_list',$price);
    setcookie('quantity_list',$quantity);
}else{
    //取得购物车信息
    $book_no_array=explode(',',$_COOKIE['book_no_list']);
    $book_name_array=explode(',',$_COOKIE['book_name_list']);
    $price_array=explode(',',$_COOKIE['price_list']);
    $quantity_array=explode(',',$_COOKIE['quantity_list']);

    //判断选择的物品是否在购物车中
    if(in_array($book_no,$book_no_array)){
        //如果已在购物车中，修改数量
        $key=array_search($book_no,$book_no_array);
        $quantity_array[$key]+=$quantity;
    }else{
        //如果没有在购物车中，则将物品数据加入购物车
        $book_no_array[]=$book_no;
        $book_name_array[]=$book_name;
        $price_array[]=$price;
        $quantity_array[]=$quantity;
    }
    
    //存储购物车信息
    setcookie('book_no_list',implode(',',$book_no_array));
    setcookie('book_name_list',implode(',',$book_name_array));
    setcookie('price_list',implode(',',$price_array));
    setcookie('quantity_list',implode(',',$quantity_array));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加入购物车</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<h1 align="center">加入购物车成功</h1>
<p align="center"><a href="main.php">继续购物</a></p>
</body>
</html>
