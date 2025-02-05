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
        <h2 class="text-danger text-center">บทที่ 6. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1.จากรูป คือ เครื่องกัดชนิดใด</p>
            <img src="postest/Q1.PNG" alt="pic" style="width:70%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">เครื่องกัดเพลาตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">เครื่องกัดเพลานอน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องกัดเพลานอนและเพลาตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">เครื่องกัดซีเอ็นซี</label>

                <p class="mt-5">2.ข้อใด คือ เครื่องกัดเพลานอนและเพลาตั้งเอนกประสงค์</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q2" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q2A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q2" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q2B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q2" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q2C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q2" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q2D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">3.ข้อใด คือ เครื่องกัดซีเอ็นซี</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q3" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q3A.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q3" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q3B.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q3" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q3C.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q3" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q3D.PNG" alt="pic" style="width:70%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">4.ส่วนประกอบใดของเครื่องกัดทำหน้าที่รองรับฐานรองโต๊ะงานและเลื่อนโต๊ะงานให้เคลื่อนที่เข้า-ออกตามขวางกับโครงเครื่อง</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">แคร่เลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">ชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">โต๊ะงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">แท่นเลื่อนบน</label>
                </div>

                <p class="mt-5">5.คานยื่นของเครื่องกัดเพลานอนทำหน้าที่อะไร </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="1">
                    <label class="form-check-label" for="radio1">จับยึดแท่นเลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="2">
                    <label class="form-check-label" for="radio2">จับยึดเพลาจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="3">
                    <label class="form-check-label" for="radio3">ประคองเพลาจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="4">
                    <label class="form-check-label" for="radio4">ช่วยจับยึดชิ้นงาน</label>
                </div>

                <p class="mt-5">6.ทำหน้าที่ประคองแกนเพลาจับดอกกัดไม่ให้สั่นสะเทือนขณะดอกกัดกำลังตัดเฉือนชิ้นงานคือ หน้าที่ของอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="1">
                    <label class="form-check-label" for="radio1">เพลาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="2">
                    <label class="form-check-label" for="radio2">คานยื่น</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="3">
                    <label class="form-check-label" for="radio3">หัวจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="4">
                    <label class="form-check-label" for="radio4">ตัวประคองแกนเพลาจับดอกกัด</label>
                </div>


                <p class="mt-5">7.ติดตั้งอยู่ด้านบนของโครงเครื่องและทำหน้าที่เป็นจับยึดเพลาจับดอกกัดคือ ส่วนประกอบใดของเครื่องกัด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">โครงเครื่องกัด (Column)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">คานยื่น (Over Arm)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">ฐานเครื่อง (Base)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">แท่นเลื่อน (Knee)</label>
                </div>

                <p class="mt-5">8.ติดตั้งอยู่ด้านบนของแคร่เลื่อน ทำหน้าที่จับยึดชิ้นงานส่วนประกอบใดของเครื่องกัด </p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="1">
                    <label class="form-check-label" for="radio1">เพลาเครื่องกัด (Spindle)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="2">
                    <label class="form-check-label" for="radio2">แท่นเลื่อน (Knee)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="3">
                    <label class="form-check-label" for="radio3">แคร่เลื่อน (Saddle)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="4">
                    <label class="form-check-label" for="radio4">โต๊ะงาน (Table)</label>
                </div>

                <p class="mt-5">9.ส่วนประกอบใดของเครื่องกัดที่ด้านหน้าเป็นร่องหางเหยี่ยว และใช้รองรับการเลื่อนขึ้น-ลงในแนวตั้งของแท่นเลื่อน</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="1">
                    <label class="form-check-label" for="radio1">โครงเครื่อง (Column) </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="2">
                    <label class="form-check-label" for="radio2">ฐานเครื่อง (Base)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="3">
                    <label class="form-check-label" for="radio3">คานยื่น (Ram)</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="4">
                    <label class="form-check-label" for="radio4">แท่นเลื่อน (Knee)</label>
                </div>

                <p class="mt-5">10.คานยื่น (Ram) ของเครื่องกัดทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="1">
                    <label class="form-check-label" for="radio1">จับยึดหัวชุดเครื่องกัดและมอเตอร์ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="2">
                    <label class="form-check-label" for="radio2">รองรับส่วนต่างๆ ของเครื่อง </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="3">
                    <label class="form-check-label" for="radio3">รองรับแคร่เลื่อน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="4">
                    <label class="form-check-label" for="radio4">รองรับโต๊ะงาน</label>
                </div>

                <p class="mt-5">11.แท่นเลื่อน (Knee) ของเครื่องกัดทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="1">
                    <label class="form-check-label" for="radio1">รองรับแคร่เลื่อนและโต๊ะงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="2">
                    <label class="form-check-label" for="radio2">จับยึดเพลาเครื่องกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="3">
                    <label class="form-check-label" for="radio3">จับยึดหัวจับดอกกัดหรือเพลาจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="4">
                    <label class="form-check-label" for="radio4">จับยึดชิ้นงาน</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 12-14</p>
                <img src="postest/Q12-14.PNG" alt="pic" style="width:70%">
                <p class="mt-5">12.ส่วนประกอบหมายเลข 1 เรียกว่าอะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="1">
                    <label class="form-check-label" for="radio1">แขนโยกป้อนกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="2">
                    <label class="form-check-label" for="radio2">มอเตอร์</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="3">
                    <label class="form-check-label" for="radio3">แคร่เลื่อน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="4">
                    <label class="form-check-label" for="radio4">แกนเพลา</label>
                </div>

                <p class="mt-5">13.หน้าที่ของส่วนประกอบหมายเลข 3 คืออะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="1">
                    <label class="form-check-label" for="radio1">เปลี่ยนความเร็วรอบ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="2">
                    <label class="form-check-label" for="radio2">ต้นกำลังขับเพลาเครื่องกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="3">
                    <label class="form-check-label" for="radio3">จับยึดชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q13" value="4">
                    <label class="form-check-label" for="radio4">ปรับเอียงชุดหัวเครื่อง</label>
                </div>

                <p class="mt-5">14.หน้าที่ของส่วนประกอบหมายเลข 4 คืออะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="1">
                    <label class="form-check-label" for="radio1">จับยึดชุดหัวเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="2">
                    <label class="form-check-label" for="radio2">จับยึดหัวจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="3">
                    <label class="form-check-label" for="radio3">เปลี่ยนความเร็วรอบ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q14" value="4">
                    <label class="form-check-label" for="radio4">ต้นกำลังขับเพลาเครื่องกัด</label>
                </div>

                <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 15-17</p>
                <img src="postest/Q15-17.PNG" alt="pic" style="width:70%">
                <p class="mt-5">15.ส่วนประกอบหมายเลข 1 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="1">
                    <label class="form-check-label" for="radio1">สวมเข้ากับรูเรียวของเพลาเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="2">
                    <label class="form-check-label" for="radio2">จับยึดดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="3">
                    <label class="form-check-label" for="radio3">ตั้งตำแหน่งดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q15" value="4">
                    <label class="form-check-label" for="radio4">ประคองเพลาจับดอกกัด</label>
                </div>

                <p class="mt-5">16.ส่วนประกอบหมายเลข 2 ทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q16" value="1">
                    <label class="form-check-label" for="radio1">ตั้งตำแหน่งดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q16" value="2">
                    <label class="form-check-label" for="radio2">รองรับหัวจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q16" value="3">
                    <label class="form-check-label" for="radio3">จับยึดเพลาจับดอกกัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q16" value="4">
                    <label class="form-check-label" for="radio4">ประคองเพลาจับดอกกัด</label>
                </div>

                <p class="mt-5">17.ส่วนประกอบหมายเลขใดใช้สวมเข้ากับตัวประคองเพลาจับดอกกัด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q17" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 1 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q17" value="2">
                    <label class="form-check-label" for="radio2">หมายเลข 2 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q17" value="3">
                    <label class="form-check-label" for="radio3">หมายเลข 3 </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q17" value="4">
                    <label class="form-check-label" for="radio4">หมายเลข 4 </label>
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