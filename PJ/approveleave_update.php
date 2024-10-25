<!DOCTYPE html>
<html>
<?php include "connect.php"?>
<?php
$id_leave= $_GET["id_leave"];
$id_em=$_GET["id_em"];
$status = $_GET["status"];
$start_leave= strtotime($_GET["startleave"]);
$end_leave=strtotime($_GET["endleave"]);
$leavetype=$_GET["leavetype"];
$starttime=strtotime($_GET["starttime"]);
$endtime=strtotime($_GET["endtime"]);


$stmt=$pdo->prepare("SELECT * FROM leave_number where id_em=? ");
$stmt->bindParam(1,$id_em);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$sick=$row["sick_leave"];
$business=$row["business_leave"];
$maternity=$row["maternity_leave"];
$ordination=$row["ordination_leave"];
$vacation =$row["vacation_leave"];
$other=$row["other_leave"];

if($status=="ไม่อนุมัติ")
{
    $stmt=$pdo->prepare("UPDATE leave_form SET status_leave=? WHERE  id_leave=?");
    $stmt->execute([$status,$id_leave]);

    Header("Location: approve_leave.php");
}
else if($status=="อนุมัติ"){

    $stmt=$pdo->prepare("UPDATE leave_form SET status_leave=? WHERE  id_leave=?");
    $stmt->execute([$status,$id_leave]);
    
    
    if($leavetype=="ลาป่วย"){

      $diff= $end_leave - $start_leave;
      $diffh=$endtime - $starttime;
      $days= floor(($diff / (60 * 60 * 24))+1);
      $hours=floor(($diffh / (60 * 60)));
   
      if($days >= 1 and $hours == 0)
      {
         $remained=(double)$sick+$days;
         $stmt=$pdo->prepare("UPDATE leave_number SET sick_leave=? where id_em=?");
         $stmt->bindParam(1,$remained);
         $stmt->bindParam(2,$id_em);
         $stmt->execute();
         Header("Location: approve_leave.php");
      }
      else {
             
         $hourscal=$hours * 0.125;
         $remained=(double)$sick+$hourscal;    

         $stmt=$pdo->prepare("UPDATE leave_number SET sick_leave=? where id_em=?");
         $stmt->bindParam(1,$remained);
         $stmt->bindParam(2,$id_em);
         $stmt->execute();
         Header("Location: approve_leave.php");
      }
      
       
        
     }
    
     else if($leavetype=="ลากิจ"){

      $diff= $end_leave - $start_leave;
      $diffh=$endtime - $starttime;
      $days= floor(($diff / (60 * 60 * 24))+1);
      $hours=floor(($diffh / (60 * 60)));
      if($days >= 1 and $hours == 0)
      {
        $remained=(double)$business+$days;
        $stmt=$pdo->prepare("UPDATE leave_number SET business_leave=? where id_em=?");
        $stmt->bindParam(1,$remained);
        $stmt->bindParam(2,$id_em);
        $stmt->execute();
        Header("Location: approve_leave.php");
      }
      else{
          

         $hourscal=$hours * 0.125;
         $remained=(double)$business+$hourscal;  
         $stmt=$pdo->prepare("UPDATE leave_number SET business_leave=? where id_em=?");
         $stmt->bindParam(1,$remained);
         $stmt->bindParam(2,$id_em);
         $stmt->execute();
         Header("Location: approve_leave.php");


      }

     }
      else if($leavetype=="ลาพักร้อน"){
        $diff= $end_leave - $start_leave;
        $days= floor(($diff / (60 * 60 * 24))+1);
        $remained=(int)$vacation+$days;
        $stmt=$pdo->prepare("UPDATE leave_number SET vacation_leave=? where id_em=?");
        $stmt->bindParam(1,$remained);
        $stmt->bindParam(2,$id_em);
        $stmt->execute();
        Header("Location: approve_leave.php");
     }
     else if($leavetype=="ลาคลอด"){
      $diff= $end_leave - $start_leave;
        $days= floor(($diff / (60 * 60 * 24))+1);
        $remained=(int)$maternity+$days;
        $stmt=$pdo->prepare("UPDATE leave_number SET maternity_leave=? where id_em=?");
        $stmt->bindParam(1,$remained);
        $stmt->bindParam(2,$id_em);
        $stmt->execute();
        Header("Location: approve_leave.php");
     }
     else if($leavetype=="ลาบวช"){
      $diff= $end_leave - $start_leave;
        $days= floor(($diff / (60 * 60 * 24))+1);
        $remained=(int)$ordination+$days;
        $stmt=$pdo->prepare("UPDATE leave_number SET ordination_leave=? where id_em=?");
        $stmt->bindParam(1,$remained);
        $stmt->bindParam(2,$id_em);
        $stmt->execute();
        Header("Location: approve_leave.php");
     }
     else if($leavetype=="ลาอื่นๆ"){
        $diff= $end_leave - $start_leave;
        $days= floor(($diff / (60 * 60 * 24))+1);
        $remained=(int)$other+$days;
        $stmt=$pdo->prepare("UPDATE leave_number SET other_leave=? where id_em=?");
        $stmt->bindParam(1,$remained);
        $stmt->bindParam(2,$id_em);
        $stmt->execute();
        Header("Location: approve_leave.php");
   
  
}
}
?>
</html>