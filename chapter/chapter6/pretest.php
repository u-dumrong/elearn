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

            for ($i = 1; $i <= 6; $i++) {
                echo '<div class="dropdown p-1">';
                echo '<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">';
                echo 'บทที่ ' . $i . " " . $lessons[$i - 1];
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="../chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="../chapter' . $i . '/lesson.php">บทเรียน</a></li>';
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
        <h2 class="text-danger text-center">บทที่ 6. เครื่องกัด</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (15 คะแนน)</p>
        <form id="quizForm">
        <p class="mt-5">1. ข้อใดคือ เครื่องกัดเพลานอนแบบธรรมดา</p>
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

            <p class="mt-5">2. ข้อใดคือ เครื่องกัดซีเอ็นซี</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q2A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q2B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q2C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q2D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">3. ข้อใดคือ เครื่องกัดเพลาตั้ง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/Q3A.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/Q3B.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/Q3C.PNG" alt="pic" style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/Q3D.PNG" alt="pic" style="width:70%"></label>
            </div>

            <p class="mt-5">4. ส่วนประกอบใดของเครื่องกัดทำหน้าที่เคลื่อนที่โต๊ะงานขึ้น-ลงในแนวตั้ง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="1">
                <label class="form-check-label" for="radio1">แคร่เลื่อน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="2">
                <label class="form-check-label" for="radio2">โครงเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="3">
                <label class="form-check-label" for="radio3">โต๊ะงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4">แท่นเลื่อน</label>
            </div>

            <p class="mt-5">5. ส่วนประกอบใดของเครื่องกัดทำหน้าที่จับยึดชิ้นงานหรือปากกาจับงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1">แคร่เลื่อน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2">โครงเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3">โต๊ะงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4">แท่นเลื่อน</label>
            </div>

            <p class="mt-5">6. ส่วนประกอบใดของเครื่องกัดทำหน้าที่จับยึดหัวจับดอกกัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">คานยื่น</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">เพลาเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">ชุดหัวเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">โครงเครื่อง</label>
            </div>

            <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 7-10</p>
            <img src="pretest/Q7-10.PNG" alt="pic" style="width:70%">
            <p class="mt-5">7. ส่วนประกอบหมายเลข 1 เรียกว่าอะไร</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                    มอเตอร์
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                    แขนโยกป้อนกัด
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio2">
                    แคร่เลื่อน
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio2">
                    แกนเพลา
                    </label>
                </div>
            </div>

            <p class="mt-5">8. ส่วนประกอบหมายเลข 2 เรียกว่าอะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1">แคร่เลื่อน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2">เพลาเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3">ชุดหัวเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4">มอเตอร์</label>
            </div>

            <p class="mt-5">9. หน้าที่ของส่วนประกอบหมายเลข 3 คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1">จับยึดชุดหัวเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2">ต้นกำลังขับเพลาเครื่องกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3">ปรับเอียงชุดหัวเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4">เปลี่ยนความเร็วรอบ</label>
            </div>

            <p class="mt-5">10. หน้าที่ของส่วนประกอบหมายเลข 4 คือ</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">จับยึดชุดหัวเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">จับยึดหัวจับดอกกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">เปลี่ยนความเร็วรอบ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">ต้นกำลังขับเพลาเครื่องกัด</label>
            </div>

            <p class="mt-5">11. ส่วนประกอบใดของเครื่องกัดใช้จับยึดคานยื่นและแท่นเลื่อน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="1">
                <label class="form-check-label" for="radio1">โครงเครื่อง (Column)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="2">
                <label class="form-check-label" for="radio2">ฐานเครื่อง (Base)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="3">
                <label class="form-check-label" for="radio3">คานยื่น (Over Arm)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="4">
                <label class="form-check-label" for="radio4">โต๊ะงาน (Table)</label>
            </div>

            <p class="mt-5">12. ติดตั้งอยู่ด้านบนของโครงเครื่องและทำหน้าที่เป็นจับยึดเพลาจับดอกกัดคือ ส่วนประกอบใดของเครื่องกัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1">โครงเครื่องกัด (Column)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2">ฐานเครื่อง (Base)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3">แท่นเลื่อน (Knee)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4">คานยื่น (Over Arm)</label>
            </div>

            <p class="mt-5">13. ติดตั้งอยู่ด้านบนของแคร่เลื่อนและทำหน้าที่จับยึดชิ้นงานคือ ส่วนประกอบใดของเครื่องกัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="1">
                <label class="form-check-label" for="radio1">แท่นเลื่อน (Knee)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="2">
                <label class="form-check-label" for="radio2">โต๊ะงาน (Table)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="3">
                <label class="form-check-label" for="radio3">แคร่เลื่อน (Saddle)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="4">
                <label class="form-check-label" for="radio4">เพลาเครื่องกัด (Spindle)</label>
            </div>

            <p class="mt-5">14. ส่วนประกอบใดของเครื่องกัดที่ติดตั้งอยู่กับร่องหางเหยี่ยวด้านหน้าของโครงเครื่อง</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1">แคร่เลื่อน (Saddle)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2">ตัวประคองเพลาจับยึดดอกกัด (Arbor Support)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3">แท่นเลื่อน (Knee)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4">สกรูรองรับแท่นเลื่อน (Vertical Screw Support)</label>
            </div>

            <p class="mt-5">15. ส่วนประกอบใดของเครื่องกัดที่ติดตั้งอยู่ด้านบนของแท่นเลื่อนและทำหน้าที่รองรับโต๊ะงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="1">
                <label class="form-check-label" for="radio1">แคร่เลื่อน (Saddle)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="2">
                <label class="form-check-label" for="radio2">ตัวประคองเพลาจับยึดดอกกัด (Arbor Support)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="3">
                <label class="form-check-label" for="radio3">สกรูรองรับแท่นเลื่อน (Vertical Screw Support)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="4">
                <label class="form-check-label" for="radio4">เพลาเครื่องกัด (Spindle)</label>
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