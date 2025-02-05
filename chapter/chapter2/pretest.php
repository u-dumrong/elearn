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
        <h2 class="text-danger text-center">บทที่ 2. เครื่องมือขนาดเล็ก</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (25 คะแนน)</p>
        <form id="quizForm">
        <p class="mt-5">1. การขันหรือคลายสลักเกลียวในพื้นที่แคบและลึกควรเลือกใช้เครื่องมือชนิดใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">ประแจตะขอ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">ประแจบล็อก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">ประแจหกเหลี่ยม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">ประแจปากตาย</label>
            </div>

            <p class="mt-5">2. การขันล็อกแกนเพลาของเครื่องกัด ควรเลือกใช้เครื่องมือชนิดใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1">ประแจตะขอ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2">ประแจปากตาย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3">ประแจบล็อก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4">ประแจหกเหลี่ยม</label>
            </div>

            <p class="mt-5">3. เครื่องมือชนิดใดใช้ขันหรือคลายสกรูหัวฝัง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1">ประแจตะขอ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2">ประแจบล็อก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3">ประแจหกเหลี่ยม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4">ประแจปากตาย</label>
            </div>

            <p class="mt-5">4. เครื่องมือชนิดใช้ในการขันท่อหรือจับยึดท่อ คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/4a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/4b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/4c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/4d.png" alt="ง." style="width:70%"></label>
            </div>

            <p class="mt-5">5. เครื่องมือชนิดใดใช้ในการขันหรือคลายสกรูหัวผ่าร่องตรง คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/5a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/5b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/5c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/5d.png" alt="ง." style="width:70%"></label>
            </div>

            <p class="mt-5">6. คีมชนิดใดสามารถจับยึดชิ้นงานแบน ชิ้นงานกลมและตัดเส้นลวดขนาดเล็กได้</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">คีมล็อก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">คีมตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">คีมปากจิ้งจก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">คีมปากประสม</label>
            </div>

            <p class="mt-5">7. คีมชนิดใดใช้สำหรับจับหรือบีบชิ้นงานขนาดเล็ก</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                    คีมล็อก
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                    คีมตัด
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio2">
                    คีมปากจิ้งจก
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio2">
                    คีมปากประสม
                    </label>
                </div>
            </div>

            <p class="mt-5">8. คีมชนิดใดมีปากด้านข้างเอียงเป็นคมตัดใช้สำหรับตัดเส้นลวดขนาดเล็กและสายไฟฟ้า</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1">คีมล็อก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2">คีมตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3">คีมปากจิ้งจก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4">คีมปากประสม</label>
            </div>

            <p class="mt-5">9. จากรูปการถอด-ประกอบแหวนสปริงล็อกในควรเลือกใช้เครื่องมือชนิดใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/9a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/9b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/9c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/9d.png" alt="ง." style="width:70%"></label>
            </div>

            <p class="mt-5">10. การขันยึดหรือคลายสกรูหัวหกเหลี่ยมต้องใช้เครื่องมือชนิดใด<br><img src="pretest/10q.png" alt="ก." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">ประแจหกเหลี่ยม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">ไขควงปากแบน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">ไขควงปากแฉก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">คีมปากผสม</label>
            </div>

            <p class="mt-5">11. เครื่องมือกลข้อใดแตกต่างจากพวก</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/11a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/11b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/11c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/11d.png" alt="ง." style="width:70%"></label>
            </div>

            <p class="mt-5">12. เครื่องมือในข้อใดแตกต่างจากพวก</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/12a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/12b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/12c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/12d.png" alt="ง." style="width:70%"></label>
            </div>

            <p class="mt-5">13. สกัดที่มีคมตัดเป็นรูปสี่เหลี่ยมขนมเปียกปูนใช้ในงานเซาะผิวงานให้เป็นร่องตัววีหรือร่องสี่เหลี่ยม คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="1">
                <label class="form-check-label" for="radio1">สกัดปากแบน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="2">
                <label class="form-check-label" for="radio2">สกัดปากจิ้งจก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="3">
                <label class="form-check-label" for="radio3">สกัดปลายมน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="4">
                <label class="form-check-label" for="radio4">สกัดปลายตัดรูปเพชร</label>
            </div>

            <p class="mt-5">14. ค้อนที่เหมาะสำหรับงานเคาะเบา ๆ เพื่อปรับแต่งชิ้นงานให้ได้ตำแหน่งบนอุปกรณ์จับยึด คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1">ค้อนหัวตรง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2">ค้อนหัวพลาสติก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3">ค้อนหัวกลม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4">ค้อนหัวขวาง</label>
            </div>

            <p class="mt-5">15. จากรูป คือ คมตัดตะไบชนิดใด<br><img src="pretest/15q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="1">
                <label class="form-check-label" for="radio1">ตะไบคมตัดเดี่ยว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="2">
                <label class="form-check-label" for="radio2">ตะไบคมตัดคู่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="3">
                <label class="form-check-label" for="radio3">ตะไบคมตัดโค้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="4">
                <label class="form-check-label" for="radio4">ตะไบคมตัดบุ้ง</label>
            </div>

            <p class="mt-5">16. จากรูป คือ คมตัดตะไบชนิดใด<img src="pretest/16q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="1">
                <label class="form-check-label" for="radio1">ตะไบคมตัดเดี่ยว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="2">
                <label class="form-check-label" for="radio2">ตะไบคมตัดคู่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="3">
                <label class="form-check-label" for="radio3">ตะไบคมตัดโค้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q16" value="4">
                <label class="form-check-label" for="radio4">ตะไบคมตัดบุ้ง</label>
            </div>

            <p class="mt-5">17. ตะไบที่เหมาะสำหรับปรับผิวงานที่มีร่องเหลี่ยมและบ่ามุมฉาก คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="1">
                <label class="form-check-label" for="radio1">ตะไบแบน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="2">
                <label class="form-check-label" for="radio2">ตะไบครึ่งวงกลม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="3">
                <label class="form-check-label" for="radio3">ตะไบสี่เหลี่ยม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q17" value="4">
                <label class="form-check-label" for="radio4">ตะไบสามเหลี่ยม</label>
            </div>

            <p class="mt-5">18. ตะไบที่ใช้สำหรับปรับผิวฟันเกลียวหรือแต่งฟันเลื่อย คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="1">
                <label class="form-check-label" for="radio1">ตะไบแบน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="2">
                <label class="form-check-label" for="radio2">ตะไบครึ่งวงกลม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="3">
                <label class="form-check-label" for="radio3">ตะไบสี่เหลี่ยม</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q18" value="4">
                <label class="form-check-label" for="radio4">ตะไบสามเหลี่ยม</label>
            </div>

            <p class="mt-5">19. เครื่องมือชนิดใดใช้สำหรับตอกเพื่อถอดสลักและหมุดย้ำออกจากรู</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="1">
                <label class="form-check-label" for="radio1">เหล็กส่ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="2">
                <label class="form-check-label" for="radio2">เครื่องมือถอดตลับลูกปืน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="3">
                <label class="form-check-label" for="radio3">เหล็กนำศูนย์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q19" value="4">
                <label class="form-check-label" for="radio4">สกัดปลายมน</label>
            </div>

            <p class="mt-5">20. ต๊าปดอกแรกที่ใช้ในการหมุนตัดเกลียวมีชื่อเรียกว่าอะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="1">
                <label class="form-check-label" for="radio1">ดอกดาย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="2">
                <label class="form-check-label" for="radio2">ดอกเรียว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="3">
                <label class="form-check-label" for="radio3">ดอกนำ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q20" value="4">
                <label class="form-check-label" for="radio4">ดอกตาม</label>
            </div>

            <p class="mt-5">21. ข้อใด <b class="text-danger">ไม่ใช่</b> ส่วนประกอบของปากกาจับงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="1">
                <label class="form-check-label" for="radio1">ปากจับคงที่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="2">
                <label class="form-check-label" for="radio2">แป้นยึด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="3">
                <label class="form-check-label" for="radio3">มือหมุน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q21" value="4">
                <label class="form-check-label" for="radio4">สลักเกลียวส่งกำลัง</label>
            </div>

            <p class="mt-5">22. จากรูป กรรไกรชนิดนี้เหมาะสำหรับงานชนิดใด<br><img src="pretest/22q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="1">
                <label class="form-check-label" for="radio1">งานตัดโลหะแผ่นบางแนวตัดตรง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="2">
                <label class="form-check-label" for="radio2">งานตัดโลหะแผ่นบางแนวตัดตรงและโค้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="3">
                <label class="form-check-label" for="radio3">งานตัดโลหะแผ่นบางแนวตัดโค้งซ้าย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q22" value="4">
                <label class="form-check-label" for="radio4">งานตัดโลหะแผ่นบางแนวตัดโค้งขวา</label>
            </div>

            <p class="mt-5">23. จากรูป เครื่องมือนี้ทำหน้าที่อะไร<img src="pretest/23q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="1">
                <label class="form-check-label" for="radio1">จับยึดชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="2">
                <label class="form-check-label" for="radio2">จับยึดดาย</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="3">
                <label class="form-check-label" for="radio3">จับยึดต๊าป</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q23" value="4">
                <label class="form-check-label" for="radio4">ทำเกลียวนอก</label>
            </div>

            <p class="mt-5">24. จากรูป คือ เครื่องมือที่ใช้สำหรับงานอะไร<br><img src="pretest/24q.png" alt="ง." style="width:70%"></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="1">
                <label class="form-check-label" for="radio1">ทำเกลียวใน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="2">
                <label class="form-check-label" for="radio2">ทำเกลียวนอก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="3">
                <label class="form-check-label" for="radio3">ขัดผิวด้านนอกชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q24" value="4">
                <label class="form-check-label" for="radio4">ลบคม</label>
            </div>

            <p class="mt-5">25. เครื่องมือที่ใช้ในการทำเกลียวใน คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/25a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/25b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/25c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q25" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/25d.png" alt="ง." style="width:70%"></label>
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