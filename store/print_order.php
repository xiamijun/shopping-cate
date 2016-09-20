<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/9/19
 * Time: 18:42
 */
if(empty($_COOKIE['book_no_list'])){
    echo "<script>alert('购物车为空');location.href='main.php'</script>";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>打印订单</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-striped">
    <thead>
    <tr>
        <th>书号</th>
        <th>书名</th>
        <th>定价</th>
        <th>数量</th>
        <th>小计</th>
        <th>修改数量</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //如果购物车为空，则显示没有商品
    if(empty($_COOKIE['book_no_list'])){
        echo "<h1 align='center'>购物车中没有商品</h1>";
    }else{
        //取得购物车信息
        $book_no_array=explode(',',$_COOKIE['book_no_list']);
        $book_name_array=explode(',',$_COOKIE['book_name_list']);
        $price_array=explode(',',$_COOKIE['price_list']);
        $quantity_array=explode(',',$_COOKIE['quantity_list']);

        //显示购物车内容
        for($i=0;$i<count($book_no_array);$i++){
            //计算小计
            $sub_total=$price_array[$i]*$quantity_array[$i];

            //计算总计
            @$total+=$sub_total;

            //显示各字段
            ?>
            <form action="change.php?book_no=<?php echo $book_no_array[$i]; ?>" method="post">
                <tr>
                    <td><?php echo $book_no_array[$i]; ?></td>
                    <td><?php echo $book_name_array[$i]; ?></td>
                    <td><?php echo $price_array[$i]; ?></td>
                    <td><?php echo $quantity_array[$i]; ?></td>
                    <td><input type="text" name="quantity" value="<?php echo $quantity_array[$i]; ?>" class="form-control"></td>
                    <td><input type="submit" value="修改" class="btn btn-primary"></td>
                </tr>
            </form>

            <?php
        }
        ?>
        <tr>
            <td align="center"><p>总金额=<?php echo $total; ?></p></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>
