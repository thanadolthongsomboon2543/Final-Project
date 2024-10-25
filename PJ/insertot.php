<?php session_start();
if(empty($_SESSION["id_user"]))
{
    Header("Location: Login.php");
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
    $details=$_POST["details"];
    $dates=$_POST["date"];
    $start=$_POST["start"];
    $end=$_POST["end"];
  




    $token      = "pKIauJfWbj53HFaMdwpv2TAiMhViyOFQ5Co6hdWVjMX"; //ลงทะเบียน line notify แล้วเลือกกลุ่มที่จะใช้จากนั้้นจะได้รหัสมา นำมาใส่ตรงนี้

                $fields     = "แจ้งOT\r\n";
                $fields    .= $prefix . " " . $fname . " " . $sname . "\r\n";
                $fields    .= $emid . " " . $department . "\r\n";
                $fields    .= $details . "\r\n";
                $fields    .= "วันที่" . " " . $dates . " \r\n";
                $fields    .= "เวลา" . " " . $start . " " . $end;
    
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=".$fields);
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'', );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $ch );


    $confirm = "รออนุมัติ";
    $stmt=$pdo->prepare("INSERT INTO ot_form (prefix_em,firstname_em,lastname_em,id_em,department_em,
    details,date_ot,start_ot,end_ot,status_ot)
     VALUES(?,?,?,?,?,?,?,?,?,?)");
     $stmt->bindParam(1,$prefix); 
    $stmt->bindParam(2,$fname);
    $stmt->bindParam(3,$sname);
    $stmt->bindParam(4,$emid);
    $stmt->bindParam(5,$department);
    $stmt->bindParam(6,$details);
    $stmt->bindParam(7,$dates);
    $stmt->bindParam(8,$start);
    $stmt->bindParam(9,$end);
    $stmt->bindParam(10,$confirm);
    $stmt->execute();
    Header("Location: historyot.php");
    ?> 
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
    <body>
    
    </body>
</html>