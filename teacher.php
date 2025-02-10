<?php
require "session.php";

require 'dbConfig.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

// ดึงข้อมูล role จากฐานข้อมูล
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $role = $row['role'];
} else {
    $role = 'student'; // ค่าเริ่มต้นถ้าไม่พบข้อมูล
}

$stmt->close();
$conn->close();

// ถ้า role เป็น student ให้เปลี่ยนเส้นทางไปที่ student.php ทันที
if ($role === 'student') {
    header("Location: student.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>หน้าแรก</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>

    </style>
</head>

<body>
    <!-- พื้นหลัง -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <!-- แถบนำทาง -->
    <nav class="navbar navbar-expand bg-light navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="teacher.php">
                <h4><img src="logo.png" alt="Logo" style="width:40px;">ทฤษฎีเครื่องมือกล</h4>
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="teacher.php">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#demo">เมนู</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ส่วนหัว -->
    <div class="p-5 mt-5 navy text-white text-center">
        <h1>ทฤษฎีเครื่องมือกล</h1>
        <p>รหัสวิชา 20102-2003</p>
    </div>

    <!-- แถบเมนูทางซ้าย -->
    <div class="offcanvas offcanvas-end text-bg-dark" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">เมนู</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <button type="button" class="btn btn-warning m-1">
                <a class=" nav-link active" href="profile.php">โปรไฟล์</a>
            </button>
            <button type="button" class="btn btn-warning m-1">
                <a class="nav-link active" href="score.php">รายชื่อนักเรียน</a>
            </button>
            <hr>
            <?php
            $lessons = array("ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล", "เครื่องมือกลขนาดเล็ก", "เครื่องเลื่อยกล", "เครื่องจักร", "เครื่องกลึง", "เครื่องกัด", "เครื่องเจียรไน");

            for ($i = 1; $i <= 7; $i++) {
                echo '<div class="dropdown p-1">';
                echo '<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">';
                echo 'บทที่ ' . $i . " " . $lessons[$i - 1];
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/lesson.php">บทเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/postest.php">แบบทดสอบหลังเรียน</a></li>';
                echo '</ul>';
                echo '</div>';
            }
            ?>
            <hr>
            <a href='logout.php' class="btn btn-danger m-1">ลงชื่อออก</a>
        </div>
    </div>

    <!-- เนื้อหา -->
    <div class="container p-5 my-5 bg-white">
        <h1>ยินดีต้อนรับสู่โลกของเทคโนโลยีและการสร้างสรรค์สำหรับครูช่างกล</h1>
        <p> &emsp;เรายินดีต้อนรับคณาจารย์ทุกท่านที่มีความมุ่งมั่นและความสนใจในด้านการสอนวิชาชีพช่างกล เพื่อร่วมกันสร้างสรรค์และพัฒนาทักษะการเรียนรู้ให้กับนักเรียนในยุคที่เทคโนโลยีและนวัตกรรมก้าวหน้าอย่างไม่หยุดนิ่ง </p>
        <p> &emsp;ที่นี่คือศูนย์กลางแห่งการเรียนรู้ที่ครูจะได้เสริมสร้างความรู้ด้านช่างกลอย่างลึกซึ้ง ทั้งในภาคทฤษฎีและปฏิบัติ เรามีการฝึกอบรมที่ครอบคลุมทุกสาขาของช่างกล ไม่ว่าจะเป็นการซ่อมบำรุงเครื่องจักร การผลิตอุปกรณ์ หรือการใช้เครื่องมือเทคโนโลยีที่ทันสมัย เพื่อให้สามารถถ่ายทอดองค์ความรู้และทักษะให้กับนักเรียนได้อย่างมีประสิทธิภาพ </p>
        <dl>
            <dt>สิ่งที่ครูจะได้รับ:</dt>
            <dd>- <b>แนวทางการสอนและเทคนิคที่ทันสมัย:</b> เรามีการพัฒนาแนวทางการสอนที่ตอบโจทย์อุตสาหกรรมปัจจุบัน</dd>
            <dd>- <b>โอกาสในการพัฒนาตนเองและความก้าวหน้า:</b> ครูจะได้รับการส่งเสริมให้เติบโตทั้งในด้านทักษะและองค์ความรู้ใหม่ๆ</dd>
            <dd>- <b>การสนับสนุนจากทีมงานผู้เชี่ยวชาญ:</b> เรามีเครือข่ายครูและวิทยากรที่พร้อมให้คำปรึกษาและแลกเปลี่ยนประสบการณ์</dd>
        </dl>
        <p> &emsp;เราหวังว่าคณาจารย์ทุกท่านจะใช้โอกาสนี้ในการพัฒนาทักษะและเพิ่มพูนความรู้ เพื่อนำไปสู่การสร้างบุคลากรที่มีคุณภาพและเป็นกำลังสำคัญในการพัฒนาอุตสาหกรรมช่างกลของประเทศไทย </p>
        <div class="text-center"> <b>&emsp;ขอให้ทุกท่านประสบความสำเร็จในการถ่ายทอดความรู้และสร้างแรงบันดาลใจให้กับนักเรียน!</b> </div>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>