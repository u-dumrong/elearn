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
            echo '<li><a class="dropdown-item" href="../chapter' . $i . '/postest.php">แบบทดสอบก่อนเรียน</a></li>';
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
        <h2 class="text-danger text-center">บทที่ 1. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1. เครื่องมือกล หมายถึง อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">เครื่องมือและอุปกรณ์ที่ใช้ในการแปรรูปหรือผลิตชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">สิ่งที่ประกอบด้วยชิ้นส่วนหลายชิ้นสำหรับใช้ก่อกำเนิดพลังงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">สิ่งที่ประกอบด้วยชิ้นส่วนหลายชิ้นสำหรับใช้แปรสภาพพลังงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">สิ่งที่ประกอบด้วยชิ้นส่วนหลายชิ้นสำหรับใช้ก่อกำเนิดพลังงานส่งพลังงาน</label>
            </div>

            <p class="mt-5">2. ข้อใด <b class="text-danger">ไม่ใช่</b> เครื่องมือกล</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1">เครื่องกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3">เครื่องยนต์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4">เครื่องกลึง</label>
            </div>

            <p class="mt-5">3. การแบ่งประเภทของเครื่องมือกลข้อใด <b class="text-danger">ไม่ถูกต้อง</b></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจาะ, เครื่องคว้าน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2">เครื่องไส, เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจียระไนลับคมตัด, เครื่องเจียระไนทรงกระบอก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4">เครื่องกัดเพลาตั้ง, เครื่องกัดเพลานอน</label>
            </div>

            <p class="mt-5">4. เครื่องมือกลชนิดใดที่แปรรูปโดยให้เครื่องมือตัดหมุนรอบตัวเอง แล้วเลื่อนชิ้นงานเข้าหาเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="3">
                <label class="form-check-label" for="radio3">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4">เครื่องกัด</label>
            </div>

            <p class="mt-5">5. เครื่องเลื่อยกลแบบชักจัดอยู่ในเครื่องมือกลกลุ่มใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1">กลุ่มทำงานที่ชิ้นงานหมุนรอบตัวเอง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2">กลุ่มทำงานขัดหรือเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3">กลุ่มทำงานตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4">กลุ่มทำงานเจาะหรือคว้านรู</label>
            </div>

            <p class="mt-5">6. เครื่องมือกลชนิดใดที่แปรรูปโดยให้เครื่องมือตัดเคลื่อนที่ในแนวเส้นตรง แล้วเลื่อนชิ้นงานเข้าหาเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">เครื่องกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยกล</label>
            </div>

            <p class="mt-5">7. เครื่องมือกลข้อใดแตกต่างจากพวก</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                    <img src="postest/Q7A.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                    <img src="postest/Q7B.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio2">
                    <img src="postest/Q7C.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio2">
                    <img src="postest/Q7D.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
            </div>

            <p class="mt-5">8. เครื่องมือกลข้อใดแตกต่างจากพวก</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1"><img src="postest/Q8A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2"><img src="postest/Q8B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3"><img src="postest/Q8C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4"><img src="postest/Q8D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">9. เครื่องมือกลข้อใดจัดอยู่ในกลุ่มที่จับยึดชิ้นงานอยู่กับที่ แล้วเลื่อนเข้าหาเครื่องมือตัดที่หมุนรอบตัวเองเพื่อทำการตัดเฉือน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1"><img src="postest/Q9A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2"><img src="postest/Q9B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3"><img src="postest/Q9C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4"><img src="postest/Q9D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">10. เครื่องมือกลกลุ่มใดมีหลักการทำงานโดยชิ้นงานจะถูกขึ้นรูปจากการสัมผัสกับส่วนที่หมุนของเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยกลแบบชัก</label>
            </div>

            <p class="mt-5">11. เครื่องมือกลกลุ่มใดควบคุมการทำงานด้วยคอมพิวเตอร์</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="1">
                <label class="form-check-label" for="radio1">เครื่องกลึงซีเอ็นซี</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจียระไนลับคมตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจาะรัศมี</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="4">
                <label class="form-check-label" for="radio4">เครื่องไสช่วงสั้น</label>
            </div>

            <p class="mt-5">12. เครื่องมือกลกลุ่มใดมีหลักการทำงานโดยให้ชิ้นงานหมุนรอบตัวเอง แล้วเคลื่อนที่เครื่องมือตัดเข้าตัดเฉือนชิ้นงานที่กำลังหมุน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3">เครื่องกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4">เครื่องไส</label>
            </div>

            <p class="mt-5">13. เครื่องมือกลกลุ่มใดที่เครื่องมือตัดเคลื่อนที่ไป-กลับในแนวเส้นตรง แล้วเลื่อนชิ้นงานเข้าหาเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="1">
                <label class="form-check-label" for="radio1">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="3">
                <label class="form-check-label" for="radio3">เครื่องไสเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจาะ</label>
            </div>

            <p class="mt-5">14. เครื่องมือกลกลุ่มใดมีหลักการทำงานโดยชิ้นงานถูกจับยึดแน่นกับที่ ส่วนเครื่องมือตัดหมุนรอบตัวเองแล้วเคลื่อนที่ในแนวเส้นตรงเข้าตัดเฉือนชิ้นงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4">เครื่องกลึง</label>
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