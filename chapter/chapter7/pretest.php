<?php
require "../../session.php";

// เชื่อมต่อฐานข้อมูล
require '../../dbConfig.php'; // ไฟล์สำหรับเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่า user_id อยู่ใน session หรือไม่
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // ดึงข้อมูล role จากฐานข้อมูล
    $stmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row['role'];
    } else {
        $role = 'student'; // กำหนดค่าเริ่มต้นในกรณีที่ไม่พบข้อมูล
    }

    $stmt->close();
} else {
    $role = 'student'; // กรณีไม่มี session กำหนดค่าเริ่มต้นเป็น student
}

$conn->close();
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
    <nav class="navbar navbar-expand bg-light navbar-light fixed-top">
        <div class="container-fluid">
            <a id="navLink" class="navbar-brand" href="#">
                <h4><img src="../../logo.png" alt="Logo" style="width:40px;">ทฤษฎีเครื่องมือกล</h4>
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a id="navLink2" class="nav-link" href="#">หน้าแรก</a>
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
                <a class=" nav-link active" href="../../profile.php">โปรไฟล์</a>
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
                echo '<li><a class="dropdown-item" href="../chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="../chapter' . $i . '/lesson.php">บทเรียน</a></li>';
                echo '</ul>';
                echo '</div>';
            }
            ?>
            <hr>
            <a href='../../logout.php' class="btn btn-danger m-1">ลงชื่อออก</a>
        </div>
    </div>

    <!-- แบบทดสอบ -->
    <div class="container p-5 my-5 bg-white">
        <h1 class="text-center navyf">แบบทดสอบก่อนเรียน</h1>
        <h2 class="text-danger text-center">บทที่ 7. เครื่องเจียระไน</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (15 คะแนน)</p>
        <form id="quizForm">
        <p class="mt-5">1. ข้อใด คือ เครื่องเจียระไนลับคมตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q1A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q1B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q1C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q1D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">2. จากรูป คือ เครื่องเจียระไนชนิดใด</p>
            <img src="pretest/Q2.PNG" alt="pic" style="width:70%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจียระไนทรงกระบอก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจียระไนราบ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจียระไนลับคมตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจียระไนไร้ศูนย์</label>
            </div>

            <p class="mt-5">3. ฐานของเครื่องเจียระไนลับคมตัดทำหน้าที่อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1">รองรับน้ำหนักของเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2">ติดตั้งถังบรรจุน้ำหล่อเย็น</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3">รองรับแท่นเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4">รองรับมอเตอร์</label>
            </div>

            <p class="mt-5">4. ส่วนประกอบใดของเครื่องเจียระไนลับคมตัด ใช้รองรับน้ำหนักของมอเตอร์และล้อหินเจียระไน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="1">
                <label class="form-check-label" for="radio1">แท่นรองรับชิ้นงาน (Tool Rest)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="2">
                <label class="form-check-label" for="radio2">ถังบรรจุน้ำหล่อเย็น (Water Pot)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="3">
                <label class="form-check-label" for="radio3">แท่นเครื่อง (Pedestal)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4">ขาตั้ง (Stand)</label>
            </div>

            <p class="mt-5">5. ส่วนประกอบใดของเครื่องเจียระไนลับคมตัดทำหน้าที่ขูดหรือตัดเฉือนผิวของชิ้นงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1">แท่นรองรับชิ้นงาน (Tool Rest)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2">ล้อหินเจียระไน (Grinding Wheel)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3">ฝาครอบล้อหินเจียระไน (Grinding Wheel Guard)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4">สวิตช์ควบคุม (Control Switch)</label>
            </div>

            <p class="mt-5">6. ใช้ป้องกันเศษจากการเจียระไนไม่ให้กระเด็นเข้าตาคือ หน้าที่ของส่วนประกอบใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">ล้อหินเจียระไน (Grinding Wheel)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">กระจกนิรภัย (Safety Glass)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">ฝาครอบล้อหินเจียระไน (Grinding Wheel Guard)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">ถังบรรจุน้ำหล่อเย็น (Water Pot)</label>
            </div>

            <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 7-9</p>
            <img src="pretest/Q7-9.PNG" alt="pic" style="width:70%">
            <p class="mt-5">7. หมายเลข 1 คือ อะไร</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                    แท่นเครื่อง
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                    สวิตช์ควบคุม
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio2">
                    ล้อหินเจียระไน
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio2">
                    มอเตอร์
                    </label>
                </div>
            </div>

            <p class="mt-5">8. ใช้รองรับชิ้นงาน คือ หน้าที่ของหมายเลขอะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1">หมายเลข 3</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2">หมายเลข 4</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3">หมายเลข 6</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4">หมายเลข 8</label>
            </div>

            <p class="mt-5">9. หมายเลขใดทำหน้าที่เป็นต้นกำลังขับล้อหินเจียระไน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1">หมายเลข 1</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2">หมายเลข 3</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3">หมายเลข 5</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4">หมายเลข 7</label>
            </div>

            <p class="mt-5">10. ข้อใด ไม่ใช่ จุดมุ่งหมายในการแต่งหน้าล้อหินเจียระไน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">เพื่อขยายช่องลับเศษโลหะของล้อหินเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">เพื่อลบรอยร้าวของล้อหินเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">เพื่อทำให้ล้อหินเจียระไนทำให้เกิดคมตัดใหม่ขึ้น</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">เพื่อทำให้หน้าล้อหินเจียระไนได้รูปพรรณและขนาดอยู่ในพิกัด</label>
            </div>

            <p class="mt-5">11. เครื่องมือหรืออุปกรณ์ข้อใดใช้สำหรับแต่งหน้าล้อหินเจียระไน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q11A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q11B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q11C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q11D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">12. อุปกรณ์ในข้อใดใช้วัดมุมคมตัดของมีดกลึง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q12A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q12B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q12C.PNG" alt="pic" style="width:70%">></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q12D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">13. เครื่องมือวัดในข้อใดใช้วัดมุมเกลียวสี่เหลี่ยมคางหมูเมตริก (Trapezoid Thread Gauge)</p>
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

            <p class="mt-5">14. เครื่องมือวัดในข้อใดใช้วัดมุมคมตัดของมีดกลึง มีดไสและดอกสว่านได้</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q14A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q14B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q14C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q14D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">15. การปรับแท่นรองรับชิ้นงานควรให้มีระยะห่างจากขอบหน้าล้อหินเจียระไนเท่าใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="1">
                <label class="form-check-label" for="radio1">ประมาณ 1-2 มิลลิเมตร</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="2">
                <label class="form-check-label" for="radio2">ประมาณ 3-5 มิลลิเมตร</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="3">
                <label class="form-check-label" for="radio3">เท่ากับความหนาของชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="4">
                <label class="form-check-label" for="radio4">เท่ากับความหนาของล้อหินเจียระไน</label>
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
    <script>
        let data = {
            role: '<?php echo $role; ?>' // ส่งค่าจาก PHP ไปยัง JavaScript
        };

        ["navLink", "navLink2"].forEach(id => {
            document.getElementById(id).addEventListener("click", function(event) {
                event.preventDefault();
                if (data.role === 'teacher') {
                    window.location.href = "../../teacher.php";
                } else if (data.role === 'student') {
                    window.location.href = "../../student.php";
                }
            });
        });
    </script>
</body>

</html>