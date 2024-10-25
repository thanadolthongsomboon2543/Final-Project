<?php include("connect.php"); ?>
<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/approvedecor.css">
<link rel="stylesheet" href="CSS/sidedecor.css">
<style>
  
 table {
  font-family: arial, sans-serif;
  border: 1px solid black;
  border-collapse: collapse;
  background-color: lightyellow;
  text-size-adjust: 20%;
  width: 100%;
}

td,
th {
  border: 1px solid black;
  text-align: center;
  padding: 8px;
}

th:nth-child(even),
th:nth-child(odd) {
  background-color: #dddddd;
}
#search {
   width: 250px;
}
  </style>



<script>
 function checking(){       

var selected= document.getElementById("pack").value;

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
  <article>
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
             $a="000090";
               $stmt=$pdo->prepare("SELECT * FROM leave_number where id_em=? ");
               $stmt->bindParam(1,$a);
               $stmt->execute();
               while($row=$stmt->fetch()):
               ?>
                    <tr>
                       <td><?php echo $row["sick_leave"]; ?> </td>
                       <td><?php echo $row["vacation_leave"]; ?> </td>
                       <td><?php echo $row["business_leave"]; ?> </td>
                       <td><?php echo $row["ordination_leave"]; ?> </td>
                       <td><?php echo $row["maternity_leave"]; ?> </td>
                       <td><?php echo $row["other_leave"]; ?> </td>
                      </tr>
                <?php endwhile; ?>    
                   </table>

<br><br>
                   <font size="2" face="Arial">
                <table>

                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>รหัสพนักงาน</th>
                        <th>แผนก</th>
                        <th>วันที่</th>
                        <th>เวลาเริ่ม</th>
                        <th>เวลาสิ้นสุด</th>
                        <th>หมายเหตุ</th>
                        <th>สถานะ</th>

                    </tr>
                    <?php 
                $stmt=$pdo->prepare("SELECT * FROM ot_form WHERE id_em=?");
                $stmt->bindParam(1,$a);
                $stmt->execute();
                while($row=$stmt->fetch()):
                ?>
                    <tr>
                        <td><?php echo $row["id_ot"]?></td>
                        <td><?php echo $row["prefix_em"]?>&emsp; <?php echo $row["firstname_em"]?> &emsp; <?php echo $row["lastname_em"]?> </td>
                        <td><?php echo $row["id_em"]?></td>
                        <td><?php echo $row["department_em"]?></td>
                        <td><?php echo $row["date_ot"]?></td>
                        <td><?php echo $row["start_ot"]?></td>
                        <td><?php echo $row["end_ot"]?></td>
                        <td><?php echo $row["details"]?></td>
                        <td><?php echo $row["status_ot"]?></td>
                    </tr>
                    <?php endwhile; ?>    
                </table>


<br>
                <p> phpinfo()</p>
                <?php
echo 'Current PHP version: ' ;
?>
<br><br>    
<form>  
  <label for="emp">เลือก:</label>   
  <input list="emp" for="emp" id="search">
  <datalist id="emp">
<?php
               $stmt=$pdo->prepare("SELECT * FROM users ");
               $stmt->execute();
               while($row=$stmt->fetch()):
               ?>
                <option value=" <?php echo $row['prefix_em']?> <?php echo $row['firstname_em']?> <?php echo $row['lastname_em']?> <?php echo $row["id_em"]?> <?php echo $row['department_em']?> "></option>
                <?php endwhile; ?>
               </datalist>
<input type="submit" value="ค้นหา">
               </form>
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
                 $a="000152";
               $y=date("y");
  $stmt=$stmt=$pdo->prepare("SELECT * FROM leave_vacation where id_em=? and year_leave=?" );
 $stmt->bindParam(1,$a);
 $stmt->bindParam(2,$y);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
  <input type="hidden" id="vacationcheck" name="vacationcheck" value="<?php echo $row["leavenumber_em"]; ?>" readonly >


             <?php 
                $a="000152";
               $stmt=$pdo->prepare("SELECT * FROM leave_number WHERE id_em=?" );
               $stmt->bindParam(1,$a);
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
                   
              

                   <form action="leaveday.php" method="post" onsubmit="return checking()">
                   <label for="pack">ประเภทการลา:</label>
     <select id="pack" name="pack" required>
         <option value="select">เลือก</option>
         <option value="ลาป่วย">ลาป่วย</option>
         <option value="ลาพักร้อน">ลาพักร้อน</option>
         <option value="ลากิจ">ลากิจ</option>
         <option value="ลาบวช">ลาบวช</option>  
         <option value="ลาคลอด">ลาคลอด</option>
         <option value="ลาอื่นๆ">ลาอื่นๆ</option>
     </select>
          <br><br>
                   <input type="submit" class="button" value="ส่ง" >
               </form>



               <form action="demo_form.asp" method="get">
  <input list="browsers" name="browser">
  <datalist id="browsers">
    <option value="a"></option>
    <option value="b"></option>
    <option value="c"></option>
    <option value="d"></option>
    <option value="e"></option>
    <option value="f"></option>
    <option value="g"></option>
    <option value="h"></option>
    <option value="i"></option>
    <option value="j"></option>
    <option value="k"></option>
    <option value="l"></option>
    <option value="m"></option>
    <option value="n"></option>
    <option value="o"></option>
    <option value="p"></option>
    <option value="q"></option>
    <option value="r"></option>
    <option value="s"></option>
    <option value="t"></option>
    <option value="u"></option>
    <option value="v"></option>
    <option value="w"></option>
    <option value="x"></option>
    <option value="y"></option>
    <option value="z"></option>
    <option value="abc"></option>
    <option value="def"></option>
    <option value="ghi"></option>
    <option value="jkl"></option>
    <option value="mno"></option>
    <option value="pqrs"></option>
    <option value="tuv"> </option>
  </datalist>
  <input type="submit">

</form>



<form class="search" method="POST">
      
    <div class="searchcontainer">
    <p>ค้นหาพนักงาน:<p>
    <div id="searchbox">
      <input type="text" name="search" id="search" size="42" autocomplete="off">
      <button class="bttn" type="submit">ค้นหา</button>
      <div id="userList"></div>    
    </div>
</div>   
  </form>







  
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



                </article>
</body>
</html>