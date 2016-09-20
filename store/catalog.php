<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table class="table table-striped">
    <thead>
        <tr>
            <th>书号</th>
            <th>书名</th>
            <th>定价</th>
            <th>输入数量</th>
            <th>订购</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'dbtools.inc.php';
        $sql="select * from product_list";
        $result=mysqli_query($conn,$sql);
        $total_records=mysqli_num_rows($result);
        for($i=0;$i<$total_records;$i++){
            $row=mysqli_fetch_array($result);
            ?>
            <form action="add_to_car.php?book_no=<?php echo $row['book_no']; ?>&book_name=<?php echo urlencode($row['book_name']); ?>&price=<?php echo $row['price']; ?>" method="post">
                <tr>
                    <td><?php echo $row['book_no']; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><input type="text" name="quantity" value="1" class="form-control"></td>
                    <td><input type="submit" value="放入购物车" class="btn btn-primary"></td>
                </tr>
            </form>

            <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>