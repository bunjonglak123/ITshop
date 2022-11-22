<?php include "connect.php" ?>
<?php session_start(); ?>

<html>
<style>
    div{
        position : center;
    }
    .hh{
        padding : 100px;
        margin : 100px;
    }
    .ff{
        background-color : lightblue;
        
    }
    .ee{
        text-align : center;
        margin-top : 250px;
    }
</style>
<head>
    <meta charset="utf-8">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CDN -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<?php
// 1. กำหนดคำสั่ง SQL ให้ดึงสินค้าตามรหัสสินค้า
$stmt = $pdo->prepare("SELECT * FROM product WHERE Productid = ?");
$stmt->bindParam(1, $_GET["Productid"]);  // 2. นำค่า pid ที่ส่งมากับ URL กำหนดเป็นเงื่อนไข        
$stmt->execute();     // 3. เริ่มค้นหา
$row = $stmt->fetch();    // 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>


<div class="ff" style="display:flex">
<a href="cart.php?action="> <input type= "button" class="btn btn-warning" value = "สินค้าในตะกร้า <?= sizeof($_SESSION['cart']) ?>" ></input></a>
    <div class="hh">
        <img src='img/<?= $row["Productid"] ?>.png' width='300'>
    </div>
    <div class="ee"style="padding: 15px">
        <h2><?= $row["ProductName"] ?></h2>

        ราคาขาย <?= $row["Price"] ?> บาท<br>
        <form method="post" action="cart.php?action=add&Productid=<?= $row["Productid"] ?>&ProductName=<?= $row["ProductName"] ?>&Price=<?= $row["Price"] ?>">
            <input type="number" name="qty" value="1" min="1" max="9">
            <input type="submit" value="ซื้อ" class="btn btn-warning"> 
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>