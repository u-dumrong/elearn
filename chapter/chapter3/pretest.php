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
        <div class="offcanvas-body">
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
        <h1 class="text-center navyf">แบบทดสอบก่อนเรียน</h1>
        <h2 class="text-danger text-center">บทที่ 3. เครื่องเลื่อยกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (25 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1. จากรูป คือ เครื่องเลื่อยกลชนิดใด</p>
            <img src="pretest/Q1.PNG" alt="pic" style="width:70%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">เครื่องเลื่อยกลสายพานแนวนอน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">เครื่องเลื่อยกลแบบชัก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องเลื่อยวงเดือน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยกลสายพาน</label>
            </div>

            <p class="mt-5">2. ส่วนประกอบใดของเครื่องเลื่อยกลแบบชักทำหน้าที่จับยึดใบเลื่อย</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1">ฐานเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2">มอเตอร์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3">ปากกาจับงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4">โครงเลื่อย</label>
            </div>

            <p class="mt-5">3. มอเตอร์ของเครื่องเลื่อยกลแบบชักทำหน้าที่อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1">ต้นกำลังขับโครงเลื่อย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2">จับยึดชิ้นงานด้วยระบบไฟฟ้า</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3">ควบคุมการทำงานของเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4">จับยึดใบเลื่อยเข้ากับโครงเครื่อง</label>
            </div>

            <p class="mt-5">4. อุปกรณ์ในรูปทำหน้าที่อะไร</p>
            <img src="pretest/Q4.PNG" alt="pic" style="width:60%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="1">
                <label class="form-check-label" for="radio1">จับยึดชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="2">
                <label class="form-check-label" for="radio2">รองรับชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="3">
                <label class="form-check-label" for="radio3">ปรับตั้งความยาวชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4">รองรับปากกาจับงาน</label>
            </div>

            <p class="mt-5">5. เครื่องเลื่อยกลชนิดใดมีหลักการทำงานโดยการเคลื่อนที่สองจังหวะคือ จังหวะงานและจังหวะคายเศษวัสดุ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1">เครื่องเลื่อยวงเดือน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2">เครื่องเลื่อยกลสายพานแนวนอน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3">เครื่องเลื่อยกลสายพานแนวตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยกลแบบชัก</label>
            </div>

            <p class="mt-5">6. เครื่องเลื่อยกลชนิดใดมีหลักการทำงานให้ใบเลื่อยหมุนวนรอบตัวเองในแนวนอนแล้วป้อนไฮดรอลิกส์ลงตัดชิ้นงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">เครื่องเลื่อยกลแบบชัก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">เครื่องเลื่อยกลสายพานแนวนอน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">เครื่องเลื่อยกลสายพานแนวตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยวงเดือน</label>
            </div>

            <p class="mt-5">7. ล้อหินเจียระไนใบเลื่อยเป็นส่วนประกอบของเลื่อยกลชนิดใด</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                        เครื่องเลื่อยกลสายพานแนวตั้ง
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                        เครื่องเลื่อยวงเดือน
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio2">
                        เครื่องเลื่อยกลแบบชัก
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio2">
                        เครื่องเลื่อยกลสายพานแนวนอน
                    </label>
                </div>
            </div>

            <p class="mt-5">8. ส่วนประกอบใดของเครื่องเลื่อยสายพานช่วยให้ใบเลื่อยเคลื่อนที่ได้ตรงและไม่เอนเอียงขณะตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1">ชุดล้อสายพาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2">โต๊ะงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3">ชุดส่งกำลัง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4">ชุดประคองใบเลื่อย</label>
            </div>

            <p class="mt-5">9. การตัดชิ้นงานที่มีความยาวเท่ากันหลายชิ้นด้วยเครื่องเลื่อยกลแบบชักควรใช้อุปกรณ์ใดช่วยการตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1">บรรทัดเหล็ก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2">อุปกรณ์ปรับตั้งความยาวตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3">เวอร์เนียคาลิเปอร์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4">แท่นรองรับชิ้นงาน</label>
            </div>

            <p class="mt-5">10. จากรูปหมายเลข 1 คือ อะไร<br><img src="pretest/Q10.PNG" alt="ก." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">ความหนา</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">ความกว้าง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">ความยาว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">ระยะห่างของรูเจาะ</label>
            </div>

            <p class="mt-5">จากรูป จงใช้ตอบคำถามข้อ 11-12</p>
            <img src="pretest/Q11.PNG" alt="pic" style="width:70%">
            <p class="mt-5">11. หมายเลข 1 คือมุมอะไรของใบเลื่อยกลชัก</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="1">
                <label class="form-check-label" for="radio1">มุมหลบ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="2">
                <label class="form-check-label" for="radio2">มุมคมตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="3">
                <label class="form-check-label" for="radio3">มุมคาย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="4">
                <label class="form-check-label" for="radio4">มุมตัด</label>
            </div>

            <p class="mt-5">12. ทำหน้าที่ตัดเฉือนเนื้อชิ้นงานคือ มุมหมายเลขใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1">หมายเลข 1</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2">หมายเลข 2</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3">หมายเลข 3</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4">หมายเลข 4</label>
            </div>

            <p class="mt-5">13. ข้อใด คือ การจัดเรียงฟันใบเลื่อยแบบฟันสลับฟันเอียงซ้ายและฟันเอียงขวา</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q13A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q13B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q13C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q13D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">14. ข้อใด คือ การจัดเรียงฟันใบเลื่อยแบบชุดฟันเอียงซ้ายสลับชุดฟันเอียงขวา</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q14A.PNG" alt="pic" style="width:60%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q14B.PNG" alt="pic" style="width:60%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q14C.PNG" alt="pic" style="width:60%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q14D.PNG" alt="pic" style="width:60%"></label>
            </div>

            <p class="mt-5">15. จากรูปใบเลื่อยมีระยะพิตช์เท่าใด<br><img src="pretest/Q15.PNG" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="1">
                <label class="form-check-label" for="radio1">7 ฟันต่อนิ้ว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="2">
                <label class="form-check-label" for="radio2">6 ฟันต่อนิ้ว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="3">
                <label class="form-check-label" for="radio3">3 มิลลิเมตร</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="4">
                <label class="form-check-label" for="radio4">4 มิลลิเมตร</label>
            </div>

            <p class="mt-5">16. การตัดเหล็กกล้าสำหรับงานแปรรูปทั่วไป (Steel for Machine) ควรเลือกใช้ใบเลื่อยของเครื่องเลื่อยกลแบบชักที่มีระยะพิตช์เท่าใด<img src="pretest/16q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="1">
                <label class="form-check-label" for="radio1">10 ฟันต่อนิ้ว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="2">
                <label class="form-check-label" for="radio2">14 ฟันต่อนิ้ว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="3">
                <label class="form-check-label" for="radio3">4 ฟันต่อนิ้ว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="4">
                <label class="form-check-label" for="radio4">6 ฟันต่อนิ้ว</label>
            </div>

            <p class="mt-5">17. ส่วนประกอบใดของเครื่องเลื่อยสายพานแนวนอนใช้ติดตั้งใบเลื่อย</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="1">
                <label class="form-check-label" for="radio1">ล้อขับใบเลื่อย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="2">
                <label class="form-check-label" for="radio2">โครงเลื่อย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="3">
                <label class="form-check-label" for="radio3">มอเตอร์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="4">
                <label class="form-check-label" for="radio4">มือหมุนปรับตึงใบเลื่อย</label>
            </div>

            <p class="mt-5">18. เครื่องเลื่อยสายพานแนวนอนมีระบบการป้อนตัดด้วยอะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="1">
                <label class="form-check-label" for="radio1">เฟือง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="2">
                <label class="form-check-label" for="radio2">โครงเลื่อย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="3">
                <label class="form-check-label" for="radio3">มอเตอร์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="4">
                <label class="form-check-label" for="radio4">ไฮดรอลิกส์</label>
            </div>

            <p class="mt-5">19. การตัดเหล็กกล้าคาร์บอนสูงและเหล็กรูปพรรณที่มีหน้าตัดบางด้วยเครื่องเลื่อยสายพานแนวนอนควรเลือกใช้ฟันใบเลื่อยชนิดใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="1">
                <label class="form-check-label" for="radio1">ฟันมาตรฐาน (Regular Tooth)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="2">
                <label class="form-check-label" for="radio2">ฟันเว้นระยะ (Skip Tooth)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="3">
                <label class="form-check-label" for="radio3">ฟันตะขอ (Hook Tooth)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="4">
                <label class="form-check-label" for="radio4">ฟันรูปคางหมู (Trapezoid Tooth)</label>
            </div>

            <p class="mt-5">20. การตัดเหล็กกล้าคาร์บอนต่ำถึงปานกลางหรือโลหะที่ไม่ใช่เหล็กด้วยเครื่องเลื่อยสายพานแนวนอนควรเลือกใช้ฟันใบเลื่อยชนิดใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="1">
                <label class="form-check-label" for="radio1">ฟันมาตรฐาน (Regular Tooth)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="2">
                <label class="form-check-label" for="radio2">ฟันเว้นระยะ (Skip Tooth)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="3">
                <label class="form-check-label" for="radio3">ฟันตะขอ (Hook Tooth)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="4">
                <label class="form-check-label" for="radio4">ฟันรูปคางหมู (Trapezoid Tooth)</label>
            </div>

            <p class="mt-5">21. เครื่องเลื่อยชนิดใดใบเลื่อยมีรูปร่างเป็นวงกลม</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="1">
                <label class="form-check-label" for="radio1">เครื่องเลื่อยกลแบบชัก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="2">
                <label class="form-check-label" for="radio2">เครื่องเลื่อยสายพานแนวนอน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="3">
                <label class="form-check-label" for="radio3">เครื่องเลื่อยสายพานแนวตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยวงเดือน</label>
            </div>

            <p class="mt-5">22. เครื่องเลื่อยวงเดือนและเครื่องตัดไฟเบอร์นิยมใช้ตัดชิ้นงานลักษณะใด<br><img src="pretest/22q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="1">
                <label class="form-check-label" for="radio1">โลหะบางและท่อผนังบาง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="2">
                <label class="form-check-label" for="radio2">โลหะหนาและท่อหนามีพื้นที่หน้าตัดขนาดใหญ่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="3">
                <label class="form-check-label" for="radio3">โลหะตันที่มีพื้นที่หน้าตัดขนาดใหญ่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="4">
                <label class="form-check-label" for="radio4">โลหะที่มีความแข็งมาก</label>
            </div>

            <p class="mt-5">23.ข้อใดจับยึดชิ้นงาน ไม่ถูกต้อง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q23A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q23B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q23C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q23D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">24. ข้อใดจับยึดชิ้นงาน ได้ถูกต้อง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q24A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q24B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q24C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q24D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">25. จากรูปความยาวของใบเลื่อยสายพานแนวตั้งมีค่าเท่าใด</p>
            <img src="pretest/Q25.PNG" alt="pic" style="width:60%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="1">
                <label class="form-check-label" for="radio1">4,927 มิลลิเมตร</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="2">
                <label class="form-check-label" for="radio2">4,300 มิลลิเมตร</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="3">
                <label class="form-check-label" for="radio3">2,700 มิลลิเมตร</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="4">
                <label class="form-check-label" for="radio4">2,150 มิลลิเมตร</label>
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
    <script src="pretest.js" defer></script>
</body>

</html>