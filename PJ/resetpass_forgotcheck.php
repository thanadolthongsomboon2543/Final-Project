<?php 
include ("connect.php"); 

$email=$_POST["email"];
$newpass=$_POST["new_password"];
$conpass=$_POST["confirm_password"];

if($newpass==$conpass)
{
    $hashpass= password_hash($newpass,PASSWORD_DEFAULT);
    
       $null1=null;
       $null2=null;
    $stmt=$pdo->prepare("UPDATE users SET passwd=?, token_em = ?, expiration = ? WHERE email_em=? ");
    $stmt->bindParam(1,$hashpass);
    $stmt->bindParam(2,$null1);
    $stmt->bindParam(3,$null2);
    $stmt->bindParam(4,$email);
    $stmt->execute();

 
    Header("Location:https://www.google.com/");



}
else{
    echo "<script>";
    echo "alert(\" รหัสผ่านไม่ตรงกัน กรุณาลองใหม่ \");";
    echo "window.history.back()";
    echo "</script>";
}
?>