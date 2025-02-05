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
        <h2 class="text-danger text-center">บทที่ 7. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1.ข้อใด คือ เครื่องเจียระไนราบ เพลานอน</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="1">
                    <label class="form-check-label" for="radio1">
                        <img src="postest/Q1A.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="2">
                    <label class="form-check-label" for="radio2">
                        <img src="postest/Q1B.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="3">
                    <label class="form-check-label" for="radio2">
                        <img src="postest/Q1C.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q1" value="4">
                    <label class="form-check-label" for="radio2">
                        <img src="postest/Q1D.PNG" alt="pic" style="width:70%">
                    </label>
                </div>
            </div>

            <p class="mt-5">2.จากรูป คือ เครื่องเจียระไนชนิดใด</p>
            <img src="postest/Q2.PNG" alt="pic" style="width:70%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจียระไนราบ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจียระไนไร้ศูนย์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจียระไนทรงกระบอก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจียระไนลับคมตัด</label>

                <p class="mt-5">3.ใช้ยึดกับพื้นโรงงานทำให้มั่นคงแข็งแรง ไม่สั่นสะเทือนในขณะใช้งานคือ หน้าที่ของส่วนประกอบใด </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">แท่นเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">ฐานเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">ขาตั้ง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">งแท่นรองรับชิ้นงาน </label>
                </div>

                <p class="mt-5">4.ใช้รองรับน้ำหนักของมอเตอร์และล้อหินเจียระไนคือ หน้าที่ของส่วนประกอบใด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">แท่นรองรับชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">ถังบรรจุน้ำหล่อเย็น</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">ขาตั้ง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">แท่นเครื่อง</label>
                </div>

                <p class="mt-5">5.ใช้รองรับชิ้นงานไม่ให้สั่นสะเทือนขณะปฏิบัติงานคือ หน้าที่ของส่วนประกอบใด </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="1">
                    <label class="form-check-label" for="radio1">แท่นรองรับชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="2">
                    <label class="form-check-label" for="radio2">ล้อหินเจียระไน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="3">
                    <label class="form-check-label" for="radio3">ฝาครอบล้อหินเจียระไน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="4">
                    <label class="form-check-label" for="radio4">สวิตช์ควบคุม</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 6-9 </p>
                <img src="postest/Q6-9.PNG" alt="pic" style="width:70%">
                <p class="mt-5">6.หมายเลข 2 คือ อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="1">
                    <label class="form-check-label" for="radio1">แท่นรองรับชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="2">
                    <label class="form-check-label" for="radio2">ล้อหินเจียระไนชนิดเกรนละเอียด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="3">
                    <label class="form-check-label" for="radio3">ล้อหินเจียระไนชนิดเกรนหยาบ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="4">
                    <label class="form-check-label" for="radio4">ฝาครอบล้อหินเจียระไน</label>
                </div>


                <p class="mt-5">7.หมายเลข 4 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">รองรับมอเตอร์</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">รองรับชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">ตัดเฉือนชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">ป้องกันอันตรายในขณะล้อหินเจียระไนหมุน</label>
                </div>

                <p class="mt-5">8.หมายเลข 8 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="1">
                    <label class="form-check-label" for="radio1">รองรับชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="2">
                    <label class="form-check-label" for="radio2">รองรับมอเตอร์</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="3">
                    <label class="form-check-label" for="radio3">ป้องกันเศษเจียระไนกระเด็นเข้าตา</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="4">
                    <label class="form-check-label" for="radio4">ป้องกันอันตรายในขณะล้อหินเจียระไนหมุน</label>
                </div>

                <p class="mt-5">9.หมายเลขใดทำหน้าที่ตัดเฉือนชิ้นงาน </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 1 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 2 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 5 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 6 </label>
                </div>

                <p class="mt-5">10.ข้อใด ไม่ใช่ จุดมุ่งหมายในการแต่งหน้าล้อหินเจียระไน
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="1">
                    <label class="form-check-label" for="radio1">เพื่อทำให้ล้อหินเจียระไนทำให้เกิดคมตัดใหม่ขึ้น </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="2">
                    <label class="form-check-label" for="radio2">เพื่อขยายช่องลับเศษโลหะของล้อหินเจียระไน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="3">
                    <label class="form-check-label" for="radio3">เพื่อลบรอยร้าวของล้อหินเจียระไน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="4">
                    <label class="form-check-label" for="radio4">เพื่อทำให้หน้าล้อหินเจียระไนได้รูปพรรณและขนาดอยู่ในพิกัด</label>
                </div>

                <p class="mt-5">11.อุปกรณ์ในข้อใดใช้วัดมุมเกลียวยอดแหลมมุม 60องศา</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q11" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q11A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q11" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q11B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q11" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q11C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q11" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q11D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">12. เครื่องมือในข้อใดใช้วัดวัดมุมเกลียวสี่เหลี่ยมคางหมูอเมริกัน (Acme Thread Gauge)</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q12" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q12A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q12" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q12B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q12" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q12C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q12" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q12D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">13.เครื่องมือในข้อใดใช้วัดมุมดอกสว่านเท่านั้น </p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q13A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q13B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q13C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q13" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q13D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">14.แท่นรองรับชิ้นงานควรปรับให้มีระยะห่างจากขอบหน้าล้อหินเจียระไนเท่าใด </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="1">
                    <label class="form-check-label" for="radio1">ประมาณ 1-2 มิลลิเมตร</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="2">
                    <label class="form-check-label" for="radio2">เท่ากับความหนาของล้อหินเจียระไน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="3">
                    <label class="form-check-label" for="radio3">เท่ากับความหนาของชิ้นงาน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="4">
                    <label class="form-check-label" for="radio4">ประมาณ 3-5 มิลลิเมตร</label>
                </div>

                <p class="mt-5">15.ข้อใด ไม่ใช่ วิธีการบำรุงรักษาเครื่องเจียระไนลับคมตัด </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="1">
                    <label class="form-check-label" for="radio1">ตรวจสอบการทำงานของมอเตอร์ก่อนใช้งาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="2">
                    <label class="form-check-label" for="radio2">ตรวจสอบความสมบูรณ์ของล้อหินเจียระไนก่อนใช้งาน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="3">
                    <label class="form-check-label" for="radio3">ทำความสะอาดเครื่องเจียระไนหลังใช้งาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="4">
                    <label class="form-check-label" for="radio4">ตรวจสอบระบบไฟฟ้าหลังใช้งานทุกครั้ง</label>
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