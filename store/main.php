<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/9/18
 * Time: 18:47
 */
@setcookie('name',$_POST['name']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once 'show_link.html';
require_once 'catalog.php';
?>
</body>
</html>
