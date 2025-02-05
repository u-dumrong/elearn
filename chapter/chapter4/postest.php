<?php
require "../../session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>แบบทดสอบก่อนเรียน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css">
    <style>

    </style>
</head>

<body>
    <!-- พื้นหลัง -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <!-- แถบนำทาง -->
    <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="../../student.php">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#demo">เมนู</a>
                </li>
            </ul>

            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Logout</a>
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
    <div class="offcanvas offcanvas-start text-bg-dark" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">เมนู</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <?php
        for ($i = 1; $i <= 7; $i++) {
            echo '<div class="dropdown dropend p-1">';
            echo '<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">';
            echo 'บทที่ ' . $i;
            echo '</button>';
            echo '<ul class="dropdown-menu">';
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/lesson.php">บทเรียน</a></li>';
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/postest.php">แบบทดสอบหลังเรียน</a></li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
    </div>
    </div>

    <!-- แบบทดสอบ -->
    <div class="container p-5 my-5 bg-white">
        <h1 class="text-center navyf">แบบทดสอบหลังเรียน</h1>
        <h2 class="text-danger text-center">บทที่ 4. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1.ส่วนประกอบใดของเครื่องเจาะตั้งโต๊ะที่มีลักษณะเป็นรูปทรงกระบอกกลวงและใช้ประกอบส่วนต่าง ๆ ของเครื่องเจาะเข้าด้วยกัน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">โต๊ะงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">เสาเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">ฐานเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">ชุดหัวเครื่อง</label>

                <p class="mt-5">2.ส่วนประกอบใดของเครื่องเจาะตั้งโต๊ะทำหน้าที่จับยึดชิ้นงานขนาดใหญ่ หรือรองรับอุปกรณ์จับยึดชิ้นงานอย่างอื่น</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="1">
                    <label class="form-check-label" for="radio1">โต๊ะงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="2">
                    <label class="form-check-label" for="radio2">เสาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="3">
                    <label class="form-check-label" for="radio3">ฐานเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="4">
                    <label class="form-check-label" for="radio4">ชุดหัวเครื่อง</label>
                </div>

                <p class="mt-5">3.โต๊ะงานของเครื่องเจาะตั้งโต๊ะสามารถเคลื่อนที่ขึ้น-ลงตามเสาเครื่องได้ด้วยส่วนประกอบใด </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="1">
                    <label class="form-check-label" for="radio1">มอเตอร์</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="2">
                    <label class="form-check-label" for="radio2">มือหมุนป้อนเจาะง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="3">
                    <label class="form-check-label" for="radio3">ชุดสายพานส่งกำลัง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="4">
                    <label class="form-check-label" for="radio4">เฟืองสะพาน</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 4-6</p>
                <img src="postest/Q4-6.PNG" alt="pic" style="width:70%">
                <p class="mt-5">4.หมายเลข 1 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">ให้โต๊ะงานเคลื่อนที่ขึ้น-ลงตามเสาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">ช่วยในการจับยึดชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">ล็อกโต๊ะงานไม่ให้หมุนรอบเสาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">ใช้ประกอบฐานเครื่องและโต๊ะงานเข้าด้วยกัน</label>
                </div>

                <p class="mt-5">5.ใช้หมุนเพื่อให้โต๊ะงานเคลื่อนที่ขึ้น-ลงตามเสาเครื่อง คือ หน้าที่ของหมายเลขอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 1 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 2 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 3</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 5</label>
                </div>

                <p class="mt-5">6.หมายเลข 4 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="1">
                    <label class="form-check-label" for="radio1">ลดน้ำหนักของโต๊ะงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="2">
                    <label class="form-check-label" for="radio2">รองรับน้ำหล่อเย็น</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="3">
                    <label class="form-check-label" for="radio3">ช่วยในการจับยึดชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="4">
                    <label class="form-check-label" for="radio4">รองรับเศษเจาะ</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 7-8</p>
                <img src="postest/Q7-8.PNG" alt="pic" style="width:70%">
                <p class="mt-5">7.หมายเลข 1 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">เปิด-ปิดการทำงานของเครื่องเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">ประกอบก้านเรียวของหัวจับดอกสว่านหรือดอกสว่านก้านเรียว</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">ขับแกนเพลาของเครื่องเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">เลื่อนโต๊ะงานขึ้น-ลงตามเสาเครื่อง</label>
                </div>

                <p class="mt-5">8.หมายเลข 4 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="1">
                    <label class="form-check-label" for="radio1">เลื่อนโต๊ะงานขึ้น-ลงตามเสาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="2">
                    <label class="form-check-label" for="radio2">ส่งกำลังขับแกนเพลาของเครื่องเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="3">
                    <label class="form-check-label" for="radio3">เปิด-ปิดการทำงานของเครื่องเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="4">
                    <label class="form-check-label" for="radio4">ต้นกำลังขับแกนเพลาของเครื่องเจาะ</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 9-11</p>
                <img src="postest/Q9-11.PNG" alt="pic" style="width:70%">
                <p class="mt-5">9.หมายเลข 3 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="1">
                    <label class="form-check-label" for="radio1">ปรับตั้งความเร็วรอบ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="2">
                    <label class="form-check-label" for="radio2">ปรับตั้งความลึกในการป้อนเจาะ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="3">
                    <label class="form-check-label" for="radio3">หมุนป้อนเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="4">
                    <label class="form-check-label" for="radio4">ล็อกมือหมุนป้อนเจาะ</label>
                </div>

                <p class="mt-5">10.หมายเลข 4 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="1">
                    <label class="form-check-label" for="radio1">ปรับตั้งความลึกในการป้อนเจาะ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="2">
                    <label class="form-check-label" for="radio2">ปรับตั้งความเร็วรอบ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="3">
                    <label class="form-check-label" for="radio3">หมุนป้อนเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="4">
                    <label class="form-check-label" for="radio4">ล็อกมือหมุนป้อนเจาะ</label>
                </div>

                <p class="mt-5">11.ใช้ปรับตั้งความลึกในการป้อนเจาะ</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 5 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 4 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 3 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 2 </label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 12-15 </p>
                <img src="postest/Q12-15.PNG" alt="pic" style="width:70%">
                <p class="mt-5">12.ส่วนประกอบหมายเลข 1 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="1">
                    <label class="form-check-label" for="radio1">เป็นต้นกำลังของเครื่องเจาะ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="2">
                    <label class="form-check-label" for="radio2">เปิด-ปิดการทำงานของเครื่อง </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="3">
                    <label class="form-check-label" for="radio3">จับยึดหัวจับดอกสว่าน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="4">
                    <label class="form-check-label" for="radio4">ปรับตั้งความเร็วรอบ</label>
                </div>

                <p class="mt-5">13.ส่วนประกอบหมายเลข 2 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="1">
                    <label class="form-check-label" for="radio1">เป็นต้นกำลังของเครื่องเจาะ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="2">
                    <label class="form-check-label" for="radio2">เปิด-ปิดการทำงานของเครื่อง </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="3">
                    <label class="form-check-label" for="radio3">จับยึดหัวจับดอกสว่าน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="4">
                    <label class="form-check-label" for="radio4">ปรับตั้งความเร็วรอบ</label>
                </div>

                <p class="mt-5">14.ส่วนประกอบหมายเลข 3 มีชื่อเรียกว่าอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="1">
                    <label class="form-check-label" for="radio1">เสาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="2">
                    <label class="form-check-label" for="radio2">แขนปรับความเร็วรอบ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="3">
                    <label class="form-check-label" for="radio3">แขนรัศมี</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="4">
                    <label class="form-check-label" for="radio4">แกนเพลา</label>
                </div>

                <p class="mt-5">15.ส่วนประกอบหมายเลข 3 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="1">
                    <label class="form-check-label" for="radio1">ปรับตั้งความเร็วรอบ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="2">
                    <label class="form-check-label" for="radio2">ใช้ติดตั้งชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="3">
                    <label class="form-check-label" for="radio3">เปิด-ปิดการทำงานของเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="4">
                    <label class="form-check-label" for="radio4">ล็อกแกนเพลาของเครื่อง</label>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="button" class="btn navy text-white mt-3" id="checkAnswers">ยืนยัน</button>
                </div>
        </form>
    </div>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="postest.js" defer></script>
</body>

</html>