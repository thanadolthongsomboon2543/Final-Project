<?php session_start();
    //
    if(empty($_SESSION["id_user"]))
    {
        Header("Location: login.php");
    }
    else if(  $_SESSION["prior_em"] == "employee")
    {
        {
        Header("Location: menu.php");
        }
    }
    else if($_SESSION["prior_em"] == "SV")
    {
        {
            Header("Location: menu_hr.php");
            }
    }

    include("connect.php");
?>
<!DOCTYPE html>
<?php

$prefix=$_POST["prefix"];
$fname=$_POST["fname"];
$sname=$_POST["sname"];
$emid=$_POST["emid"];
$department=$_POST["department"];
$salary=$_POST["salary"];
$bonus=$_POST["bonus"];
$checkin=$_POST["checkin"];
$late=$_POST["late"];
//$latemin=$_POST["latemin"];
$tax=$_POST["tax"];
$ot=$_POST["ot"];
$sick=$_POST["sick"];
$business=$_POST["business"];
$maternity=$_POST["maternity"];
$ordination=$_POST["ordination"];
$other=$_POST["other"];
$vacation=$_POST["vacation"];

$ottotal=round(((double)$salary/30/8),2)*1.5*(int)$ot;

if($salary >= 15000)
{
    $insurance=750;
}
else{
    $insurance= round(((double)$salary*5)/100 );
}

$saladay=(double)$salary/30 ;

$totallate=round(((double)$salary/30/8/60),2)*$late;




if($checkin == 30)
{
       $salamonth=$saladay*(int)$checkin;
       $totalsalary=round((($salamonth-$insurance-(double)$tax)+$ottotal+$bonus),2);
       $stmt=$pdo->prepare("INSERT INTO salary_employee (prefix_em,firstname_em,lastname_em,id_em,department_em,salary_em,ot_em)
        VALUE(?,?,?,?,?,?,?) " );
         $stmt->bindParam(1,$prefix);
         $stmt->bindParam(2,$fname);
         $stmt->bindParam(3,$sname);
         $stmt->bindParam(4,$emid);
         $stmt->bindParam(5,$department);
         $stmt->bindParam(6,$totalsalary);
         $stmt->bindParam(7,$ottotal);
         $stmt->execute();
}
else if($checkin < 30)
{
     $sumleave=(double)$sick+(double)$business+(int)$maternity+(int)$ordination+(int)$other+(int)$vacation;
     $sumcheck= (double)$checkin + $sumleave;
      if($sumcheck == 30)
      {
        $salamonth=$saladay*$sumcheck;
        $totalsalary=round((($salamonth-$insurance-(double)$tax)+$ottotal+$bonus),2);
          
        $stmt=$pdo->prepare("INSERT INTO salary_employee (prefix_em,firstname_em,lastname_em,id_em,department_em,salary_em,ot_em)
        VALUE(?,?,?,?,?,?,?) " );
         $stmt->bindParam(1,$prefix);
         $stmt->bindParam(2,$fname);
         $stmt->bindParam(3,$sname);
         $stmt->bindParam(4,$emid);
         $stmt->bindParam(5,$department);
         $stmt->bindParam(6,$totalsalary);
         $stmt->bindParam(7,$ottotal);
         $stmt->execute();

      }
       else if($sumcheck > 30){
       $overleave= $sumcheck-30;
       $overamount=$overleave*$saladay;
       $salamonth=$saladay*30;
       $totalsalary=round((($salamonth-$insurance-(double)$tax-$overamount)+$ottotal+$bonus),2);
       $stmt=$pdo->prepare("INSERT INTO salary_employee (prefix_em,firstname_em,lastname_em,id_em,department_em,salary_em,ot_em)
        VALUE(?,?,?,?,?,?,?) " );
         $stmt->bindParam(1,$prefix);
         $stmt->bindParam(2,$fname);
         $stmt->bindParam(3,$sname);
         $stmt->bindParam(4,$emid);
         $stmt->bindParam(5,$department);
         $stmt->bindParam(6,$totalsalary);
         $stmt->bindParam(7,$ottotal);
         $stmt->execute();
       }
      else if($sumcheck < 30)
      {
                 $checklate=$sumcheck+(int)$late;
                 if($checklate == 30 )
                 {
                    $salamonth=$saladay*$checklate;
                    $totalsalary=round((($salamonth-$insurance-(double)$tax-$totallate)+$ottotal+$bonus),2);
                    $stmt=$pdo->prepare("INSERT INTO salary_employee (prefix_em,firstname_em,lastname_em,id_em,department_em,salary_em,ot_em)
                     VALUE(?,?,?,?,?,?,?) " );
                      $stmt->bindParam(1,$prefix);
                      $stmt->bindParam(2,$fname);
                      $stmt->bindParam(3,$sname);
                      $stmt->bindParam(4,$emid);
                      $stmt->bindParam(5,$department);
                      $stmt->bindParam(6,$totalsalary);
                      $stmt->bindParam(7,$ottotal);
                      $stmt->execute();
                 }
                 else if($checklate < 30)
                 {
                    $salamonth=$saladay*$checklate;
                    $totalsalary=round((($salamonth-$insurance-(double)$tax-$totallate)+$ottotal+$bonus),2);
                    $stmt=$pdo->prepare("INSERT INTO salary_employee (prefix_em,firstname_em,lastname_em,id_em,department_em,salary_em,ot_em)
                     VALUE(?,?,?,?,?,?,?) " );
                      $stmt->bindParam(1,$prefix);
                      $stmt->bindParam(2,$fname);
                      $stmt->bindParam(3,$sname);
                      $stmt->bindParam(4,$emid);
                      $stmt->bindParam(5,$department);
                      $stmt->bindParam(6,$totalsalary);
                      $stmt->bindParam(7,$ottotal);
                      $stmt->execute();
                 }
      }

}



?>  
 <html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/sidemenu.css">
    <link rel="stylesheet" href="CSS/salarydecor.css">
    <title>คำนวณเงินเดือน</title>
    <style>
 table {
    font-family: arial, sans-serif;
    border: 1px solid black;
    border-collapse: collapse;
    background-color: lightyellow;
    text-size-adjust: 10%;
    width: 100%;
}

td,
th {
    border: 1px solid black;
    text-align: center;
    padding: 5px;
}

th:nth-child(even),
th:nth-child(odd) {
    background-color: #dddddd;
}
        </style>
</head>
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


    <h3>ทำการคำนวณและบันทึกข้อมูลเรียบร้อยแล้ว<h3>

<font size="2" border="1" cellpadding='2' face="Arial">
            <table>
                <tr>
                    <th>ชื่อ-นามสกุล</th>
                    <th>รหัสประจำตัวพนักงาน</th>
                    <th>แผนก</th>
                    <th>เงินเดือน</th>
                    <th>OT</th>
                </tr>
                <tr>
                   <th><?php echo $prefix ?> &emsp;<?php echo $fname?> &emsp; <?php echo $sname ?></th>
                   <th><?php echo $emid ?> </th>
                   <th><?php echo $department ?> </th>
                   <th><?php echo $totalsalary ?> </th>
                   <th><?php echo $ottotal  ?> </th>
                </tr>


</table>
<form action="HR-salary.php" >
    <button class="button" >กลับไป</button>
</section>
<script>
   function show() {
      document.getElementById("mySidebar").style.width = "230px";
   }
   function hide() {
      document.getElementById("mySidebar").style.width = "0";
   }
   </script>
</article>


<body>
</html>