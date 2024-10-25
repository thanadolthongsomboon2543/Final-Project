<?php session_start();
//
if (empty($_SESSION["id_user"])) {
    Header("Location: login.php");
} else if ($_SESSION["prior_em"] == "HR") { {
        Header("Location: menu_hr.php");
    }
}
else if ($_SESSION["prior_em"] == "SV") { {
    Header("Location: menu_sv.php");
}
}
include("connect.php");
?>
<html lang="en">

<head>
    <title>หน้าหลัก</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/w3css/3/w3.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>

<body>
<p>
        <img src="https://www.energymobile.net/img_cus_sale/images/logo-login-page1.png" alt="Logo" width="170" height="50">
        
</p>
</body>

    <div class="navbar">

        <a href="historyleave.php">ประวัติการลา </a>
        <a href="historyot.php">ประวัติOT </a>
        <a href="leaveform.php">แบบฟอร์มลา </a>
        <a href="otform.php">แบบฟอร์ม OT </a>
        <a href="calendar.php">ปฏิทินวันหยุด </a>
        <a href="profile.php">ข้อมูลส่วนตัว </a>
        <a href="resetpass.php">เปลี่ยนรหัสผ่าน </a>
        <a href="logout.php" class="right">ออกจากระบบ </a>
    </div>

    <div class="row">
        <div class="main">
            <?php
            // Get the current date and time
            $currentDateTime = date("Y-m-d H:i:s");

            // Display the current date and time
            echo "เวลาปัจจุบัน : " . $currentDateTime;
            ?>
            &emsp;&emsp;
            ยินดีต้อนรับ &emsp;
            <?php echo $_SESSION["prefix_em"]; ?>&emsp;
            <label for="fname sname"></label>
            <?php echo $_SESSION["firstname_em"] . ' ' . $_SESSION["lastname_em"]; ?>
            &emsp;
            <label for="emid">รหัสประจำตัว : </label>
            <?php echo $_SESSION["id_em"]; ?>

            <div class="main">
                <div>
                    <br>
                
                    <br>

                </div>
            </div>
        </div>
        <footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">

            <p class="w3-medium">
                ติดต่อเราได้ที่ ที่อยู่: 26 ถนนเฉลิมพระเกียรติ ร.9 ซอย 7 แขวงหนองบอน เขตประเวศ กทม.
                โทร: 0 2185 6336
                อีเมล: gbsystem.th@gmailcom</a>
            </p>
        </footer>

</body>

</html>