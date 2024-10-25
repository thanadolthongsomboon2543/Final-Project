<?php session_start();
    
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
    include ("connect.php") ;
?>



<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <link rel="stylesheet" href="CSS/salarydecor.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <title>คำนวณเงินเดือน</title>
</head>
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

            <div class="form">
                <h2> คำนวณเงินเดือนพนักงาน </h2>
                <form method="POST" autocomplete="off">
                    <p>
                        <label for="optmonth">เลือกเดือน : </label>
                        <select id="month">
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
                    </p>
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
                  <?php
                  if(!empty($_POST['search']) )
                      {
                        $value=$_POST['search'];
                      }
                      $stmt=$pdo->prepare("SELECT * FROM users WHERE CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?");
                      $stmt->bindParam(1,$value);
                      $stmt->bindParam(2,$value);
                       $stmt->execute();
                   ?>
            
<br><br>
                  <?php
                   while($row=$stmt->fetch()):
                   ?>
                    <form action="calculatedsalary.php" method="POST">
        <input type="hidden" value="<?php echo $row["prefix_em"]?>" id="prefix" name="prefix" readonly >
       <label for="fname">ชื่อ:</label>
       <input value="<?php echo $row["firstname_em"] ?>" id="fname" name="fname" readonly > &emsp;
       <label for="sname">นามสกุล:</label>
       <input value="<?php echo $row["lastname_em"]?>" id="sname" name="sname" readonly >
       <br><br>
       <label for="emid">รหัสประจำตัวพนักงาน : </label> 
       <input value="<?php echo $row["id_em"]?>" id="emid" name="emid" readonly >&emsp;    
       <label for="department">แผนก:</label>
       <input value="<?php echo $row["department_em"] ?>" id="department" name="department" readonly >
       <br><br>
       <?php endwhile; ?>    
       
                 
                    <label for="salary">เงินเดือน : </label>
                    <input type="text" id="salary" name="salary" required>&emsp; บาท
                    <br><br>
                    <label for="salary">โบนัส : </label>
                    <input type="text" id="bonus" name="bonus" required>&emsp; บาท
                    <br><br>

                    <?php
                      $stmt=$pdo->prepare("SELECT * FROM tax_employee WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ? ) ");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                       $stmt->execute();
                   ?>
                    <?php
                   while($rs=$stmt->fetch()):
                   ?>
                    <label for="tax">ภาษีประจำเดือน : </label>
                    <input type="text" id="tax" name="tax" value="<?php echo $rs["tax_month"] ?>" readonly>&emsp;บาท
                    <br><br>
                    <?php endwhile; ?>   

                            <?php
                            $status="อนุมัติ";
                     $stmt=$pdo->prepare("SELECT coalesce(SUM(TIMESTAMPDIFF(hour,start_ot ,end_ot )),0)   AS different from ot_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ? ) AND status_ot LIKE ?");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$status);
                       $stmt->execute();
                   ?>
                    <?php
                   while($rsa=$stmt->fetch()):
                   ?>
                    <label for="ot">ทำโอที : </label>
                    <input type="text" id="ot" name="ot" value="<?php echo $rsa["different"]?>" readonly>&emsp; ชั่วโมง
                    <br><br>
                    <?php endwhile; ?>   
        
                    <?php
                    $later="สาย";
                      $stmt=$pdo->prepare("SELECT count(status_check) AS late FROM checktime WHERE coalesce(((CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?) AND status_check LIKE ?),0) ");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$later);
                       $stmt->execute();
                   ?>
                    <?php
                   while($rs=$stmt->fetch()):
                   ?>
                    <label for="late">มาสายทั้งหมด : </label>
                        <input type="text" id="late" name="late" value = "<?php echo $rs["late"] ?>" readonly>&emsp; วัน
                    <br><br> 
                    <?php endwhile; ?>   
                           
                    







                    <?php
                    $normal="เข้างาน";
                      $stmt=$pdo->prepare("SELECT count(status_check) AS normal FROM checktime WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?) AND status_check LIKE ? ");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$normal);
                       $stmt->execute();
                   ?>
                    <?php
                   while($rs=$stmt->fetch()):
                   ?>
                    <label for="checkin">เข้างานตรงเวลาทั้งหมด : </label>
                        <input type="text" id="checkin" name="checkin" value = "<?php echo $rs["normal"] ?>" readonly>&emsp; วัน
                    <br><br>
                    <?php endwhile; ?>  

             <?php
                     
                      $sick="ลาป่วย";
                      $stmt=$pdo->prepare("SELECT count(leave_type) AS sick FROM leave_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?)  AND (leave_type LIKE ?) AND status_leave = 'อนุมัติ'");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$sick);
                        $stmt->execute();
                   ?>
                    <?php
                   while($rb=$stmt->fetch()):
                   ?>

                    <label for="sick">ลาป่วย : </label>
                        <input type="text" id="sick" name="sick" value = "<?php echo $rb["sick"] ?>" readonly>&emsp; วัน
                    <br><br>
                    <?php endwhile; ?>  

                    <?php
                      $business="ลากิจ";
                      $stmt=$pdo->prepare("SELECT count(leave_type) AS business FROM leave_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?) AND (leave_type LIKE ?) AND status_leave = 'อนุมัติ'");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$business);
                        $stmt->execute();
                   ?>
                   <?php
                   while($rbq=$stmt->fetch()):
                   ?>
                    <label for="business">ลากิจ : </label>
                        <input type="text" id="business" name="business" value = "<?php echo $rbq["business"] ?>" readonly>&emsp; วัน
                    <br><br>
                    <?php endwhile; ?>  

                    <?php
                      $vacation="ลาพักร้อน";
                      $stmt=$pdo->prepare("SELECT count(leave_type) AS vacation FROM leave_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?) AND (leave_type LIKE ?) AND status_leave = 'อนุมัติ' ");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$vacation);
                       $stmt->execute();
                   ?>
                    <?php
                   while($rba=$stmt->fetch()):
                   ?>
                    <label for="vacation">ลาพักร้อน : </label>
                        <input type="text" id="vacation" name="vacation" value = "<?php echo $rba["vacation"] ?>" readonly>&emsp; วัน
                    <br><br>
                    <?php endwhile; ?>  
                    
                    <?php
                     $ordination="ลาบวช";
                     $stmt=$pdo->prepare("SELECT count(leave_type) AS ordinate FROM leave_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                     OR id_em LIKE ?)  AND (leave_type LIKE ?) AND status_leave = 'อนุมัติ' ");
                       $stmt->bindParam(1,$value);
                       $stmt->bindParam(2,$value);
                       $stmt->bindParam(3,$ordination);
                      $stmt->execute();
                  ?>
                    <?php
                   while($rbs=$stmt->fetch()):
                   ?>
                    <label for="ordination">ลาบวช : </label>
                        <input type="text" id="ordination" name="ordination" value = "<?php echo $rbs["ordinate"]?>" readonly>&emsp; วัน
                    <br><br>
                    <?php endwhile; ?>  
                    
                    <?php
                     $maternity="ลาคลอด";
                     $stmt=$pdo->prepare("SELECT count(leave_type) AS maternity FROM leave_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                     OR id_em LIKE ?)  AND (leave_type LIKE ?) AND status_leave = 'อนุมัติ'");
                       $stmt->bindParam(1,$value);
                       $stmt->bindParam(2,$value);
                       $stmt->bindParam(3,$maternity);
                      $stmt->execute();
                  ?>
                        <?php
                   while($rbd=$stmt->fetch()):
                   ?>
                    <label for="maternity">ลาคลอด : </label>
                        <input type="text" id="maternity" name="maternity" value = "<?php echo $rbd["maternity"]?>" readonly>&emsp; วัน
                    <br><br>
                     <?php endwhile; ?>  

                    <?php
                     
                      $other="ลาอื่นๆ";
                      $stmt=$pdo->prepare("SELECT count(leave_type) AS other FROM leave_form WHERE (CONCAT(firstname_em,' ',lastname_em,' ',id_em,' ',department_em) LIKE ? 
                      OR id_em LIKE ?) AND (leave_type LIKE ?) AND status_leave = 'อนุมัติ'");
                        $stmt->bindParam(1,$value);
                        $stmt->bindParam(2,$value);
                        $stmt->bindParam(3,$other);
                       $stmt->execute();
                   ?>
                       <?php
                   while($rbe=$stmt->fetch()):
                   ?>
                    <label for="other">ลาอื่นๆ : </label>
                        <input type="text" id="other" name="other" value = "<?php echo $rbe["other"]?>" readonly>&emsp; วัน
                    <br><br>
                    <?php endwhile; ?>  


                        <input type="submit"  value="คำนวณ"> &emsp;
                        </div>
                    </p>           
                </form>
                
             
            </div>
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







</body>

</html>