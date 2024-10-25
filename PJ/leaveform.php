<?php session_start();
if(empty($_SESSION["id_user"]))
{
    Header("Location: Login.php");
}
include("connect.php");
?>
 
<!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/leaveformdecor.css">
  <link rel="stylesheet" href="CSS/sidemenu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <title>แจ้งลา</title>
<script>
 function checking(){       

var selected=document.getElementById("pack").value;

if (selected=="ลาป่วย")
{
     var sick1 = document.getElementById("sick").innerHTML;
     var sick2 = document.getElementById("sickcheck").value;
       if(sick1 >= sick2){
          var ans=confirm("คุณได้ลาเกินที่กำหนดแล้ว ต้องการดำเนินการต่อหรือไม่");
          if (ans == true)
          {
           return true;
          }
          else 
          {
           return false;
          }
     }
    else
    {
     return true;
    }
}

else if(selected == "ลาพักร้อน")
{
     var vacation1 = document.getElementById("vacation").innerHTML;
     var  vacation2 = document.getElementById("vacationcheck").value;
       if(vacation1 >= vacation2){
          var ans=confirm("คุณได้ลาเกินที่กำหนดแล้ว ต้องการดำเนินการต่อหรือไม่");
          if (ans == true)
          {
           return true;
          }
          else 
          {
           return false;
          }
        }
    else
    {
     return true;
    }
}

else if(selected == "ลากิจ")
{
     var business1 = document.getElementById("business").innerHTML;
     var  business2 = document.getElementById("businesscheck").value;
       if(business1 >= business2){
          var ans=confirm("คุณได้ลาเกินที่กำหนดแล้ว ต้องการดำเนินการต่อหรือไม่");
          if (ans == true)
          {
           return true;
          }
          else
          {
           return false;
          }
         
     }
    else
    {
     return true;
    }
}

else if(selected == "ลาบวช")
{
     var ordination1 = document.getElementById("ordination").innerHTML;
     var  ordination2 = document.getElementById("ordinationcheck").value;
       if(ordination1 >= ordination2){
          var ans=confirm("คุณได้ลาเกินที่กำหนดแล้ว ต้องการดำเนินการต่อหรือไม่");
          if (ans==true)
          {
           return true;
          }
          else 
          {
           return false;
       }
     }
    else
    {
     return true;
    }
}
else if(selected == "ลาคลอด")
{
     var maternity1 = document.getElementById("maternity").innerHTML;
     var  maternity2 = document.getElementById("maternitycheck").value;
       if(maternity1 >= maternity2){
          var ans=confirm("คุณได้ลาเกินที่กำหนดแล้ว ต้องการดำเนินการต่อหรือไม่");
          if (ans == true)
          {
           return true;
          }
          else 
          {
           return false;
       }
     }
    else
    {
     return true;
    }
}

else if(selected == "ลาอื่นๆ")
{
     var other1 = document.getElementById("other").innerHTML;
     var  other2 = document.getElementById("othercheck").value;
       if(other1 >= other2){
          var ans = confirm("คุณได้ลาเกินที่กำหนดแล้ว ต้องการดำเนินการต่อหรือไม่");
          if (ans == true)
          {
           return true;
          }
          else 
          {
           return false;
          }
        }
    else
    {
     return true;
    }
}

 }
  </script>






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

        
    <div class="lform"> 
   <h2>แบบฟอร์มแจ้งลา</h2>
   <br><br> 
   <table>
   <tr>  
                        <th>ลาป่วย</th>
                        <th>ลาพักร้อน</th>
                        <th>ลากิจ</th>
                        <th>ลาบวช</th>
                        <th>ลาคลอด</th>
                        <th>ลาอื่นๆ</th>

                    </tr>
                    <?php 
               $stmt=$pdo->prepare("SELECT * FROM leave_remain" );
               $stmt->execute();
               while($row=$stmt->fetch()):
               ?>
      <input type="hidden" id="sickcheck" name="sickcheck" value="<?php echo $row["sick_leave"]; ?>" readonly >
      <input type="hidden" id="businesscheck" name="businesscheck" value="<?php echo $row["business_leave"]; ?>" readonly >
       <input type="hidden" id="ordinationcheck" name="ordinationcheck" value="<?php echo $row["ordination_leave"]; ?>" readonly >
        <input type="hidden" id="maternitycheck" name="maternitycheck" value="<?php echo $row["maternity_leave"]; ?>" readonly >
         <input type="hidden" id="othercheck" name="othercheck" value="<?php echo $row["other_leave"]; ?>" readonly >
                <?php endwhile; ?>  
               
               <?php 
               $y=2023;
  $stmt=$stmt=$pdo->prepare("SELECT * FROM leave_vacation where id_em=? and year_leave=?" );
 $stmt->bindParam(1,$_SESSION["id_em"]);
 $stmt->bindParam(2,$y);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
  <input type="hidden" id="vacationcheck" name="vacationcheck" value="<?php echo $row["leavenumber_em"]; ?>" readonly >


             <?php 
               $stmt=$pdo->prepare("SELECT * FROM leave_number WHERE id_em=?" );
               $stmt->bindParam(1,$_SESSION["id_em"]);
               $stmt->execute();
               while($row=$stmt->fetch()):
               ?>
                    <tr>
                       <td id="sick"><?php echo $row["sick_leave"]; ?> </td>
                       <td id="vacation"><?php echo $row["vacation_leave"]; ?> </td>
                       <td id="business"><?php echo $row["business_leave"]; ?> </td>
                       <td id= "ordination"><?php echo $row["ordination_leave"]; ?> </td>
                       <td id= "maternity"><?php echo $row["maternity_leave"]; ?> </td>
                       <td id="other"><?php echo $row["other_leave"]; ?> </td>
                      </tr>
                <?php endwhile; ?>    
                   </table>
   <br><br>
   <form action="insertleave.php" method="post" onsubmit="return checking()">
   <input type="hidden" value="<?php echo $_SESSION["prefix_em"]; ?>" id="prefix" name="prefix" style="background-color:CFD7E1;" readonly >
   <label for="fname">ชื่อ:</label>
   <input type="text" value="<?php echo $_SESSION["firstname_em"]; ?>" id="fname" name="fname" style="background-color:CFD7E1;"  readonly> &emsp;
   <label for="sname">นามสกุล:</label>
   <input type="text" value="<?php echo $_SESSION["lastname_em"]; ?>" id="sname" name="sname" style="background-color:CFD7E1;" readonly>
   <br><br>
   <label for="emid">รหัสประจำตัวพนักงาน : </label> 
   <input type="text" value="<?php echo $_SESSION["id_em"];?>" id="emid" name="emid" style="background-color:CFD7E1;"  readonly>&emsp;
  <br><br>
   <label for="department">แผนก:</label>
   <input value="<?php echo $_SESSION["department_em"];?>" id="department" name="department" style="background-color:CFD7E1;" readonly> &emsp;
   <label for="pack">ประเภทการลา:</label>
     <select id="pack" name="pack" required>
         <option value="">เลือก</option>
         <option value="ลาป่วย">ลาป่วย</option>
         <option value="ลาพักร้อน">ลาพักร้อน</option>
         <option value="ลากิจ">ลากิจ</option>
         <option value="ลาบวช">ลาบวช</option>  
         <option value="ลาคลอด">ลาคลอด</option>
         <option value="ลาอื่นๆ">ลาอื่นๆ</option>
     </select>
     <br><br>
     <label for="start">วันที่เริ่ม:</label>
     <input type="date" id="start" name="start" required>
     <label for="finish">วันที่สิ้นสุุด:</label>
     <input type="date" id="finish" name="finish" required>
      <br><br>
     <label for="start">ตั้งแต่เวลา:</label>
     <input type="time" id="starttime" name="starttime"   step="1" required>
     <label for="finish">ถึงเวลา</label>
     <input type="time" id="finishtime" name="finishtime" step="1"  required>
   <br><br>
     <label for="reason">รายละเอียด</label><br>
     <textarea id="reason" name="reason" rows="4" cols="50"></textarea>
     <br><br>
     
     <br><br>
     <input type="submit" class="button" value="ส่ง" >
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
    $('#start').attr('min', maxDate);
});
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
    $('#finish').attr('min', maxDate);
});


</script>










</body>
</html>