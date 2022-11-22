<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "root", "", "itshop");
if ($conn) {
    mysqli_select_db($conn, "itshop");
    mysqli_query($conn, "SET NAMES utf8");
} else {
    echo mysql_errno();
}
?>

<?php
if ($keyword) {
    $sql1 = "SELECT * FROM product WHERE ProductName LIKE '%$keyword%'";
    $objQuery1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_array($objQuery1)) {
?>
        <?= $row["Category"] ?>
        <li><?= $row["ProductName"] ?></li>
        <a href ="Market.php" >สินค้า</a>
        <hr>
<?php
    }
}
?>
</ul>