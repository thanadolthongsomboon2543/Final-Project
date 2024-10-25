<?php session_start();
if(empty($_SESSION["id_user"]))
{
    Header("Location: Login.php");
}
include("connect.php");
?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/profiledecor.css">
  <link rel="stylesheet" href="CSS/sidemenu.css">
  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  <title>ประวัติส่วนตัว</title>
</head>

<body>
<p>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        

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

  <div class="form">
    <h1> ข้อมูลส่วนตัว (แก้ไข) </h1>
    <br>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM profiles_employee WHERE id_em = ?");
    $stmt->bindParam(1, $_SESSION["id_em"]);
    $stmt->execute();
    while ($row = $stmt->fetch()) :
    ?>
      <form action="profile_update.php">
      <img src='profilepic/<?php echo $row["id_em"]?>.jpg' width='100'><br><hr> 
        </p>
        <p>

          <label for="title">คำนำหน้า:</label>
          <input type="text" id="title" name="title" value="<?= $row["prefix_em"]; ?>" >
        </p>
        <p>

          <label for="fname">ชื่อจริง:</label>
          <input type="text" id="fname" name="fname" value="<?= $row["firstname_em"]; ?>" >
        </p>
        <p>
          <label for="lname">นามสกุล:</label>
          <input type="text" id="sname" name="sname" value="<?= $row["lastname_em"]; ?>" >
        </p>
        <p>
          <label for="nname">ชื่อเล่น:</label>
          <input type="text" id="nname" name="nname" value="<?= $row["nickname_em"]; ?>" >
        </p>
        <p>
          <label for="gender">เพศ:</label>
          <input type="text" id="gender" name="gender" value="<?= $row["gender_em"]; ?>" >
        </p>
      
    <p>
          <label for="idem">รหัสประจำตัวพนักงาน:</label>
          <input type="text" id="idem" name="idem" value="<?= $row["id_em"]; ?>" >
        </p>
        <p>
          <label for="department">แผนก:</label>
          <input type="text" id="department" name="department" value="<?= $row["department_em"]; ?>" >
        </p>
        <p>
          <label for="position">ตำแหน่ง:</label>
          <input type="text" id="position" name="position" value="<?= $row["position_em"]; ?>" >
        </p>
        <p>
          <label for="citizen">บัตรประจำตัวประชาชน:</label>
          <input type="text" id="citizen" name="citizen" value="<?= $row["citizen_em"]; ?>" >
        </p>
        <p>
          <label for="bdaymonth">วันเกิด:</label>
          <input type="date" id="bdaymonth" name="bdaymonth" value="<?= $row["birthday_em"]; ?>" >
        </p>
        <p>
          <label for="age">อายุ:</label>
          <input type="text" id="age" name="age" value="<?= $row["age_em"]; ?>" >
        </p>
        <p>
          <label for="weight">น้ำหนัก:</label>
          <input type="text" id="weight" name="weight" value="<?= $row["weight_em"]; ?>" >
        </p>
        <p>
          <label for="height">ส่วนสูง:</label>
          <input type="text" id="height" name="height" value="<?= $row["height_em"]; ?>" >
        </p>
        <p>
          <label for="address">ที่อยู่:</label>
          <input type="text" id="address" name="address" value="<?= $row["address_house_em"]; ?>" >
        </p>
        <p>
          <label for="district">ตำบล:</label>
          <input type="text" id="district" name="district" value="<?= $row["district_house_em"]; ?>" >
        </p>
        <p>
          <label for="amphoe">อำเภอ:</label>
          <input type="text" id="amphoe" name="amphoe" value="<?= $row["amphoe_house_em"]; ?>" >
        </p>
        <p>
          <label for="province">จังหวัด:</label>
          <input type="text" id="province" name="province" value="<?= $row["province_house_em"]; ?>" >
        </p>
        <p>
          <label for="zipcode">รหัสไปรษณีย์:</label>
          <input type="text" id="zipcode" name="zipcode" value="<?= $row["zipcode_house_em"]; ?>" >
        </p>
        <p>
          <label for="contact">โทรศัพท์:</label>
          <input type="text" id="contact" name="contact" value="<?= $row["phone_em"]; ?>" >
        </p>
        <p>
          <label for="email">อีเมลล์:</label>
          <input type="text" id="email" name="email" value="<?= $row["email_em"]; ?>" >
        </p>
        <p>
          <label for="startwork">วันเริ่มทำงาน:</label>
          <input type="time" id="startwork" name="startwork" value="<?= $row["startwork_em"]; ?>" >
        </p>
        <p>
          <label for="endwork">วันสิ้นสุดการทำงาน:</label>
          <input type="time" id="endwork" name="endwork" value="<?= $row["endwork_em"]; ?>" >
        </p>
        <p>
          <label for="trialwork">วันที่ฝึกงาน:</label>
          <input type="text" id="trialwork" name="trialwork" value="<?= $row["trialwork_em"]; ?>" >
        </p>
        <p>
          <label for="date">วันที่:</label>
          <input type="datetime-local" id="date" name="date" value="<?= $row["date_em"]; ?> "readonly >
        </p>
        <p>
          <label for="update">เวลาที่อัพเดทข้อมูล:</label>
          <input type="datetime-local" id="update" name="update" value="<?= $row["update_em"]; ?> "readonly >
        </p>
        <p>
          <label for="salary">เงินเดือนพนักงาน:</label>
          <input type="text" id="salary" name="salary" value="<?= $row["salary_em"]; ?>" >
        </p>
        <p>
          <label for="savings">เงินสะสมพนักงาน:</label>
          <input type="text" id="savings" name="savings" value="<?= $row["savings_em"]; ?>" >
        </p>
        <p>
          <label for="type">ประเภทพนักงาน:</label>
          <input type="text" id="type" name="type" value="<?= $row["type_em"]; ?>" >
        </p>
        <p><br>
        <p>
        <p><br>
 
        <?php endwhile; ?>
        <input type="submit" value="เสร็จสิ้น" >
        

      </form>

  </div>
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