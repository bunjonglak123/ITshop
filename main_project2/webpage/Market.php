<?php include "connect.php" ?>
<?php session_start(); ?>
<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<meta charset="utf-8">

	<!-- Description, Keywords and Author -->

	<meta name="description" content="">

	<meta name="author" content="">



	<title>:: ITshop ::</title>

	<link rel="shortcut icon" href="images/logoo.png" type="image/x-icon">



	<!-- style -->

	<link href="css/style.css" rel="stylesheet" type="text/css">

	<!-- style -->

	<!-- bootstrap -->

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- responsive -->

	<link href="css/responsive.css" rel="stylesheet" type="text/css">

	<!-- font-awesome -->

	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- font-awesome -->

	<link href="css/effects/set2.css" rel="stylesheet" type="text/css">

	<link href="css/effects/normalize.css" rel="stylesheet" type="text/css">

	<link href="css/effects/component.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link href="css/csslogin.css" rel="stylesheet" type="text/css">

	<style>
		#center {
			float: left;
		}
	</style>
</head>


<body>

	<header role="header">

		<div class="container">

			<h1>
				<a href="Index.html"><img src="images/logoo.png" /></a>
			</h1>

			<a id="center" href="Market.php"><img src="images/buttonshop.png" /></a>

			<!-- nav -->



			<nav role="header-nav" class="navy">


				<!-- logo -->
				<ul>
					<li class="nav-active"><a href="Index.html">Main</a></li>

					<li><a href="Market.php"></a></li>

					<li><a href="./InsertCust/Cust.php">Login/Register</a></li>

					<li><a href="cart.php?action=">Cart</a></li>

					<li><a href="./InsertCust/logout.php">Logout</a></li>
				</ul>
				<center>
					<a href="cart.php?action="><img src="./images/cart.png" /> </a>
				</center>

			</nav>

			<!-- nav -->

		</div>

	</header>



	<!--Market-->
	<center>
		<div>
			<?php
			$stmt = $pdo->prepare("SELECT * FROM product");
			$stmt->execute();
			while ($row = $stmt->fetch()) {
			?>
				<div>
					<hr>
					<a href="detail.php?Productid=<?= $row["Productid"] ?>">
						<?= $row["Category"] ?><br>
						<img src='img/<?= $row["Productid"] ?>.png' width='300'></a><br>

					<?= $row["ProductName"] ?><br><?= $row["Price"] ?> บาท<br>
					<form method="post" action="cart.php?action=add&Productid=<?= $row["Productid"] ?>&ProductName=<?= $row["ProductName"] ?>&Price=<?= $row["Price"] ?>">
						<input type="number" name="qty" value="1" min="1" max="9">
						<input type="submit" value="ซื้อ">
					</form>
					<hr>
				</div>
			<?php } ?>
		</div>
	</center>

	<!-- footer -->

	<footer role="footer">

		<!-- logo -->

		<h1>

			<a href="Index.html" title="avana LLC"><img src="images/logoo.png" /></a>

		</h1>


		<!-- logo -->

		<!-- nav -->

		<nav role="footer-nav">

			<ul>

				<li><a href="Index.html">Main</a></li>

				<li><a href="Market.php">Shop</a></li>

			</ul>

		</nav>

		<!-- nav -->

		<p class="copy-right">&copy; 2022 ITshop All rights Resved</p>

	</footer>





	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script src="../webpage/js/jquery.min.js" type="text/javascript"></script>

	<!-- custom -->

	<script src="../webpage/js/nav.js" type="text/javascript"></script>

	<script src="../webpage/js/custom.js" type="text/javascript"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->

	<script src="../webpage/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="../webpage/js/effects/masonry.pkgd.min.js" type="text/javascript"></script>

	<script src="../webpage/js/effects/imagesloaded.js" type="text/javascript"></script>

	<script src="../webpage/js/effects/classie.js" type="text/javascript"></script>

	<script src="../webpage/js/effects/AnimOnScroll.js" type="text/javascript"></script>

	<script src="../webpage/js/effects/modernizr.custom.js"></script>

	<!-- jquery.countdown -->

	<script src="../webpage/js/html5shiv.js" type="text/javascript"></script>

</body>

</html>