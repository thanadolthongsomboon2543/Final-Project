<?php
session_start();
include ("connect.php");

if(empty($_SESSION["id_user"]))
{
    Header("Location: login.php");
}
?>
<?php
 $oldpass=$_POST["password"];
 $newpass=$_POST["new_password"];
 $conpass=$_POST["confirm_password"];
 $id= $_SESSION["id_em"] ;
 $stmt=$pdo->prepare("SELECT * FROM users WHERE id_em=? ");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    if($stmt->rowCount() == 1)
    {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $password=$row["passwd"];
      if(password_verify($oldpass,$password) && $newpass==$conpass){
        $hashpass=password_hash($newpass,PASSWORD_DEFAULT);
        $stmt=$pdo->prepare("UPDATE users SET passwd=? WHERE id_em=? ");
        $stmt->bindParam(1,$hashpass);
        $stmt->bindParam(2,$id); 
        $stmt->execute();

      }

    }
    else{
        echo "<script>";
        echo "alert(\" รหัสผ่านไม่ถูกต้อง \");";
        echo "window.history.back()";
        echo "</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/leaveformdecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <head>
    <body>
    <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="hide()">×</a>
<?php
if($_SESSION["prior_em"]=="HR" || $_SESSION["prior_em"]=="SV")
                {
echo "<a href=\"menu_hr.php\">หน้าหลัก</a>";
                }
  else if($_SESSION["prior_em"]=="employee")
  {
      echo "<a href=\"menu.php\">หน้าหลัก</a>";
  }
?>
<?php
if($_SESSION["prior_em"]=="HR" || $_SESSION["prior_em"]=="SV")
                {
                    echo "<a href=\"approve_leave.php\">อนุมัติการลา</a>";
                    echo "<a href=\"approve_ot.php\">อนุมัติ OT</a>";
                    echo "<a href=\"checkin_history.php\">ประวัติเข้าออก</a>";
                    echo"<a href=\"historyleave_hr.php\">ประวัติการลาทั้งหมด </a>";
                    echo"<a href=\"historyot_hr.php\">ประวัติ OT ทั้งหมด </a>";
                }
 if($_SESSION["prior_em"]=="HR")
 {
                    echo "<a href=\"HR-tax.php\">คำนวณภาษี</a>";
                    echo "<a href=\"HR-salary.php\">คำนวณเงินเดือน</a>";
                }
?>
<a href="profile.php">ประวัติส่วนตัว</a>
<a href="historyleave.php">ประวัติการลา</a>
<a href="historyot.php">ประวัติ OT</a>
<a href="calendar.php">ปฏิทิน</a>
<?php
if ($_SESSION["prior_em"]=="employee" || $_SESSION["prior_em"]=="HR")
  {
      echo  "<a href=\"leaveform.php\">แจ้งลา</a>";
      echo " <a href=\"otform.php\">แจ้งโอที</a>";
  }
  ?>
<a href="resetpass.php">เปลี่ยนรหัสผ่าน</a>
<a href="logout.php">ออกจากระบบ</a>
</div>
<br>
 <button class="openbtn" id="openbtn" onclick="show()">☰</button>
        <article>
       <h3>ทำการเปลี่ยนรหัสผ่านเรียบร้อย<h3>
    <br><br>
    
    <form action="resetpass.php" >
    <button class="button" >กลับไป</button>
</form>
<script>
   function show() {
      document.getElementById("mySidebar").style.width = "230px";
   }
   function hide() {
      document.getElementById("mySidebar").style.width = "0";
   }
</script>
    </body>
<html>