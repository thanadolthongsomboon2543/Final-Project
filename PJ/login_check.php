<?php
session_start();
include ("connect.php");
    $username = $_POST['email'];
    $password = $_POST['password'];
    $stmt=$pdo->prepare("SELECT * FROM users WHERE email_em=? ");
    $stmt->bindParam(1,$username);
    $stmt->execute();
    if( $stmt->rowCount() == 1)
    {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["id_user"] = $row["id_user"];
        $_SESSION["prefix_em"]=$row["prefix_em"];
        $_SESSION["firstname_em"] = $row["firstname_em"];
        $_SESSION["lastname_em"] = $row["lastname_em"];
        $_SESSION["id_em"] = $row["id_em"];
        $_SESSION["email_em"] = $row["email_em"];
        $_SESSION["passwd"] = $row["passwd"];
        $_SESSION["department_em"] = $row["department_em"];
        $_SESSION["prior_em"] = $row["prior_em"];
        $_SESSION["firstlog_em"] = $row["firstlog_em"];
    

          if($_SESSION["firstlog_em"]== 0)
      {
            if($password==$_SESSION["passwd"])
            {
               header("location:firstlogin.php");   
            }
           else{
            echo "<script>";
            echo "alert(\"Password ไม่ถูกต้อง\");";
            session_destroy();
            echo "window.history.back()";
            echo "</script>";
           }

                                                                                                                                                             
      }

        else if($_SESSION["firstlog_em"]== 1)
         {
            if(password_verify($password,$_SESSION["passwd"]))
             {
              if($_SESSION["prior_em"]=="employee")
          {
               header("Location: menu.php");      
            }
               else if($_SESSION["prior_em"]=="HR" || $_SESSION["prior_em"]=="SV")
         {
             header("Location: menu_hr.php");
           }
             }
             
           else{
            echo "<script>";
            echo "alert(\"Email หรือ  Password ไม่ถูกต้อง\");";
            session_destroy();
            echo "window.history.back()";
            echo "</script>";
           }
       }
    
     
    
    
    }
      else
       {
            echo "<script>";
            echo "alert(\"Email หรือ  Password ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
       }
?>
<!DOCTYPE html>