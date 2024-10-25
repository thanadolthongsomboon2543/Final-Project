<?php include "connect.php" ?>
<?php
if(isset($_POST["query"])){  
	$output = '';  
	$search=$_POST["query"];
	$query="SELECT * FROM users WHERE firstname_em LIKE '%".$_POST["query"]."%' OR id_em LIKE '%".$_POST["query"]."%'  ";
    $stmt=$pdo->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchALL();
	
	if($result){  
	foreach($result as $row){  
			$output .= '<p id="content">'.$row["firstname_em"].' '.$row["lastname_em"].' '.$row["id_em"].' '.$row["department_em"].'</p>';  
		}  
	}else{  
		$output .= '<p id="content">User Not Found</p>';  
	}  


echo $output;  
} 
?>