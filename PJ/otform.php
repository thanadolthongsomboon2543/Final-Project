<?php
session_start();
include ("connect.php");
 
 if(empty($_SESSION["id_user"]))
 {
     Header("Location: login.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/otformdecor.css">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title> แจ้งOT</title>
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
<section>
  
   <article>
 
  <div class="form">
  <h2> แบบฟอร์ม OT </h2>
  <form action="insertot.php" method="post">
  <input type="hidden" value="<?php echo $_SESSION["prefix_em"]; ?>" id="prefix" name="prefix" style="background-color:CFD7E1;" readonly >
  <label for="name">ชื่อ :  </label> 
  <input type="text" id="fname" name="fname" value="<?php echo $_SESSION["firstname_em"]; ?>" style="background-color:CFD7E1;" readonly> &emsp;
  <label for="name">นามสกุล :  </label> 
  <input type="text" id="sname" name="sname" value="<?php echo $_SESSION["lastname_em"]; ?>" style="background-color:CFD7E1;"  readonly> 
  <br><br>
  <label for="emid">รหัสประจำตัวพนักงาน : </label> &emsp;
  <input type="text" id="emid" name="emid" value="<?php echo $_SESSION["id_em"];?>" style="background-color:CFD7E1;"  readonly>
  <label for="department">แผนก : </label>
  <input type="text" id="department" name="department" value="<?php echo $_SESSION["department_em"];?>" style="background-color:CFD7E1;"  readonly>
  <br><br>
  <label for="date">ในวันที่ :  </label>
  <input type="date" id="date" name="date" required>
  <br><br>
  <label for="start">ตั้งแต่เวลา : </label>
  <input type="time" id="start" name="start" step="1" required> &emsp;
  <label for="end">ถึงเวลา :</label>
  <input type="time" id="end" name="end" step="1" required>
  <p>
  <label for="details">รายละเอียดงาน : </label><br>
  <textarea  id="details" name="details" rows="4" cols="50" required></textarea>
</p>

<input type="submit" value="ส่ง" class="button">

</form>
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

<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#date').attr('min', maxDate);
});
</script>

</body>
</html>