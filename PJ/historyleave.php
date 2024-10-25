<?php session_start();
if(empty($_SESSION["id_user"]))
{
    Header("Location: Login.php");
}
include("connect.php");
?>
<!DOCTYPE html>
<?php include "connect.php"?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/historyleavedecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>ประวัติการลา</title>
</head>
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
        <div class="form">
            <h2> &emsp; ประวัติการลา </h2>
            <form>
            <label for="optmonth">เลือกเดือน : </label>
                    <select id="month" onchange="filterTable();">
                        <option value="choose">--เลือกเดือน--</option>
                        <option value="1">มกราคม</option>
                        <option value="2">กุมภาพันธ์</option>
                        <option value="3">มีนาคม</option>
                        <option value="4">เมษายน</option>
                        <option value="5">พฤษภาคม</option>
                        <option value="6">มิถุนายน</option>
                        <option value="7">กรกฎาคม</option>
                        <option value="8">สิงหาคม</option>
                        <option value="9">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                    </select>
                    <br><br>
                    
                    <label for="pack">ประเภทการลา:</label>
                    <select id="pack" name="pack" onchange="filterTable();" >
                        <option value="select">เลือก</option>
                        <option value="ลาป่วย">ลาป่วย</option>
                        <option value="ลาพักร้อน">ลาพักร้อน</option>
                        <option value="ลากิจ">ลากิจ</option>
                        <option value="ลาบวช">ลาบวช</option>
                        <option value="ลาคลอด">ลาคลอด</option>
                        <option value="ลาอื่นๆ">ลาอื่นๆ</option>
                    </select>

            </form>
            <p></p>
            <br><br>
            <font size="2" border="1" cellpadding='2' face="Arial">
                <table class="header-table">
                    <tr>
                        <th>ลาป่วย</th>
                        <th>ลาพักร้อน</th>
                        <th>ลากิจ</th>
                        <th>ลาบวช</th>
                        <th>ลาคลอด</th>
                        <th>ลาอื่นๆ</th>
                    </tr>
                    <?php 
               $stmt=$pdo->prepare("SELECT * FROM leave_number WHERE id_em=?" );
               $stmt->bindParam(1,$_SESSION["id_em"]);
               $stmt->execute();
               while($row=$stmt->fetch()):
               ?>
                    <tr>
                       <td><?php echo $row["sick_leave"]; ?> </td>
                       <td><?php echo $row["vacation_leave"]; ?> </td>
                       <td><?php echo $row["business_leave"]; ?> </td>
                       <td><?php echo $row["ordination_leave"]; ?> </td>
                       <td><?php echo $row["maternity_leave"]; ?> </td>
                       <td><?php echo $row["other_leave"]; ?> </td>
                      </tr>
                      <?php endwhile; ?>    
                   </table>
            <br><br>  
            <font size="1" face="Arial">
                <table class="data-table">
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
                        <th>สถานะ</th>
                    </tr>
                <?php 
                $stmt=$pdo->prepare("SELECT * FROM leave_form WHERE id_em=?");
                $stmt->bindParam(1,$_SESSION["id_em"]);
                $stmt->execute();
                while($row=$stmt->fetch()):
                ?>
                    <tr>
                        <td><?php echo $row["id_leave"]; ?></td>
                        <td><?php echo $row["prefix_em"]; ?> &emsp; <?php echo $row["firstname_em"]; ?> &emsp; <?php echo $row["lastname_em"]; ?> </td>
                        <td><?php echo $row["id_em"]; ?></td>
                        <td><?php echo $row["department_em"]; ?></td>
                        <td><?php echo $row["leave_type"]; ?></td>
                        <td><?php echo $row["start_leave"]; ?></td>
                        <td><?php echo $row["end_leave"]; ?></td>
                        <td><?php echo $row["starttime_leave"]; ?></td>
                        <td><?php echo $row["endtime_leave"]; ?></td>
                        <td><?php echo $row["details"]; ?></td>
                        <td><?php echo $row["status_leave"]; ?></td>
                    </tr>
                    <?php endwhile; ?>    
                </table>
       
        </div>
        <p></p>
<script>
   function show() {
      document.getElementById("mySidebar").style.width = "230px";
   }
   function hide() {
      document.getElementById("mySidebar").style.width = "0";
   }


   function filterTable() {
                var selectedMonth = document.getElementById("month").value;
                var selectedLeaveType = document.getElementById("pack").value; // รับค่าประเภทการลาที่เลือก
                var tableRows = document.querySelectorAll(".data-table tr"); // แถวข้อมูล
                var headerTable = document.querySelector(".header-table"); // ตารางหัว

                if (selectedMonth === "choose") {
                    headerTable.classList.add("hidden");
                } else {
                    headerTable.classList.remove("hidden");
                }

                tableRows.forEach(function(row, index) {
                    if (index > 0) {
                        var rowDate = new Date(row.cells[5].textContent);
                        var rowMonth = rowDate.getMonth() + 1;
                        var rowLeaveType = row.cells[4].textContent.trim();

                        var isMonthMatch = selectedMonth === "choose" || rowMonth == selectedMonth;
                        var isLeaveTypeMatch = selectedLeaveType === "select" || rowLeaveType === selectedLeaveType;

                        if (isMonthMatch && isLeaveTypeMatch) {
                            row.style.display = "table-row";
                        } else {
                            row.style.display = "none";
                        }
                    }
                });
            }
</script>

    </article>
</body>

</html>