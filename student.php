<?php
require "session.php";
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
            <a class="navbar-brand" href="student.php">
                <h4><img src="logo.png" alt="Logo" style="width:40px;">ทฤษฎีเครื่องมือกล</h4>
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="student.php">หน้าแรก</a>
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
            <hr>
            <?php
            $lessons = array("ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล", "เครื่องมือกลขนาดเล็ก", "เครื่องเลื่อยกล", "เครื่องจักร", "เครื่องกลึง", "เครื่องกัด", "เครื่องเจียรไน");

            for ($i = 1; $i <= 7; $i++) {
                echo '<div><button type="button" class="btn btn-warning m-1"><a class=" nav-link active" href="chapter/chapter' . $i . '/pretest.php">';
                echo 'บทที่ ' . $i . ' ' . $lessons[$i - 1] . '<br>แบบทดสอบก่อนเรียน';
                echo '</a></button></div>';
            }
            ?>
            <hr>
            <a href='logout.php' class="btn btn-danger m-1">ลงชื่อออก</a>
        </div>
    </div>

    <!-- เนื้อหา -->
    <div class="container p-5 my-5 bg-white">
        <h1>ยินดีต้อนรับนักเรียนช่างกลสู่โลกของเทคโนโลยีและการสร้างสรรค์</h1>
        <p>
            &emsp;เรายินดีต้อนรับนักเรียนทุกคนที่มีความมุ่งมั่นและความสนใจในด้านวิชาชีพช่างกล
            ที่จะร่วมสร้างสรรค์และพัฒนาทักษะการเรียนรู้ที่จำเป็นในโลกยุคใหม่ ด้วยเทคโนโลยีและนวัตกรรมที่ไม่หยุดนิ่ง
        </p>
        <p>
            &emsp;ที่นี่คือที่ที่นักเรียนจะได้รับความรู้ทางด้านช่างกลที่ลึกซึ้ง ทั้งทฤษฎีและการปฏิบัติ
            เรามีการฝึกฝนที่ครอบคลุมทุกสาขาของช่างกล ไม่ว่าจะเป็นการซ่อมแซมเครื่องจักร การผลิตอุปกรณ์
            หรือการพัฒนาทักษะการใช้งานเครื่องมือเทคโนโลยีต่างๆ ที่ทันสมัย
        </p>
        <dl>
            <dt>สิ่งที่นักเรียนจะได้รับ:</dt>
            <dd>- <b>ความรู้และทักษะที่สามารถนำไปใช้ในอาชีพ:</b> เราให้การฝึกฝนที่ทันสมัยและตอบโจทย์การทำงานจริงในอุตสาหกรรม</dd>
            <dd>- <b>โอกาสในการพัฒนาและเติบโตในสายงาน:</b> นักเรียนจะได้รับการพัฒนาในทุกมิติ ทั้งด้านทักษะวิชาชีพและการเรียนรู้ด้วยตนเอง</dd>
            <dd>- <b>การสนับสนุนจากทีมอาจารย์ที่มีความเชี่ยวชาญ:</b> ทีมงานอาจารย์ของเราพร้อมที่จะให้คำแนะนำและการสนับสนุนตลอดการเรียน</dd>
        </dl>
        <p>
            &emsp;เราหวังว่าทุกคนจะใช้โอกาสนี้ในการเรียนรู้และพัฒนาตนเองให้เต็มที่
            เพื่อนำไปสู่การประสบความสำเร็จในอนาคตและเป็นส่วนสำคัญในการพัฒนาอุตสาหกรรมช่างกลในประเทศไทย
        </p>
        <div class="text-center">
            <b>&emsp;ขอให้ทุกท่านโชคดีในการเริ่มต้นการเรียนรู้ใหม่!</b>
        </div>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>