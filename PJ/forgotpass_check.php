<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Bangkok');

include ("connect.php");









$email=$_POST["email"];
$stmt=$pdo->prepare("SELECT * FROM users WHERE email_em=?");
$stmt->bindParam(1,$email);
$stmt->execute();
if( $stmt->rowCount() == 1)
{
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 $firstname= $row["firstname_em"];
 $lastname=$row["lastname_em"];
    
$token = md5($email); // You can use a different method to generate a token
 // Token expires in 10 minute
$expiry_time = mktime(date("H"), date("i", time()+600), date("s"), date("m"), date("d"), date("Y"));
$expiry_date = date("Y-m-d H:i:s", $expiry_time);
$stmt=$pdo->prepare("UPDATE users SET email_em=?,token_em=?, expiration=? WHERE email_em=?");
$stmt->bindParam(1,$email);
$stmt->bindParam(2,$token);
$stmt->bindParam(3,$expiry_date);
$stmt->bindParam(4,$email);
$stmt->execute();

$mail = new PHPMailer(true);
$mail->CharSet ='UTF-8';
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;

$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number:
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'thanadol.tho.nsc@gmail.com'; //อีเมลที่ใช้ตอนตั้งรหัสผ่านสำหรับแอป
//Password to use for SMTP authentication
$mail->Password = 'krrn zkuq iwmo fzyu';//รหัสผ่านได้จาก ไปที่จัดการความเป็นส่วนตัว -> ความปลอดภัย -> การยืนยันแบบ 2 ขั้นตอน -> รหัสผ่านสำหรับแอป
$mail->setFrom('thanadol.tho.nsc@gmail.com', 'ระบบจัดการวันเวลาเข้างาน');//อีเมลที่ใช้ตอนตั้งรหัสผ่านสำหรับแอป
//Set who the message is to be sent to
$mail->addAddress($email, $firstname.' '. $lastname);
$mail->isHTML(true);   
//Set the subject line
$resetLink = "<a href=https://localhost/PJ/resetpass_forgot.php?email=$email&token=$token>คลิ๊กตรงนี้</a>";
$mail->Subject ='เปลี่ยนรหัสผ่านของคุณ';
//convert HTML into a basic plain-text alternative body
$mail->Body ="ลิ้งค์สำหรับเปลี่ยนรหัสผ่านของคุณคือ $resetLink<br> 
                ลิ้งค์นี้มีอายุเพียง 10 นาทีเท่านั้น กรุณาเปลี่ยนให้ทันเวลา
<br>
            ไม่ต้องตอบกลับข้อความนี้เนื่องจากอีเมลนี้เป็นอีเมลอัตโนมัติจากระบบ  ";

//send the message, check for errors
if (!$mail->send()) {
    echo '<p>Mailer Error: ' . $mail->ErrorInfo . '</p>';
} 

}
else{
    echo "<script>";
    echo "alert(\"กรอกอีเมลไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/forgotpassdecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>ส่งอีเมลเรียบร้อยแล้ว</title>
</head>
<body>
<div>
<p>ทำการส่งอีเมลเรียบร้อยแล้ว โปรดตรวจสอบอีเมลของท่าน</p>
            <br>
            <form action="login.php" >
         <button class="button" >กลับไป</button>
        </form>
    </div>
</body>
</html>
