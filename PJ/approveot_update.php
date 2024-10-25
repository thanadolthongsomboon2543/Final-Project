<!DOCTYPE html>
<html>
<?php include "connect.php"?>
<?php
$id= $_GET["id"];
$status = $_GET["status"];
$stmt=$pdo->prepare("UPDATE ot_form SET status_ot=? WHERE id_ot=?");
$stmt->execute([$status,$id]);

    Header("Location: approve_ot.php");
?>
</html>