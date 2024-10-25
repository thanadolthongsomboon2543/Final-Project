<?php session_start();
if(empty($_SESSION["id_user"]))
{
    Header("Location: Login.php");
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
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/taxdecor.css">
  <link rel="stylesheet" href="CSS/sidemenu.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        #content{
              cursor:default;
            padding: 10px;
            border-bottom: 1px solid #d4d4d4; 
        }
        #content:hover {
  background-color: #e9e9e9; 
}
    </style>
  <title>คำนวณภาษี</title>

</head>
    <body>
<h1>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        

&emsp;&emsp;
            ผู้ใช้งาน &emsp;
            <?php echo $_SESSION["prefix_em"]; ?>&emsp;
            <label for="fname sname"></label>
            <?php echo $_SESSION["firstname_em"] . ' ' . $_SESSION["lastname_em"]; ?>
            &emsp;
            <label for="emid">รหัสประจำตัว : </label>
            <?php echo $_SESSION["id_em"]; ?>
</h1>
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
 

  <section>
    <article>
    <button type="button" onclick="topFunction()" id="myBtn" >Top</button>
    <h1>คำนวณภาษี</h1>

            
                    <form class="search" method="POST">

                        <label for="month">เลือกเดือน : </label>
                        <select id="month" name="month">
                            <option value="">--เลือกเดือน--</option>
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
                    <br>
      <div class="searchcontainer">
      <p>ค้นหาพนักงาน:<p>
      <div id="searchbox">
        <input type="text" name="search" id="search" size="42" autocomplete="off">
        <button class="bttn" type="submit">ค้นหา</button>
        <div id="userList"></div>    
      </div>
  </div>   
    </form>
                       
    
  <br><br>
    
       <div class="form">
     <?php

//isset( $_POST['search'] ) ? $value = $_POST['search'] : $value = "";
if(isset($_POST['search']) && isset($_POST['month']))
{
  $value= $_POST['search'];
  $month= $_POST['month'];
}
$stmt=$pdo->prepare("SELECT * FROM taxdeduct_employee WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
OR id_em LIKE ? )AND MONTH(update_tax) LIKE ?");
$stmt->bindParam(1,$value);
$stmt->bindParam(2,$value);
$stmt->bindParam(3,$month);
$stmt->execute();
       ?> 
       <?php while($row=$stmt->fetch()):?>

        <form action="calculatedtax.php" method="POST">  
      <input type="hidden" value="<?php echo $row["prefix_em"] ?>" id="prefix" name="prefix" readonly >
       <label for="fname">ชื่อ:</label>
       <input value="<?php echo $row['firstname_em']?>" id="fname" name="fname" readonly > &emsp;
       <label for="sname">นามสกุล:</label>
       <input value="<?php echo $row['lastname_em']?>" id="sname" name="sname" readonly >
       <br><br>
       <label for="emid">รหัสประจำตัวพนักงาน : </label> 
       <input value="<?php echo $row['id_em']?>" id="emid" name="emid" readonly >&emsp;    
       <label for="department">แผนก:</label>
       <input value="<?php echo $row['department_em']?>" id="department" name="department" readonly >
       <br><br>
          <label for="salary">เงินเดือน: </label>
            <input type="text" id="salary" name="salary" value="<?php echo $row['salary_em']?>" readonly >&emsp; บาท
          <label for="salary_year">เงินเดือนต่อปี: </label>
            <input type="text" id="salary_year" name="salary_year" value="<?php echo $row['salary_year_em']?>" readonly >&emsp; บาท
          <br><br>

          <h1>รายการลดหย่อนภาษี:ส่วนตัวและครอบครัว</h1>
          <br>
            <label for="cost">ลดหย่อนส่วนบุคคล : </label>
            <input type="text" id="cost" name="cost" value="<?php echo $row['cost_tax']?>" readonly >&emsp; บาท
            <br><br>
             <label for="parent"> ลดหย่อนบิดามารดา : </label>
            <input type="text" id="parent" name="parent" value="<?php echo $row['parental_tax']?>" readonly >&emsp; บาท
            <br><br>
             <label for="spouse"> ลดหย่อนคู่สมรส : </label>
            <input type="text" id="spouse" name="spouse" value="<?php echo $row['spouse_tax']?>" readonly >&emsp; บาท  
            <br><br>
            <label for="childnum">จำนวนบุตร(รวมบุตรบุญธรรม) : </label>
            <input type="text" id="childnum" name="childnum" value="<?php echo $row['children_nstudy_num']?>" readonly >&emsp; คน
            <br><br>
            <label for="child"> ลดหย่อนบุตร : </label>
            <input type="text" id="child" name="child" value="<?php echo $row['children_nstudy_tax']?>" readonly >&emsp; บาท  
            <br><br>
            <label for="adopt1"> ลดหย่อนบุตรบุญธรรมคนที่ 1 : </label>
            <input type="text" id="adopt1" name="adopt1" value="<?php echo $row['adopt1_tax']?>" readonly >&emsp; บาท  
            <br><br>
            <label for="adopt2">ลดหย่อนบุตรบุญธรรมคนที่ 2 : </label>
            <input type="text" id="child" name="adopt2" value="<?php echo $row['adopt2_tax']?>" readonly >&emsp; บาท  
            <br><br>
            <label for="adopt3">ลดหย่อนบุตรบุญธรรมคนที่ 3 : </label>
            <input type="text" id="child" name="adopt3" value="<?php echo $row['adopt3_tax']?>" readonly >&emsp; บาท  
            <br><br>
            <label for="disabled">ลดหย่อนผู้พิการหรือทุพพลภาพ : </label>
            <input type="text" id="disabled" name="disabled" value="<?php echo $row['disabled_tax']?>" readonly > &emsp; บาท 
            <br><br>
          
           <h1>รายการลดหย่อนภาษี:ภาษีกลุ่มประกันและการลงทุน</h1>
          <br>
            <label for="insurance">ลดหย่อนประกันสังคม : </label>
            <input type="text" id="insurance" name="insurance" value="<?php echo $row['life_insurance_tax']?>" readonly >&emsp; บาท
          <br><br>
            <label for="linsurance">ลดหย่อนประกันชีวิต : </label>
            <input type="text" id="linsurance" name="linsurance" value="<?php echo $row['insurance_tax']?>" readonly >&emsp; บาท
          <br><br>
            <label for="hinsurance">ลดหย่อนประกันสุขภาพ : </label>
            <input type="text" id="hinsurance" name="hinsurance" value="<?php echo $row['health_insurance_tax']?>" readonly >&emsp; บาท
          <br><br>
            <label for="phealth">ลดหย่อนประกันสุขภาพบิดา,มารดา : </label>
            <input type="text" id="phealth" name="phealth" value="<?php echo $row['parental_tax']?>" readonly >&emsp; บาท
          <br><br>
           <label for="rmf">ลดหย่อนกองทุนรวมเพื่อการเลี้ยงชีพ (RMF) : </label>
            <input type="text" id="rmf" name="rmf" value="<?php echo $row['rmf_tax']?>" readonly >&emsp; บาท
          <br><br>
          <label for="ssf">ลดหย่อนกองทุนรวมเพื่อการออม (SSF) : </label>
            <input type="text" id="ssf" name="ssf" value="<?php echo $row['ssf_tax']?>" readonly >&emsp; บาท
          <br><br>
          <label for="pvd">ลดหย่อนกองทุนสำรองเลี้ยงชีพ (PVD) : </label>
            <input type="text" id="pvd" name="pvd" value="<?php echo $row['provident_tax']?>" readonly >&emsp; บาท
          <br><br>
            <label for="saving">ลดหย่อนกองทุนบำเหน็จบำนาญข้าราชการ (กบข.) : </label>
            <input type="text" id="saving" name="saving" value="<?php echo $row['savings_tax']?>" readonly >&emsp; บาท
          <br><br>
            <label for="fsaving">ลดหย่อนกองทุนออมแห่งชาติ (กอช.): </label>
            <input type="text" id="fsaving" name="fsaving" value="<?php echo $row['fund_savings_tax']?>" readonly >&emsp; บาท
          <br><br>
           <label for="pension">เบี้ยประกันชีวิตบำนาญ : </label>
            <input type="text" id="pension" name="pension" value="<?php echo $row['pension_tax']?>" readonly >&emsp; บาท
           <br><br>
          <h1>รายการลดหย่อนภาษี:เงินบริจาคและอื่นๆ</h1>
          <br>
            <label for="education">เงินบริจาคเพื่อการศึกษา การกีฬา การพัฒนาสังคม
              และโรงพยาบาลรัฐ : </label>
            <input type="text" id="education" name="education" value="<?php echo $row['education_tax']?>" readonly >&emsp; บาท
          <br><br>
            <label for="other">เงินบริจาคทั่วไป : </label>
            <input type="text" id="other" name="other" value="<?php echo $row['other_tax']?>" readonly >&emsp; บาท
          <br><br>
          <label for="interest">ดอกเบี้ยกู้ยืมที่อยู่อาศัย : </label>
            <input type="text" id="interest" name="interest" value="<?php echo $row['interest_tax']?>" readonly >&emsp; บาท
          <br><br>
           <div class="btn-right">
            
             
          </div>
          <?php endwhile; ?>
         <input type="submit" value="คำนวณ"> &emsp;
          
        </form>
      </div>
      <p></p>
     
    </article>
  </section>
  <script>
// Get the button
let mybutton = document.getElementById("myBtn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
   $(document).ready(function(){  
        $('#search').keyup(function(){  
            var query = $(this).val();  
            if(query != '')  
            {  
                $.ajax({  
                    url:"searchsuggest.php",  
                    method:"POST",  
                    data:{query:query},  

                    success:function(data)  
                    {  
                        $('#userList').fadeIn();  
                        $('#userList').html(data);  
                    }  
                });  
            }  
        });  
        
        $(document).on('click', '#userList p', function(){  
            $('#search').val($(this).text());  
            $('#userList').fadeOut();  
        });  

        $('body').click( function() {
        $('#userList').fadeOut();
});
 
    });  
  </script>




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