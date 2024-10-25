<?php

include ("connect.php"); 

?>
<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/resetpassdecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>เปลี่ยนรหัสผ่านใหม่</title>
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
    <h2> เปลี่ยนรหัสผ่านใหม่<h2>
    <?php
                if($_GET["email"] && $_GET["token"]) {
                    $email = $_GET["email"];
                    $token = $_GET["token"];
                    $current_date = date("Y-m-d H:i:s");
                    $stmt=$pdo->prepare("SELECT * FROM users WHERE email_em=? AND token_em=?");
                    $stmt->bindParam(1,$email);
                    $stmt->bindParam(2,$token);
                    $stmt->execute();
                    if( $stmt->rowCount() == 1){
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $expirated=$row["expiration"];

                        $date1 = new DateTime($expirated);
                        $date2 = new DateTime($current_date);

                        if( $date1 > $date2) { ?>
     
      <form action="resetpass_forgotcheck.php" method="POST">
       <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
       <input type="hidden" id="token" name="token" value="<?php echo $token ?>">
       <label for="new_password">รหัสผ่านใหม่</label>
       <input type="password" id="new_password" name="new_password"  maxlength="8">
       <br><br>
       <label for="confirm_password">ยืนยันรหัสผ่าน</label>
       <input type="password" id="confirm_password" name="confirm_password"  maxlength="8">
       <br><br>
      <input id="checkbox" type="checkbox" name="checkbox" onclick="rhide()">
      <label for="checkbox">แสดงรหัสผ่าน</label>
       <input type="submit" value="Submit" class="right">
       </form>

<?php } 
                    } else {
                        echo "<h3>ลิ้งค์นี้หมดอายุแล้ว</h3>";
                    }
                }
                else{
                    echo "<h3>ลิ้งค์นี้หมดอายุแล้ว</h3>";
                }
            ?>



</div>


</body>
</html>
    