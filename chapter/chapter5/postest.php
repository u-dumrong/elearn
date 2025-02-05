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
        <h2 class="text-danger text-center">บทที่ 5. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1.ข้อใด คือ หลักการทำงานของเครื่องกลึงยันศูนย์</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">ชิ้นงานหมุนรอบตัวเอง แล้วเคลื่อนที่เครื่องมือตัดเข้าตัดเฉือนชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">เครื่องมือตัดเคลื่อนที่ตามสะพานแท่นเครื่อง แล้วเข้าตัดเฉือนชิ้นงานที่หยุดนิ่ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องมือตัดหมุนรอบตัวเอง แล้วเคลื่อนที่เข้าตัดเฉือนชิ้นงานที่หยุดนิ่ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">เครื่องมือตัดหมุนรอบตัวเอง แล้วเคลื่อนที่ชิ้นงานเข้าหาเครื่องมือตัด</label>

                <p class="mt-5">2.ทำหน้าที่รองรับชุดแท่นเลื่อนและชุดท้ายแท่น คือ ส่วนประกอบของเครื่องกลึงยันศูนย์ </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="1">
                    <label class="form-check-label" for="radio1">ชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="2">
                    <label class="form-check-label" for="radio2">สะพานแท่นเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="3">
                    <label class="form-check-label" for="radio3">ชุดส่งกำลัง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q2" value="4">
                    <label class="form-check-label" for="radio4">ฐานเครื่อง</label>
                </div>

                <p class="mt-5">3.ส่วนประกอบใดของเครื่องกลึงยันศูนย์ใช้ประกอบยันศูนย์เพื่อประคองชิ้นงาน </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="1">
                    <label class="form-check-label" for="radio1">ชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="2">
                    <label class="form-check-label" for="radio2">สะพานแท่นเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="3">
                    <label class="form-check-label" for="radio3">ชุดส่งกำลัง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="4">
                    <label class="form-check-label" for="radio4">ฐานเครื่อง</label>
                </div>

                <p class="mt-5">4.ป้อมมีดติดตั้งอยู่ส่วนบนประกอบใดของเครื่องกลึงยันศูนย์</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">ชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">ชุดท้ายแท่น</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">แท่นเลื่อนขวาง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">แท่นเลื่อนบน</label>
                </div>

                <p class="mt-5">5.ส่วนประกอบใดของเครื่องกลึงยันศูนย์ที่ใช้สำหรับปรับตั้งความเร็วรอบของหัวจับ </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="1">
                    <label class="form-check-label" for="radio1">ชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="2">
                    <label class="form-check-label" for="radio2">ชุดแท่นเลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="3">
                    <label class="form-check-label" for="radio3">หัวจับ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="4">
                    <label class="form-check-label" for="radio4">มอเตอร์</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 6-8</p>
                <img src="postest/Q6-8.PNG" alt="pic" style="width:70%">
                <p class="mt-5">6.หน้าที่ของหมายเลข 7 คืออะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="1">
                    <label class="form-check-label" for="radio1">เปลี่ยนการเป็นการป้อนกลึงเกลียวและกลึงอัตโนมัติ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="2">
                    <label class="form-check-label" for="radio2">ปรับตั้งตำแหน่งการประกอบกันของเฟืองในชุดเฟืองขับ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="3">
                    <label class="form-check-label" for="radio3">เปลี่ยนตำแหน่งความเร็วรอบของหัวจับเป็นสูงหรือต่ำ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="4">
                    <label class="form-check-label" for="radio4">ปรับตั้งความเร็วรอบของหัวจับ</label>
                </div>


                <p class="mt-5">7.ใช้โยกเพื่อเปลี่ยนระบบการทำงานเป็นการป้อนกลึงเกลียวและกลึงอัตโนมัติคือ หน้าที่ของหมายเลขอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 2</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 3</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 5</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 6</label>
                </div>

                <p class="mt-5">8.หมายเลข 6 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="1">
                    <label class="form-check-label" for="radio1">ปรับตั้งความเร็วรอบของหัวจับ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="2">
                    <label class="form-check-label" for="radio2">ปรับตั้งตำแหน่งการประกอบกันของเฟืองในชุดเฟืองขับ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="3">
                    <label class="form-check-label" for="radio3">เปลี่ยนทิศทางในการกลึงเกลียวขวาหรือเกลียวซ้าย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="4">
                    <label class="form-check-label" for="radio4">เปลี่ยนตำแหน่งความเร็วรอบของหัวจับเป็นสูงหรือต่ำ</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 9-13</p>
                <img src="postest/Q9-13.PNG" alt="pic" style="width:70%">
                <p class="mt-5">9.ใช้ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามความยาวของสะพานแท่นเครื่อง ขณะกลึงปอกอัตโนมัติคือ หน้าที่ของหมายเลขอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 4 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 3 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 2 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 1 </label>
                </div>

                <p class="mt-5">10.หมายเลข 1 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="1">
                    <label class="form-check-label" for="radio1">ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามความยาวของสะพานแท่นเครื่องขณะกลึงเกลียว </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="2">
                    <label class="form-check-label" for="radio2">ตัดและต่อกำลังจากเฟืองขับไปยังเพลานำ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="3">
                    <label class="form-check-label" for="radio3">ขับชุดแท่นเลื่อนบนให้เคลื่อนที่ตามขวางของสะพานแท่นเครื่องขณะกลึงปาดหน้า</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="4">
                    <label class="form-check-label" for="radio4">เปิด-ปิดการทำงานของหัวจับ</label>
                </div>

                <p class="mt-5">11.หน้าที่ของหมายเลข 4 คืออะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="1">
                    <label class="form-check-label" for="radio1">ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามความยาวของสะพานแท่นเครื่องขณะกลึงเกลียว</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="2">
                    <label class="form-check-label" for="radio2">ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามขวางของสะพานแท่นเครื่องขณะกลึงปาดหน้า</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="3">
                    <label class="form-check-label" for="radio3">ตัดและต่อกำลังจากเฟืองขับไปยังเพลานำ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="4">
                    <label class="form-check-label" for="radio4">ขับชุดแท่นเลื่อนบนให้เคลื่อนที่ตามขวางของสะพานแท่นเครื่องขณะกลึงปอก</label>
                </div>

                <p class="mt-5">12.เพลานำคือ หมายเลขอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 1 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 2 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 3 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 4 </label>
                </div>

                <p class="mt-5">13.เพลาป้อนคือ หมายเลขอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 1 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 2 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 3 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 4 </label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 14-15</p>
                <img src="postest/Q14-15.PNG" alt="pic" style="width:70%">
                <p class="mt-5">14.หน้าที่ของหมายเลข 5 คืออะไร </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="1">
                    <label class="form-check-label" for="radio1">ควบคุมการเคลื่อนที่ของมีดกลึงในการกลึงปอก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="2">
                    <label class="form-check-label" for="radio2">ควบคุมการเคลื่อนที่ของมีดกลึงในการกลึงปาดหน้า</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="3">
                    <label class="form-check-label" for="radio3">ควบคุมการเคลื่อนที่ของชุดแท่นเลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="4">
                    <label class="form-check-label" for="radio4">ปรับเอียงมุมของป้อมมีด</label>
                </div>

                <p class="mt-5">15.หน้าที่ของหมายเลข 3 คืออะไร </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="1">
                    <label class="form-check-label" for="radio1">ประกอบแท่นเลื่อนขวางและแท่นเลื่อนบน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="2">
                    <label class="form-check-label" for="radio2">ควบคุมการเคลื่อนที่ของมีดกลึงในการกลึงปอก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="3">
                    <label class="form-check-label" for="radio3">ควบคุมการเคลื่อนที่ของชุดแท่นเลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="4">
                    <label class="form-check-label" for="radio4">ปรับเอียงมุมของป้อมมีด</label>
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