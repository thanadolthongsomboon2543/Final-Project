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
        function confirmApprove(approved,startleave,endleave,leave_type,id_leave,id_em,starttime,endtime)
        {  
           if(approved=="อนุมัติ")
           {
            var ans=confirm("อนุมัติการลาหรือไม่?");
                        if (ans == true)
                        {
                            document.location = "approveleave_update.php?status=" + approved +"&startleave=" + startleave
                            + "&endleave=" + endleave +"&leavetype=" + leave_type +"&id_leave=" + id_leave 
                            + "&starttime=" + starttime + "&endtime=" + endtime + "&id_em=" + id_em;
                        }
           }
          else if(approved=="ไม่อนุมัติ")
           {
            var ans=confirm("ปฏิเสธการลาหรือไม่?");
                        if(ans == true)
                        {
                            document.location = "approveleave_update.php?status=" + approved +"&id_leave=" + id_leave + "&id_em=" + id_em;
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
        <h1>&emsp; หน้าการอนุมัติลา</h1>

                
                
                <font size="1" border="1" cellpadding='2'>
                <table >
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>รหัสประจำตัวพนักงาน</th>
                        <th>แผนก</th>
                        <th>ประเภทลา</th>
                        <th>วันเริ่ม</th>
                        <th>วันสิ้นสุด</th>
                        <th>เวลาเริ่ม</th>
                        <th>เวลาสิ้นสุด</th>
                        <th>รายละเอียด</th>
                    </tr>
                    <?php 
                    if($_SESSION["prior_em"]=="HR")
                    {
                 $confirm = "รออนุมัติ";
                 $stmt=$pdo->prepare("SELECT * FROM leave_form WHERE status_leave=? AND NOT department_em='hr' ");
                $stmt->bindParam(1,$confirm);
                $stmt->execute();
                    }
            
                    else if($_SESSION["prior_em"]=="SV")
                    {
                        $confirm = "รออนุมัติ";
                        $stmt=$pdo->prepare("SELECT * FROM leave_form WHERE status_leave=? ");
                        $stmt->bindParam(1,$confirm);
                        $stmt->execute();
                      }
                ?><?php
                   while($row=$stmt->fetch()):
                   ?>
                    <tr>
                        <td><?php echo $row["id_leave"];?></td>
                        <td><?php echo $row["prefix_em"]; ?> &emsp; <?php echo $row["firstname_em"];?> &emsp; <?php echo $row["lastname_em"];?> </td>
                        <td><?php echo $row["id_em"];?></td>
                        <td><?php echo $row["department_em"];?></td>
                        <td><?php echo $row["leave_type"];?></td>
                        <td><?php echo $row["start_leave"];?></td>
                        <td><?php echo $row["end_leave"];?></td>
                        <td><?php echo $row["starttime_leave"]; ?></td>
                        <td><?php echo $row["endtime_leave"]; ?></td>
                        <td><?php echo $row["details"];?></td>
                        <div class="wrapper">
                       <td><button id="app" onclick='confirmApprove("อนุมัติ" ,"<?php echo $row["start_leave"];?>","<?php echo $row["end_leave"];?>","<?php echo $row["leave_type"];?>",
                       "<?php echo $row["id_leave"];?>","<?php echo $row["id_em"];?>","<?php echo $row["starttime_leave"]; ?>","<?php echo $row["endtime_leave"]; ?>")'type="button">อนุมัติ</button></td>
                       <td><button id="appn" onclick='confirmApprove("ไม่อนุมัติ","<?php echo $row["start_leave"]?>","<?php echo $row["end_leave"]?>","<?php echo $row["leave_type"]?>",
                       "<?php echo $row["id_leave"];?>","<?php echo $row["id_em"];?>","<?php echo $row["starttime_leave"]; ?>","<?php echo $row["endtime_leave"]; ?>")' type="button">ไม่อนุมัติ</button></td>
                        </div>
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