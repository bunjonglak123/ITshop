<?php
include "connect.php"; ?>

<?php
session_start();
$stmt = $pdo->prepare("SELECT * FROM customer WHERE Custid = ? AND Password = ?");
$stmt->bindParam(1, $_POST["Custid"]);
$stmt->bindParam(2, $_POST["Password"]);
$stmt->execute();
$row = $stmt->fetch();

// หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
if (!empty($row)) {
  // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
  $_SESSION["CustName"] = $row["CustName"];
  $_SESSION["Custid"] = $row["Custid"];

  // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
  if(!empty($_POST["remember"])) {
    setcookie ("Custid",$_POST["Custid"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("Password",$_POST["Password"],time()+ (10 * 365 * 24 * 60 * 60));
}else {
  if(isset($_COOKIE["Password"])) {
      setcookie ("Password","");
  }
}
  echo "<script type='text/javascript'>
alert('เข้าสู่ระบบ');
window.location.href = '../index.html'
</script>";


  // กรณี username และ password ไม่ตรงกัน
} 
else {

  echo "<script type='text/javascript'>
alert('username หรือ password ไม่ถูกต้อง');
window.location.href = './Cust.php'
</script>";
}

