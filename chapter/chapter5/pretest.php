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

            for ($i = 1; $i <= 5; $i++) {
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
        <h2 class="text-danger text-center">บทที่ 5. เครื่องกลึง</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (15 คะแนน)</p>
        <form id="quizForm">
        <p class="mt-5">1. เครื่องกลึงยันศูนย์มีหลักการทำงานอย่างไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">ครื่องมือตัดเคลื่อนที่ตามสะพานแท่นเครื่อง แล้วเข้าตัดเฉือนชิ้นงานที่หยุดนิ่ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">ชิ้นงานหมุนรอบตัวเอง แล้วเคลื่อนที่เครื่องมือตัดเข้าตัดเฉือน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องมือตัดหมุนรอบตัวเอง แล้วเคลื่อนที่ชิ้นงานเข้าหาเครื่องมือตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">เครื่องมือตัดหมุนรอบตัวเอง แล้วเคลื่อนที่เข้าตัดเฉือนชิ้นงานที่หยุดนิ่ง</label>
            </div>

            <p class="mt-5">2. ส่วนประกอบใดของเครื่องกลึงยันศูนย์มีรูปร่างหน้าตัดด้านหนึ่งคล้ายตัววี</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1">ชุดแท่นเลื่อนขวาง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2">ชุดแท่นเลื่อน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3">ฐานเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4">สะพานแท่นเครื่อง</label>
            </div>

            <p class="mt-5">3. ชุดแท่นเลื่อนของเครื่องกลึงยันศูนย์ทำหน้าที่อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1">ปรับตั้งศูนย์มีดกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2">จับยึดชุดท้ายแท่น</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3">รองรับชุดแท่นเลื่อน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4">ปรับตั้งความเร็วรอบ</label>
            </div>

            <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 4-5</p>
            <img src="pretest/Q4-5.PNG" alt="pic" style="width:70%">
            <p class="mt-5">4. หมายเลข 7 ทำหน้าที่อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="1">
                <label class="form-check-label" for="radio1">ปรับตั้งตำแหน่งการประกอบกันของเฟืองในชุดเฟืองขับ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="2">
                <label class="form-check-label" for="radio2">เปลี่ยนตำแหน่งความเร็วรอบของหัวจับเป็นสูงหรือต่ำ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="3">
                <label class="form-check-label" for="radio3">ปรับตั้งความเร็วรอบของหัวจับ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4">เปลี่ยนทิศทางในการกลึงเกลียวขวาหรือเกลียวซ้าย</label>
            </div>

            <p class="mt-5">5. ใช้ปรับโยกเพื่อเปลี่ยนตำแหน่งความเร็วรอบของหัวจับเป็นสูงหรือต่ำคือ หน้าที่ของหมายเลขอะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1">หมายเลข 2</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2">หมายเลข 3</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3">หมายเลข 5</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4">หมายเลข 6</label>
            </div>

            <p class="mt-5">6. หน้าที่ชุดท้ายแท่นคือ อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">จับยึดหัวจับดอกสว่าน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">จับยึดดอกสว่านก้านตรง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">จับยึดมีดกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">ปรับตั้งศูนย์ชิ้นงาน</label>
            </div>

            <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 7-10</p>
            <img src="pretest/Q7-10.PNG" alt="pic" style="width:70%">
            <p class="mt-5">7. ทำหน้าที่ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามความยาวของสะพานแท่นเครื่องคือ หน้าที่ของหมายเลขอะไร</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                    หมายเลข 1
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                    หมายเลข 2
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio2">
                    หมายเลข 3
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio2">
                    หมายเลข 4
                    </label>
                </div>
            </div>

            <p class="mt-5">8. คีมชนิดใดมีปากด้านข้างเอียงเป็นคมตัดใช้สำหรับตัดเส้นลวดขนาดเล็กและสายไฟฟ้า</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1">หมายเลข 1</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2">หมายเลข 2</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3">หมายเลข 3</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4">หมายเลข 4</label>
            </div>

            <p class="mt-5">9. หมายเลข 1 ทำหน้าที่อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1">ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามความยาวของสะพานแท่นเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2">ตัดและต่อกำลังจากเฟืองขับไปยังเพลานำ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3">ขับชุดแท่นเลื่อนบนให้เคลื่อนที่ตามขวางของสะพานแท่นเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4">เปิด-ปิดการทำงานของหัวจับ</label>
            </div>

            <p class="mt-5">10. หน้าที่ของหมายเลข 4 คืออะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">เปิด-ปิดการทำงานของหัวจับ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">ขับชุดแท่นเลื่อนให้เคลื่อนที่ไปตามความยาวของสะพานแท่นเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">ตัดและต่อกำลังจากเฟืองขับไปยังเพลานำ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">ขับชุดแท่นเลื่อนบนให้เคลื่อนที่ตามขวางของสะพานแท่นเครื่อง</label>
            </div>

            <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 11-12</p>
            <img src="pretest/Q11-12.PNG" alt="pic" style="width:70%">
            <p class="mt-5">11. หมายเลข 1 คืออะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="1">
                <label class="form-check-label" for="radio1">แท่นเลื่อนบน (Top Slide)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="2">
                <label class="form-check-label" for="radio2">ชุดกล่องเฟือง (Apron Box)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="3">
                <label class="form-check-label" for="radio3">แท่นเลื่อนขวาง (Cross Slide)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q11" value="4">
                <label class="form-check-label" for="radio4">แท่นปรับเอียงป้อมมีด (Compound Rest)</label>
            </div>

            <p class="mt-5">12. หมายเลข 4 คืออะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1">แท่นเลื่อนขวาง (Cross Slide)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2">แท่นเลื่อนบน (Top Slide)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3">ชุดกล่องเฟือง (Apron Box)</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4">แท่นปรับเอียงป้อมมีด (Compound Rest)</label>
            </div>

            <p class="mt-5">จากรูป จงตอบคำถามข้อที่ 13-14</p>
            <img src="pretest/Q13-14.PNG" alt="pic" style="width:70%">
            <p class="mt-5">13. หมายเลข 1 ทำหน้าที่อะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="1">
                <label class="form-check-label" for="radio1">ประกอบยันศูนย์</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="2">
                <label class="form-check-label" for="radio2">ปรับความเร็วในการเคลื่อนที่ของแกนเพลา</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="3">
                <label class="form-check-label" for="radio3">ล็อกแกนเพลาไม่ให้เคลื่อนที่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="4">
                <label class="form-check-label" for="radio4">ล็อกชุดท้ายแท่นให้ยึดแน่นกับสะพานแท่นเครื่อง</label>
            </div>

            <p class="mt-5">14. หน้าที่ของหมายเลข 7 คืออะไร</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1">ประกอบยันศูนย์ หัวจับดอกสว่านและปลอกเรียว</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2">ปรับความเร็วในการเคลื่อนที่ของแกนเพลา</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3">ล็อกแกนเพลาไม่ให้เคลื่อนที่</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4">ล็อกชุดท้ายแท่นให้ยึดแน่นกับสะพานแท่นเครื่อง</label>
            </div>

            <p class="mt-5">15. ส่วนประกอบใดของเครื่องกลึงยันศูนย์ใช้รองรับชุดแท่นเลื่อน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="1">
                <label class="form-check-label" for="radio1">สะพานแท่นเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="2">
                <label class="form-check-label" for="radio2">ฐานเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="3">
                <label class="form-check-label" for="radio3">ชุดหัวเครื่อง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q15" value="4">
                <label class="form-check-label" for="radio4">ชุดท้ายแท่น</label>
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