<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "tutorial"; /* Database name */

$con = mysqli_connect("localhost", "root", "","hr_data");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}