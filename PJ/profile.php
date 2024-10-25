<?php session_start();
if (empty($_SESSION["id_user"])) {
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

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah')
          .attr('src', e.target.result)
          .width(150)
          .height(150);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
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
    <h1> ข้อมูลส่วนตัว </h1>
    <br>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM profiles_employee WHERE id_em = ?");
    $stmt->bindParam(1, $_SESSION["id_em"]);
    $stmt->execute();
    while ($row = $stmt->fetch()) :
    ?>
      <form action="profile_edit.php" >
      <p>
        <p> <p>
        <div>
          <label for="title">คำนำหน้า:</label>
          <input type="text" id="title" name="title" value="<?php echo $row["prefix_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="fname">ชื่อจริง:</label>
          <input type="text" id="fname" name="fname" value="<?php echo $row["firstname_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="lname">นามสกุล:</label>
          <input type="text" id="sname" name="sname" value="<?php echo $row["lastname_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="nname">ชื่อเล่น:</label>
          <input type="text" id="nname" name="nname" value="<?php echo $row["nickname_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="gender">เพศ:</label>
          <input type="text" id="gender" name="gender" value="<?php echo $row["gender_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="idem">รหัสประจำตัวพนักงาน:</label>
          <input type="text" id="idem" name="idem" value="<?php echo $row["id_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="department">แผนก:</label>
          <input type="text" id="department" name="department" value="<?php echo $row["department_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="position">ตำแหน่ง:</label>
          <input type="text" id="position" name="position" value="<?php echo $row["position_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="citizen">บัตรประจำตัวประชาชน:</label>
          <input type="text" id="citizen" name="citizen" value="<?php echo $row["citizen_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="bdaymonth">วันเกิด:</label>
          <input type="text" id="bdaymonth" name="bdaymonth" value="<?php echo $row["birthday_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="age">อายุ:</label>
          <input type="text" id="age" name="age" value="<?php echo $row["age_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="weight">น้ำหนัก:</label>
          <input type="text" id="weight" name="weight" value="<?php echo $row["weight_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="height">ส่วนสูง:</label>
          <input type="text" id="height" name="height" value="<?php echo $row["height_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="address">ที่อยู่:</label>
          <input type="text" id="address" name="address" value="<?php echo $row["address_house_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="district">ตำบล:</label>
          <input type="text" id="district" name="district" value="<?php echo $row["district_house_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="amphoe">อำเภอ:</label>
          <input type="text" id="amphoe" name="amphoe" value="<?php echo $row["amphoe_house_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="province">จังหวัด:</label>
          <input type="text" id="province" name="province" value="<?php echo $row["province_house_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="zipcode">รหัสไปรษณีย์:</label>
          <input type="text" id="zipcode" name="zipcode" value="<?php echo $row["zipcode_house_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="contact">โทรศัพท์:</label>
          <input type="text" id="contact" name="contact" value="<?php echo $row["phone_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="email">อีเมลล์:</label>
          <input type="text" id="email" name="email" value="<?php echo $row["email_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="startwork">วันเริ่มทำงาน:</label>
          <input type="text" id="startwork" name="startwork" value="<?php echo $row["startwork_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="endwork">วันสิ้นสุดการทำงาน:</label>
          <input type="text" id="endwork" name="endwork" value="<?php echo $row["endwork_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="trialwork">วันที่ฝึกงาน:</label>
          <input type="text" id="trialwork" name="trialwork" value="<?php echo $row["trialwork_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="date">วันที่:</label>
          <input type="text" id="date" name="date" value="<?php echo $row["date_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="update">เวลาที่อัพเดทข้อมูล:</label>
          <input type="text" id="update" name="update" value="<?php echo $row["update_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="salary">เงินเดือนพนักงาน:</label>
          <input type="text" id="salary" name="salary" value="<?php echo $row["salary_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="savings">เงินสะสมพนักงาน:</label>
          <input type="text" id="savings" name="savings" value="<?php echo $row["savings_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <div>
          <label for="type">ประเภทพนักงาน:</label>
          <input type="text" id="type" name="type" value="<?php echo $row["type_em"]; ?>" style="background-color:CFD7E1;" readonly>
        </div>
        <p><br>
        <p>
        <p><br>
 
        <?php endwhile; ?>
        <input type="submit" class="button" value="แก้ไข" >
        

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