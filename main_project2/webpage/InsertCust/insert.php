<?php include "connect.php" ?>
<?php
$sql = $pdo->prepare("INSERT INTO customer VALUES(?,?,?,?,?)");
$sql->bindParam(1, $_POST["Custid"]);
$sql->bindParam(2, $_POST["Password"]);
$sql->bindParam(3, $_POST["CustName"]);
$sql->bindParam(4, $_POST["Address"]);
$sql->bindParam(5, $_POST["Tel"]);
if ($sql->execute()) {
    echo "<script type='text/javascript'>
alert('สมัครสมาชิกสำเร็จ');
window.location.href = './Cust.php'
</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
</body>

</html>