<?php include "connect.php" ?>
<?php

session_start();
if(empty($_SESSION['Custid'])){
	echo "<script type='text/javascript'>
	alert('เข้าสู่ระบบก่อน');
	window.location.href = './InsertCust/Cust.php'
	</script>";
	
}

// เพิ่มสินค้า
if(empty($_GET)){}
if ($_GET["action"] == "add") {

	$Productid = $_GET['Productid'];

	$cart_item = array(
		'Productid' => $Productid,
		'ProductName' => $_GET['ProductName'],
		'Price' => $_GET['Price'],
		'qty' => $_POST['qty']
	);

	// ถ้ายังไม่มีสินค้าใดๆในรถเข็น
	if (empty($_SESSION['cart']))
		$_SESSION['cart'] = array();

	// ถ้ามีสินค้านั้นอยู่แล้วให้บวกเพิ่ม
	if (array_key_exists($Productid, $_SESSION['cart']))
		$_SESSION['cart'][$Productid]['qty'] += $_POST['qty'];

	// หากยังไม่เคยเลือกสินค้นนั้นจะ
	else
		$_SESSION['cart'][$Productid] = $cart_item;

	// ปรับปรุงจำนวนสินค้า
} else if ($_GET["action"] == "update") {
	$Productid = $_GET["Productid"];
	$qty = $_GET["qty"];
	$_SESSION['cart'][$Productid]['qty'] = $qty;

	// ลบสินค้า
} else if ($_GET["action"] == "delete") {

	$Productid = $_GET['Productid'];
	unset($_SESSION['cart'][$Productid]);
}

?>

<html>

	

<head>
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CDN -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script>
		// ใช้สำหรับปรับปรุงจำนวนสินค้า
		function update(Productid) {
			var qty = document.getElementById(Productid).value;
			// ส่งรหัสสินค้า และจำนวนไปปรับปรุงใน session
			document.location = "cart.php?action=update&Productid=" + Productid + "&qty=" + qty;
		}
	</script>
	<style>
		.Hero{
		height: 130%;
		width: 100%;
		background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(background.jpg);
		background-size: cover;
		background-position: center;
		position: absolute;
		}
		.form-box{
		width: 500px;
		max-height: 700px;
		overflow: auto;
		position: relative;
		margin: 6% auto;
		background: #fff;
		padding: 5px;
		}
		h1{
			margin-top: 50px;
			text-align: center;
			color: white;
			font-size: 70px;
		}
	</style>
</head>

<body>
<center>
<div class="hero">
	<h1>ตะกร้าสินค้า</h1>
	<h1>สวัสดี <?=$_SESSION["CustName"]?></h1>
	<div class="form-box">
		<form action="Order.php" method="post">
			<?php
			$sum = 0;
			foreach ($_SESSION["cart"] as $item) {
				$sum += $item["Price"] * $item["qty"];
			?>
					<img src='img/<?= $item["Productid"] ?>.png' width='100'></a><br>
					<?= $item["ProductName"] ?><br>
					ราคา <?= $item["Price"] ?> บาท/ชิ้น<br>
					
						<input type="number" id="<?= $item["Productid"] ?>" value="<?= $item["qty"] ?>" min="1" max="9">
						<input type="button" value = "เเก้ไข" class="btn btn-warning"      a href="#" onclick="update(<?= $item["Productid"] ?>)"></input>
						<a href="?action=delete&Productid=<?= $item["Productid"] ?>"><input type="button" value="ลบ" class="btn btn-danger mx-2"></a></br>
					
				
			<?php } ?>
			<tr><br>
				<td colspan="3" align="right">ราคารวมทั้งสิ้น <?= $sum ?> บาท</td>
			</tr>
		</table>
		<input type= "button" value = "สั่งซื้อสินค้า" name="buy" class="btn btn-warning"></input>
	</form>
	<a href="Market.php"> <input type= "button" value = "เลือกสินค้าต่อ" class="btn btn-warning"></input></a>
</div>
</div>

	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>