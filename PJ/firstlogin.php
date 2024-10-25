<?php
session_start();
if($_SESSION["firstlog_em"] == 1)
{
    if($_SESSION["prior_em"]=="employee")
    {
         header("Location: menu.php");      
    }
   else if($_SESSION["prior_em"]=="HR" || $_SESSION["prior_em"]=="SV")
   {
       header("Location: menu_hr.php");
     }
 }
 
include ("connect.php"); ?>
<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/firstlogindecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>เปลี่ยนรหัสผ่านครั้งแรก</title>
    <script>
  function rhide()
{
    var y = document.getElementById("confirm_password");
    var z = document.getElementById("new_password");
    if (y.type === "password") {
        y.type = "text";
        z.type = "text";
    } else {
        y.type = "password";
        z.type = "password";
    }
}
      </script>
</head>
<body>
<p>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
            </p>
</body>
<body>
<div class="form">
    <h2> เปลี่ยนรหัสผ่านครั้งแรก</h2>
    <form action="firstlogin_check.php" method="POST">
  <label for="new_password">รหัสผ่านใหม่  </label>
  <input type="password" id="new_password" name="new_password"  maxlength="8">
<br><br>
  <label for="confirm_password">ยืนยันรหัสผ่าน   </label>
  <input type="password" id="confirm_password" name="confirm_password"  maxlength="8">
<br><br>
<input id="checkbox" type="checkbox" name="checkbox" onclick="rhide()">
<label for="checkbox">แสดงรหัสผ่าน</label>
<input type="submit" value="Submit" class="right">
</form>

</div>

</body>
</html>
    