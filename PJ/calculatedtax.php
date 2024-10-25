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
    include("connect.php");
?>
<!DOCTYPE html>
<?php
$prefix=$_POST["prefix"];
$firstname=$_POST["fname"];
$lastname=$_POST["sname"];
$emid=$_POST["emid"];
$department=$_POST["department"];
$salary=$_POST["salary"];
$salary_year=$_POST["salary_year"];
$cost=$_POST["cost"];
$parent=$_POST["parent"];
$spouse=$_POST["spouse"];
$childnum=$_POST["childnum"];
$child=$_POST["child"];
$adopt1=$_POST["adopt1"];
$adopt2=$_POST["adopt2"];
$adopt3=$_POST["adopt3"];
$disabled=$_POST["disabled"];
$insurance=$_POST["insurance"];
$linsurance=$_POST["linsurance"];
$phealth=$_POST["phealth"];
$rmf=$_POST["rmf"];
$ssf=$_POST["ssf"];
$pvd=$_POST["fname"];
$saving=$_POST["saving"];
$fsaving=$_POST["fsaving"];
$pension=$_POST["pension"];
$education=$_POST["education"];
$other=$_POST["other"];
$interest=$_POST["interest"];

$sumtax=(int)$cost+(int)$parent+(int)$spouse+(int)$child+(int)$adopt1+(int)$adopt2+(int)$adopt3
+(int)$disabled+(int)$insurance+(int)$linsurance+(int)$phealth
+(int)$rmf+(int)$ssf+(int)$pvd+(int)$saving+(int)$fsaving+(int)$pension+(int)$education+(int)$other+(int)$interest;

$netincome=(int)$salary_year-$sumtax;

if($netincome <= 150000)
{  
  $taxyear  = 0;
  $taxmonth = 0;
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,
  id_em,department_em,tax_year,tax_month)   VALUES(?,?,?,?,?,?,?)");
  $stmt->bindParam(1,$prefix);
  $stmt->bindParam(2,$firstname);
  $stmt->bindParam(3,$lastname);
  $stmt->bindParam(4,$emid);
  $stmt->bindParam(5,$department);
  $stmt->bindParam(6,$taxyear);
  $stmt->bindParam(7,$taxmonth);
  $stmt->execute();
}
else if($netincome >= 150001 || $netincome <= 300000)
{
  $taxyear = ($netincome - 150000)*(5/100);
  $taxmonth = round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
   VALUES(?,?,?,?,?,?,?)");
  $stmt->bindParam(1,$prefix);
  $stmt->bindParam(2,$firstname);
  $stmt->bindParam(3,$lastname);
  $stmt->bindParam(4,$emid);
  $stmt->bindParam(5,$department);
  $stmt->bindParam(6,$taxyear);
  $stmt->bindParam(7,$taxmonth);
  $stmt->execute();
}
else if($netincome >= 300001 || $netincome <= 500000)
{
  $taxyear = [($netincome - 300000)*(10/100)]+7500 ;
  $taxmonth = round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
   VALUES(?,?,?,?,?,?,?)");
  $stmt->bindParam(1,$prefix);
  $stmt->bindParam(2,$firstname);
  $stmt->bindParam(3,$lastname);
  $stmt->bindParam(4,$emid);
  $stmt->bindParam(5,$department);
  $stmt->bindParam(6,$taxyear);
  $stmt->bindParam(7,$taxmonth);
  $stmt->execute();
}
else if($netincome >= 500001 || $netincome <= 750000)
{
  $taxyear = [($netincome - 500000)*(15/100)]+27500 ;
  $taxmonth =  round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
   VALUES(?,?,?,?,?,?,?)");
  $stmt->bindParam(1,$prefix);
  $stmt->bindParam(2,$firstname);
  $stmt->bindParam(3,$lastname);
  $stmt->bindParam(4,$emid);
  $stmt->bindParam(5,$department);
  $stmt->bindParam(6,$taxyear);
  $stmt->bindParam(7,$taxmonth);
  $stmt->execute();
}

else if($netincome >= 750001 || $netincome <= 1000000)
{
  $taxyear = [($netincome - 750000)*(20/100)]+65000 ;
  $taxmonth =  round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
  VALUES(?,?,?,?,?,?,?)");
 $stmt->bindParam(1,$prefix);
 $stmt->bindParam(2,$firstname);
 $stmt->bindParam(3,$lastname);
 $stmt->bindParam(4,$emid);
 $stmt->bindParam(5,$department);
 $stmt->bindParam(6,$taxyear);
 $stmt->bindParam(7,$taxmonth);
 $stmt->execute();
}
else if($netincome >= 1000001 || $netincome <= 2000000)
{
  $taxyear = [($netincome - 1000000)*(25/100)]+115000 ;
  $taxmonth = round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
  VALUES(?,?,?,?,?,?,?)");
 $stmt->bindParam(1,$prefix);
 $stmt->bindParam(2,$firstname);
 $stmt->bindParam(3,$lastname);
 $stmt->bindParam(4,$emid);
 $stmt->bindParam(5,$department);
 $stmt->bindParam(6,$taxyear);
 $stmt->bindParam(7,$taxmonth);
 $stmt->execute();
}
else if($netincome >= 2000001 || $netincome <= 5000000)
{
  $taxyear = [($netincome - 2000000)*(30/100)]+365000 ;
  $taxmonth =  round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
  VALUES(?,?,?,?,?,?,?)");
 $stmt->bindParam(1,$prefix);
 $stmt->bindParam(2,$firstname);
 $stmt->bindParam(3,$lastname);
 $stmt->bindParam(4,$emid);
 $stmt->bindParam(5,$department);
 $stmt->bindParam(6,$taxyear);
 $stmt->bindParam(7,$taxmonth);
 $stmt->execute();
}
else if($netincome >= 5000001)
{
  $taxyear = [($netincome - 5000000)*(35/100)]+1265000 ; 
  $taxmonth = round(($taxyear/12),2);
  $stmt=$pdo->prepare("INSERT INTO tax_employee(prefix_em,firstname_em,lastname_em,id_em,department_em,tax_year,tax_month)
   VALUES(?,?,?,?,?,?,?)");
  $stmt->bindParam(1,$prefix);
  $stmt->bindParam(2,$firstname);
  $stmt->bindParam(3,$lastname);
  $stmt->bindParam(4,$emid);
  $stmt->bindParam(5,$department);
  $stmt->bindParam(6,$taxyear);
  $stmt->bindParam(7,$taxmonth);
  $stmt->execute();
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/taxdecor.css">
  <link rel="stylesheet" href="CSS/sidemenu.css">
  <title>คำนวณภาษีเสร็จสิ้น</title>
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
<h3>ทำการคำนวณและบันทึกข้อมูลเรียบร้อยแล้ว<h3>

    <font size="2" border="1" cellpadding='2' face="Arial">
                <table>
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>รหัสประจำตัวพนักงาน</th>
                        <th>แผนก</th>
                        <th>ภาษีรายปี</th>
                        <th>ภาษีรายเดือน</th>
                    </tr>
                    <tr>
                       <th><?php echo $prefix ?> &emsp;<?php echo $firstname ?> &emsp; <?php echo $lastname ?></th>
                       <th><?php echo $emid ?> </th>
                       <th><?php echo $department ?> </th>
                       <th><?php echo $taxyear ?> </th>
                       <th><?php echo $taxmonth ?> </th>

                    </tr>
</table>


<form action="HR-tax.php" >
    <button class="button" >กลับไป</button>
</section>
</article>
</form>
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