<?php session_start();
if(empty($_SESSION["id_user"]))
{
    Header("Location: Login.php");
}
include("connect.php");
?>
<?php
 $prefix=$_POST["prefix"];
 $fname=$_POST["fname"];
 $sname=$_POST["sname"];
 $emid=$_POST["emid"];
 $department=$_POST["department"];
 $pack=$_POST["pack"];
 $reason=$_POST["reason"];
 $start=$_POST["start"];
 $finish=$_POST["finish"];
 $starttime=$_POST["starttime"];
 $finishtime=$_POST["finishtime"];

if($pack=="ลาป่วย" or $pack=="ลากิจ")
{

$token      = "pKIauJfWbj53HFaMdwpv2TAiMhViyOFQ5Co6hdWVjMX"; //

$fields     = "แจ้งการลา\r\n";
$fields    .= $prefix . " " . $fname . " " . $sname . "\r\n";
$fields    .= $emid . " " . $department . "\r\n";
$fields    .= $pack . " " . $reason . "\r\n";
$fields    .= "ตั้งแต่วันที่" . " " . $start . " " . "ถึง" . " " . $finish . "\r\n";
$fields    .= "เวลา" . " " . $starttime . " " . "ถึง" . " " . $finishtime;

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


}
else{
    

$token      = "pKIauJfWbj53HFaMdwpv2TAiMhViyOFQ5Co6hdWVjMX"; //

            $fields     = "แจ้งการลา\r\n";
            $fields    .= $prefix . " " . $fname . " " . $sname . "\r\n";
            $fields    .= $emid . " " . $department . "\r\n";
            $fields    .= $pack . " " . $reason . "\r\n";
            $fields    .= "ตั้งแต่วันที่" . " " . $start . " " . "ถึง" . " " . $finish;

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
        
        
}






?>


 <?php
    $confirm = "รออนุมัติ";
    $stmt=$pdo->prepare("INSERT INTO leave_form (prefix_em,firstname_em,lastname_em,id_em,department_em,leave_type,details,start_leave,
    end_leave,starttime_leave,endtime_leave,status_leave)
     VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$prefix);
    $stmt->bindParam(2,$fname);
    $stmt->bindParam(3,$sname);
    $stmt->bindParam(4,$emid);
    $stmt->bindParam(5,$department);
    $stmt->bindParam(6,$pack);
    $stmt->bindParam(7,$reason);
    $stmt->bindParam(8,$start);
    $stmt->bindParam(9,$finish);
    $stmt->bindParam(10,$starttime);
    $stmt->bindParam(11,$finishtime);
    $stmt->bindParam(12,$confirm);
    $stmt->execute();  
    Header("Location: historyleave.php");
    ?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
    <body>
   
    </body>
</html>