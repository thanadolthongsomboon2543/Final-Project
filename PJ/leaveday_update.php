<?php session_start();
    //
    if(empty($_SESSION["id_user"]))
    {
        Header("Location: login.php");
    }
   if(  $_SESSION["prior_em"] == "employee")
    {
        {
        Header("Location: menu.php");
        }
    }
    include("connect.php");
?>
<!DOCTYPE html>
<?php include "connect.php"?>
<?php
$firstname=$_POST["fname"];
$lastname=$_POST["sname"];
$emid=$_POST["emid"];
$department=$_POST["department"];
$sick=$_POST["sickness"];
$vacation=$_POST["vacation"];
$business=$_POST["business"];
$maternity=$_POST["maternity"];
$ordination=$_POST["ordination"];
$other=$_POST["other"];

$stmt=$pdo->prepare("UPDATE leave_remain SET vacation_leave=?, sick_leave=?,business_leave=?,ordination_leave=?,
 maternity_leave=? , other_leave=? WHERE id_em=? ");
 $stmt->bindParam(1,$vacation);
 $stmt->bindParam(2,$sick);
 $stmt->bindParam(3,$business);
 $stmt->bindParam(4,$ordination);
 $stmt->bindParam(5,$maternity);
 $stmt->bindParam(6,$other);
 $stmt->bindParam(7,$emid);
 $stmt->execute();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/leavedaydecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>แก้ไขจำนวนวันลาเสร็จสิ้น</title>
</head>
<body>
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="hide()">×</a>

<?php
if($_SESSION["prior_em"]=="HR")
                {
echo "<a href=\"menu_hr.php\">หน้าหลัก</a>";
                }
  else if($_SESSION["prior_em"]=="employee")
  {
      echo "<a href=\"menu.php\">หน้าหลัก</a>";
  }
?>
<?php
if($_SESSION["prior_em"]=="HR")
                {
                    echo "<a href=\"approve_leave.php\">อนุมัติการลา</a>";
                    echo "<a href=\"approve_ot.php\">อนุมัติ OT</a>";
                    echo "<a href=\"leaveday.php\">กำหนดวันลา</a>";
                    echo "<a href=\"HR-tax.php\">คำนวณภาษี</a>";
                }
?>
<a href="profile.php">ประวัติส่วนตัว</a>
<a href="historyleave.php">ประวัติการลา</a>
<a href="historyot.php">ประวัติ OT</a>
<a href="leaveform.php">แจ้งลา</a>
<a href="otform.php">แจ้งโอที</a>
<a href="resetpass.php">เปลี่ยนรหัสผ่าน</a>
<a href="logout.php">ออกจากระบบ</a>
</div>
<br>
 <button class="openbtn" id="openbtn" onclick="show()">☰</button>
<section>
        <article>
       <h3>ทำการคำนวณและบันทึกข้อมูลเรียบร้อยแล้ว<h3>     
    <font size="2" border="1" cellpadding='2' face="Arial">
                <table>
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>รหัสประจำตัวพนักงาน</th>
                        <th>แผนก</th>
                        <th>ลาป่วย</th>
                        <th>ลาพักร้อน</th>
                        <th>ลากิจ</th>
                        <th>ลาบวช</th>
                        <th>ลาคลอด</th>
                        <th>ลาอื่นๆ</th>
                    </tr>
                    <tr>
                       <td><?=$firstname?> &emsp; <?=$lastname?></td>
                       <td><?=$emid?> </td>
                       <td><?=$department?> </td>
                       <td><?=$sick?> </td>
                       <td><?=$vacation?> </td>
                       <td><?=$business?> </td>
                       <td><?=$ordination?> </td>
                       <td><?=$maternity?> </td>
                       <td><?=$other  ?> </td>
                      </tr>
                   </table>
<br><br>

<form action="leaveday.php" >
    <button class="button" >กลับไป</button>
    </article>
    </section>
    <script>
   function show() {
      document.getElementById("mySidebar").style.width = "230px";
   }
   function hide() {
      document.getElementById("mySidebar").style.width = "0";
   }
   </script>
</body>

</html>