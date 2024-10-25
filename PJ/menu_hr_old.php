<?php session_start();
//
if (empty($_SESSION["id_user"])) {
    Header("Location: login.php");
}
if ($_SESSION["prior_em"] == "employee") { {
        Header("Location: menu.php");
    }
}
include("connect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/menudecor_old.css">

    <title>หน้าหลัก</title>
</head>

<body>
    <br>
    <div class="menu-container">
        <div class="menu-heading">กรุณาเลือกการทำงาน</div>
        <p>
            <button class="menu-button"><a href="approve_leave.php" class="menu-link">อนุมัติการลา</a></button>
            <button class="menu-button"><a href="approve_ot.php" class="menu-link">อนุมัติ OT</a></button>
            <button class="menu-button"><a href="historyleave.php" class="menu-link">ประวัติการลา</a></button>
            <button class="menu-button"><a href="historyot.php" class="menu-link">ประวัติOT</a></button>
            <button class="menu-button"><a href="checkin_history.php" class="menu-link">ประวัติเข้าออก</a></button>
            <button class="menu-button"><a href="leaveform.php" class="menu-link">แบบฟอร์มลา</a></button>
            <button class="menu-button"><a href="otform.php" class="menu-link">แบบฟอร์ม OT</a></button>
            <button class="menu-button"><a href="HR-tax.php" class="menu-link">คำนวณภาษี</a></button>
            <button class="menu-button"><a href="HR-salary.php" class="menu-link">คำนวณเงินเดือน</a></button>
            <button class="menu-button"><a href="calendar.php" class="menu-link">ปฏิทินวันหยุด</a></button>
            <button class="menu-button"><a href="profile.php" class="menu-link">ข้อมูลส่วนตัว</a></button>
            <button class="menu-button"><a href="resetpass.php" class="menu-link">เปลี่ยนรหัสผ่าน</a></button>
            <button class="menu-button" style="order: 13;"><a href="logout.php" class="menu-link">ออกจากระบบ</a></button>
    </div>

</body>

</html>