<?php
session_start();
include ("connect.php");

if(empty($_SESSION["id_user"]))
{
    Header("Location: login.php");
}
else if($_SESSION["prior_em"]=="employee")
{
    Header("Location: menu.php");
}
?>
<!DOCTYPE html>
<?php include "connect.php"?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/approvedecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>อนุมัติลา</title>
    <body>
<p>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        

&emsp;&emsp;
ผู้ใช้งาน &emsp;
            <?php echo $_SESSION["prefix_em"]; ?>&emsp;
            <label for="fname sname"></label>
            <?php echo $_SESSION["firstname_em"] . ' ' . $_SESSION["lastname_em"]; ?>
            &emsp;
            <label for="emid">รหัสประจำตัว : </label>
            <?php echo $_SESSION["id_em"]; ?>
            </p>
</body>
    <script>
        function confirmApprove(id,approved)
        {  
           if(approved=="อนุมัติ")
           {
            var ans=confirm("อนุมัติ OT หรือไม่?");
                        if (ans == true)
                        {
                            document.location = "approveot_update.php?id=" + id +"&status=" + approved;

                        }
           }
          else if(approved=="ไม่อนุมัติ")
           {
            var ans=confirm("ปฏิเสธ OT หรือไม่?");
                        if(ans == true)
                        {
                            document.location = "approveot_update.php?id=" + id +"&status=" + approved;

                        }
           }
        }
    </script>
</head>
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

<a href="calendar.php">ปฏิทิน</a>
<?php
if ($_SESSION["prior_em"]=="employee" || $_SESSION["prior_em"]=="HR")
  {
      echo  "<a href=\"leaveform.php\">แจ้งลา</a>";
      echo " <a href=\"otform.php\">แจ้งโอที</a>";
     echo " <a href=\"historyleave.php\">ประวัติการลา</a>";
      echo "<a href=\"historyot.php\">ประวัติ OT</a>";
  }
  ?>
<a href="resetpass.php">เปลี่ยนรหัสผ่าน</a>
<a href="logout.php">ออกจากระบบ</a>
</div>
<br>
 <button class="openbtn" id="openbtn" onclick="show()">☰</button>
    <article>
        <h1>&emsp; หน้าการอนุมัติ OT</h1>
        <div class="search-container">
                
                <font size="2" border="1" cellpadding='2'>
                <table >
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>รหัสประจำตัวพนักงาน</th>
                        <th>แผนก</th>
                        <th>วันที่ทำ OT</th>
                        <th>เวลาเริ่ม</th>
                        <th>เวลาสิ้นสุด</th> 
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                    </tr>
                    <?php 

                  if($_SESSION["prior_em"]=="HR"){
                     $confirm = "รออนุมัติ";
                $stmt=$pdo->prepare("SELECT * FROM ot_form WHERE status_ot=? AND NOT department_em='hr' ");
                $stmt->bindParam(1,$confirm);
                $stmt->execute();
                  }
               else if($_SESSION["prior_em"]=="SV"){
                $confirm = "รออนุมัติ";
                $stmt=$pdo->prepare("SELECT * FROM ot_form WHERE status_ot=?");
                $stmt->bindParam(1,$confirm);
                $stmt->execute();
               }
                ?>
                    <?php
                   while($row=$stmt->fetch()):
                   ?> 

                  <tr>
                        <td><?php echo $row["id_ot"]?></td>
                        <td><?php echo $row["prefix_em"]?> &emsp;<?php echo $row["firstname_em"]?> &emsp;<?php echo $row["lastname_em"]?></td>
                        <td><?php echo $row["id_em"]?></td>
                        <td><?php echo $row["department_em"]?></td>
                        <td><?php echo $row["date_ot"]?></td>
                        <td><?php echo $row["start_ot"]?></td>
                        <td><?php echo $row["end_ot"]?></td>
                        <td><?php echo $row["details"]?></td>
                          <div class="wrapper">
                       <td><button id="app" onclick ='confirmApprove("<?php echo $row["id_ot"]?>","อนุมัติ" )' class="button">อนุมัติ</button></td>
                       <td><button id="appn" onclick='confirmApprove("<?php echo $row["id_ot"]?>","ไม่อนุมัติ" )' class="button">ไม่อนุมัติ </button>
                            </td>
                        </div>
                    </tr>
            

                      
                    </tr>    
                    <?php endwhile; ?> 
                </table>
           
        </div>

    </article>
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