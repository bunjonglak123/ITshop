<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
</head>
<style>
    th {
    text-align: center;
    }
    td {
    text-align: center;
    }
</style>    
<body>
<?php
    $stmt = $pdo->prepare("SELECT orderid,unitstock.Productid,quantity,quantity*product.Price AS Totalprice FROM unitstock JOIN product ON unitstock.Productid = product.Productid;");
    $stmt->execute();
?>
<h1>ตารางเเสดงราคาทั้งหมด</h1>
<table border='1' width='70%'>    
<tr>
    <th>ไอดีรอบการสั่งซื้อ</th>
    <th>ไอดีสินค้า</th>
    <th>จำนวนสินค้า</th>
    <th>ราคาทั้งหมด</th>
    <?php while($row = $stmt->fetch()){?>
    <tr>
    <td><?=$row ["orderid"]?></td>
    <td><?=$row ["Productid"]?></td>
    <td><?=$row ["quantity"]?></td>
    <td><?=$row ["Totalprice"]?></td>
    
</tr>
<?php } ?>
</table>

</br>

<?php
    $stmt = $pdo->prepare("SELECT unitstock.Productid,product.ProductName,SUM(quantity) FROM unitstock JOIN product ON unitstock.Productid = product.Productid GROUP BY product.Category;");
    $stmt->execute();
?>

<h1>ตารางเเสดงจำนวนยอดการสั่งซื้อสินค้าเเต่ละประเภท</h1>
<table border='1' width='70%'>
<tr>
    <th>ไอดีสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>จำนวนการสั่งซื้อทั้งหมดของสินค้าชนิดนี้</th>
    <?php while($row = $stmt->fetch()){?>
    <tr>
    <td><?=$row ["Productid"]?></td>
    <td><?=$row ["ProductName"]?></td>
    <td><?=$row ["SUM(quantity)"]?></td>
</tr>
<?php } ?>
</tr>
</table>

</br>

<?php
    $stmt = $pdo->prepare("SELECT CustName,Address,Tel,unitstock.orderid,orders.orderdate,orders.Shipping,product.ProductName,unitstock.quantity,quantity*product.Price AS Totalprice FROM customer
    JOIN orders ON customer.Custid = orders.Custid
    JOIN unitstock ON orders.orderid = unitstock.orderid
    JOIN product ON unitstock.Productid = product.Productid
    WHERE STATUS IN('pay');");
    $stmt->execute();
?>

<h1>ตารางแสดง Order ของลูกค้าที่ชำระสำเร็จแล้ว</h1>
<table border='1' width='70%'>
<tr>
    <th>ไอดีรอบการสั่งซื้อ</th>
    <th>วันที่สั่งสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>จำนวนสินค้า</th>
    <th>ราคาทั้งหมด</th>
    <th>วันที่จัดส่งสินค้า</th>
    <?php while($row = $stmt->fetch()){?>
    <tr>
    <td><?=$row ["orderid"]?></td>
    <td><?=$row ["orderdate"]?></td>
    <td><?=$row ["ProductName"]?></td>
    <td><?=$row ["quantity"]?></td>
    <td><?=$row ["Totalprice"]?></td>
    <td><?=$row ["Shipping"]?></td>
    
</tr>
<?php } ?>
</tr>
</table>

<?php
    $stmt = $pdo->prepare("SELECT Category,ProductName,SUM(quantity) FROM product JOIN unitstock ON product.Productid = unitstock.Productid WHERE Category ='Laptop'");
    $stmt->execute();
?>
<h1>ตารางเเสดงจำนวนเเลปท็อปที่ขายได้</h1>
<table border='1' width='70%'>    
<tr>
    <th>ประเภทสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>จำนวนที่ขายได้ทั้งหมด</th>
    <?php while($row = $stmt->fetch()){?>
    <tr>
    <td><?=$row ["Category"]?></td>
    <td><?=$row ["ProductName"]?></td>
    <td><?=$row ["SUM(quantity)"]?></td>
    
</tr>
<?php } ?>
</table>

</br>

<?php
    $stmt = $pdo->prepare("SELECT Category,ProductName,SUM(quantity) FROM product JOIN unitstock ON product.Productid = unitstock.Productid GROUP BY unitstock.Productid ;");
    $stmt->execute();
?>
<h1>ตารางเเสดงแสดงจำนวนที่ขายในแต่ละCategory</h1>
<table border='1' width='70%'>    
<tr>
    <th>ประเภทสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>จำนวนที่ขายได้ทั้งหมด</th>
    <?php while($row = $stmt->fetch()){?>
    <tr>
    <td><?=$row ["Category"]?></td>
    <td><?=$row ["ProductName"]?></td>
    <td><?=$row ["SUM(quantity)"]?></td>
    
</tr>
<?php } ?>
</table>

</br>

<?php
    $stmt = $pdo->prepare("SELECT  ProductName,SUM(quantity) FROM product JOIN unitstock ON product.Productid = unitstock.Productid GROUP BY unitstock.Productid ORDER BY SUM(quantity)DESC;");
    $stmt->execute();
?>
<h1>สินค้าขายดี</h1>
<table border='1' width='70%'>    
<tr>
    <th>ชื่อสินค้า</th>
    <th>จำนวนที่ขายได้ทั้งหมด</th>
    <?php while($row = $stmt->fetch()){?>
    <tr>
    <td><?=$row ["ProductName"]?></td>
    <td><?=$row ["SUM(quantity)"]?></td>
    
</tr>
<?php } ?>
</table>

</br>









</body>
</html>

