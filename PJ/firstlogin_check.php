<?php 
session_start();
include ("connect.php"); 

$id=$_SESSION["id_em"];
$newpass=$_POST["new_password"];
$conpass=$_POST["confirm_password"];

if($newpass==$conpass)
{
    $hashpass= password_hash($newpass,PASSWORD_DEFAULT);
    
    $firsttoken=1;
    $stmt=$pdo->prepare("UPDATE users SET passwd=?, firstlog_em=? WHERE id_em=? ");
    $stmt->bindParam(1,$hashpass);
    $stmt->bindParam(2,$firsttoken);
    $stmt->bindParam(3,$id); 
    $stmt->execute();

    session_destroy();
    Header("Location: login.php");



}
else{
    echo "<script>";
    echo "alert(\" รหัสผ่านไม่ตรงกัน กรุณาลองใหม่ \");";
    echo "window.history.back()";
    echo "</script>";
}


?>
