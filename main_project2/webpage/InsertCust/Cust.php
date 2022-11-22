<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./Registerstyle.css">
</head>

<body>
    <div class="Hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form class="input-group" id="login" action="../InsertCust/login_db.php" method="post">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>
                <input type="text" class="input-field" placeholder="User Id" value="<?php if(isset($_COOKIE["Custid"])) { echo $_COOKIE["Custid"]; } ?>" id="Custid" name="Custid" aria-describedby="Custid" required>
                <input type="password" class="input-field" placeholder="Password" value="<?php if(isset($_COOKIE["Password"])) { echo $_COOKIE["Password"]; } ?>" id="Password" name="Password" aria-describedby="Password" required>

                <input type="checkbox" class="check-box" name="remember"><span>Remember Me</span>
                <button type="submit" name="login" class="submit-btn">Login</button>
            </form>

            
            <form action="insert.php" method="post" class="input-group" id="register">
                <input type="text" name="Custid" class="input-field" placeholder="UserId"  required><br>
                <input type="password" name="Password" class="input-field" placeholder="Password"  pattern=".{6,}"required><br>
                <input type="text" name="CustName" class="input-field" placeholder="name" required><br>
                <input type="text" name="Address" class="input-field" placeholder="Address" required><br>
                <input type="text" name="Tel" class="input-field" placeholder="Tel." required><br>
                <input type="checkbox" class="check-box" required><span>I agree to the terms & conditions</span>
                <input type="submit" value="submit" class="submit-btn">
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>

</html>