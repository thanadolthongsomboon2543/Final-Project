<?php
session_start();
include ("connect.php");

if(empty($_SESSION["id_user"]))
{
    Header("Location: login.php");
}
 if($_SESSION["prior_em"]=="employee")
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
    <link rel="stylesheet" href="CSS/historyleavedecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <title>ประวัติเข้าออก</title>
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
    <article>
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

            <h2> &emsp; ประวัติเข้าออก</h2>

            <form>
                <p>
                    <label for="optmonth">เลือกเดือน : </label>
                    <select id="month" onchange="filterTable();">
                        <option value="choose">--เลือกเดือน--</option>
                        <option value="1">มกราคม</option>
                        <option value="2">กุมภาพันธ์</option>
                        <option value="3">มีนาคม</option>
                        <option value="4">เมษายน</option>
                        <option value="5">พฤษภาคม</option>
                        <option value="6">มีถุนายน</option>
                        <option value="7">กรกฏาคม</option>
                        <option value="8">สิงหาคม</option>
                        <option value="9">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                    </select>
                </p>


            </form>
            <p></p>
  
            <font size="2" face="Arial">
                <table >
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>รหัสประจำตัวพนักงาน</th>
                        <th>แผนก</th>
                        <th>วันที่</th>
                        <th>เวลา</th>
                        <th>สถานะ</th>    
                    </tr>
                <?php 
               $stmt=$pdo->prepare("SELECT * FROM checktime" );
               $stmt->execute();
               while($row=$stmt->fetch()):
               ?>
                    <tr>
                       <td><?php echo $row["id_checktime"] ?> </td>
                       <td><?php echo $row["prefix_em"] ?> &emsp; <?php echo $row["firstname_em"] ?> &emsp; <?php echo $row["lastname_em"]; ?></td>
                       <td><?php echo $row["id_em"]; ?> </td>
                       <td><?php echo $row["department_em"]; ?> </td>
                       <td><?php echo $row["date_check"]; ?> </td>
                       <td><?php echo $row["time_check"]; ?> </td>
                       <td><?php echo $row["status_check"]; ?> </td>
                      </tr>
                <?php endwhile; ?>    

                   </table>
 
        <p></p>


    </article>
    <script>
   function show() {
      document.getElementById("mySidebar").style.width = "230px";
   }
   function hide() {
      document.getElementById("mySidebar").style.width = "0";
   }

   function filterTable() {
    var selectedMonth = document.getElementById("month").value; // รับค่าเดือนที่เลือก
    var tableRows = document.querySelectorAll("table tr"); // รับแถวของตาราง

    tableRows.forEach(function(row, index) {
        if (index > 0) {
            var rowDate = new Date(row.cells[4].textContent); // รับค่าวันที่จากคอลัมน์ที่ 5
            var rowMonth = rowDate.getMonth() + 1; // เดือน (ควรเพิ่ม 1 เพราะ JavaScript เริ่มนับเดือนที่ 0)

            if (selectedMonth === "choose" || rowMonth == selectedMonth) {
                row.style.display = "table-row"; // แสดงแถวที่ตรงเงื่อนไข
            } else {
                row.style.display = "none"; // ซ่อนแถวที่ไม่ตรงเงื่อนไข
            }
        }
    });
}


   </script>
</body>

</html>