<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/forgotpassdecor.css">
    <title>ลืมรหัสผ่าน</title>
</head>
<body>
<p>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        
            </p>
</body>
<body>
    <br>
    <div>
        <form action="forgotpass_check.php" method="POST" autocomplete="off">
            <div class="center normal">
                <h3>ลืมรหัสผ่าน</h3>
            </div>
            <br>
            <p>หากคุณลืมรหัสผ่านให้ส่งอีเมลมาเพื่อทำการส่งลิงก์เปลี่ยนรหัสผ่านเข้าอีเมลของคุณ</p>
           
            <label for="email">อีเมล</label>
            <input type="text" id="email" name="email" required placeholder="กรอกอีเมลล์">
            <input type="submit" value="Submit">
            <p>
            <h2><a href="login.php">จำรหัสผ่านได้?</a></h2>
            </p>

        </form>
    </div>
    </br>
</body>

</html>