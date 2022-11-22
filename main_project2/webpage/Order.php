<?php include "connect.php" ?>
<?php
session_start();
if(isset($_POST['buy'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $_SESSION['error'] = "กรุณากรอกอีเมล";
        header('location:login_form.php');
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "รูปเเบบอีเมลไม่ถูกต้่อง";
        header('location:login_form.php');
    }else if(empty($password)){
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
        header('location:login_form.php');
    }
    
    else{
        $sql = $pdo->prepare("INSERT INTO orders VALUES(?,?,?,?,?)");
        $sql ->bindParam(1,$_POST["orderid"]);
        $sql ->bindParam(2,$_POST["orderdate"]);
        $sql ->bindParam(3,$_POST["Shipping"]);
        $sql ->bindParam(4,$_POST["status"]);
        $sql ->bindParam(5,$_POST["Totalprice"]);
        if($sql->execute()){
        header("location: Search.php?orderid=".$_POST["orderid"]);
    echo "<script type='text/javascript'>
    alert='ยืนยัน'
    window.location.href = './Cust.php'
    </script>";
        }
            
        
}
}
    ?>