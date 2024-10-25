<!DOCTYPE html>
<?php include "connect.php" ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/logindecor.css">
  
    <script>
        function hide() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
  
    <title>ลงชื่อเข้าใช้</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="gold_bell.ico"> -->
</head>

<body>

</body>

<body>
    <br>
    <div class="form">
        <div class="center normal">
            <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        </div>

        <!-- <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="logo" width="170" height="50"> -->
        <br>
        <form action="login_check.php" method="POST" autocomplete="off">
            <label for="username">อีเมลผู้ใช้</label>
            <input type="text" id="email" name="email" required>
            <br>
            <label for="password">รหัสผ่าน </label>
            <input type="password" id="password" name="password" required maxlength="8">
            <br><br>
            <input id="checkbox" type="checkbox" name="checkbox" onclick="hide()">
            <label for="checkbox">แสดงรหัสผ่าน</label>
            <br><br>
            <a href="forgotpass.php">ลืมรหัสผ่าน?</a>
            <input type="submit" value="ลงชื่อเข้าใช้" style="float: right;">
            <br></br>

        </form>

    </div>
    <p></p>
</body>

</html>