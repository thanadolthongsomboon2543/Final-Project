<!DOCTYPE html>
<html>
<?php include "connect.php"?>
<?php
$title = $_GET["title"];
$fname = $_GET["fname"];
$lname = $_GET["sname"];
$nname = $_GET["nname"];
$idem = $_GET["idem"];
$gender = $_GET["gender"];
$department = $_GET["department"];
$position = $_GET["position"];
$citizen = $_GET["citizen"];
$bdaymonth = $_GET["bdaymonth"];
$age = $_GET["age"];
$weight = $_GET["weight"];
$height = $_GET["height"];
$address = $_GET["address"];
$district = $_GET["district"];
$amphoe = $_GET["amphoe"];
$province = $_GET["province"];
$zipcode = $_GET["zipcode"];
$contact = $_GET["contact"];
$email = $_GET["email"];
$startwork = $_GET["startwork"];
$endwork = $_GET["endwork"];
$trialwork = $_GET["trialwork"];
$date = $_GET["date"];
$update = $_GET["update"];
$salary = $_GET["salary"];
$savings = $_GET["savings"];
$type = $_GET["type"];

$stmt=$pdo->prepare("UPDATE profiles_employee SET prefix_em = ? , firstname_em = ? , lastname_em = ?
, nickname_em = ? , gender_em = ? , id_em = ? , department_em = ? , position_em = ? , citizen_em = ? 
, birthday_em = ? , age_em = ? , weight_em = ? , height_em = ? , address_house_em = ? , district_house_em = ? , 
amphoe_house_em = ? , province_house_em = ? , zipcode_house_em = ? , phone_em = ? , email_em = ? , startwork_em = ? 
, endwork_em = ? , trialwork_em = ? , date_em = ? , update_em = ? , salary_em = ? , savings_em = ? , type_em = ?  
 WHERE id_em=?");

/* $stmt->execute([$fname_em,$idem]); */
$stmt->bindParam(1, $title); 
$stmt->bindParam(2, $fname);
$stmt->bindParam(3, $lname);
$stmt->bindParam(4, $nname);
$stmt->bindParam(5, $gender); 
$stmt->bindParam(6, $idem);
$stmt->bindParam(7, $department);
$stmt->bindParam(8, $position);
$stmt->bindParam(9, $citizen); 
$stmt->bindParam(10, $bdaymonth);
$stmt->bindParam(11, $age);
$stmt->bindParam(12, $weight);
$stmt->bindParam(13, $height); 
$stmt->bindParam(14, $address);
$stmt->bindParam(15, $district);
$stmt->bindParam(16, $amphoe);
$stmt->bindParam(17, $province); 
$stmt->bindParam(18, $zipcode);
$stmt->bindParam(19, $contact);
$stmt->bindParam(20, $email);
$stmt->bindParam(21, $startwork); 
$stmt->bindParam(22, $endwork);
$stmt->bindParam(23, $trialwork);
$stmt->bindParam(24, $date);
$stmt->bindParam(25, $update); 
$stmt->bindParam(26, $salary);
$stmt->bindParam(27, $salary);
$stmt->bindParam(28, $type);
$stmt->bindParam(29, $idem);
$stmt->execute();
Header("Location: profile.php");
?>
</html>