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

            for ($i = 1; $i <= 1; $i++) {
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
        <h2 class="text-danger text-center">บทที่ 1. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm" data-chapter="1">
            <p class="mt-5">1. ข้อใด คือ ความหมายของเครื่องมือกล</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">สิ่งที่ประกอบด้วยชิ้นส่วนหลายชิ้นสำหรับใช้ก่อกำเนิดพลังงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">สิ่งที่ประกอบด้วยชิ้นส่วนหลายชิ้นสำหรับใช้แปรสภาพพลังงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องมือและอุปกรณ์ที่ใช้ในการแปรรูปหรือผลิตชิ้นงาน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">สิ่งที่ประกอบด้วยชิ้นส่วนหลายชิ้นสำหรับใช้ก่อกำเนิดพลังงานส่งพลังงาน</label>
            </div>

            <p class="mt-5">2. ข้อใด <b class="text-danger">ไม่ใช่</b> เครื่องมือกล</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="1">
                <label class="form-check-label" for="radio1">เครื่องเลื่อยกล</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="3">
                <label class="form-check-label" for="radio3">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="4">
                <label class="form-check-label" for="radio4">เครื่องยนต์</label>
            </div>

            <p class="mt-5">3. การแบ่งประเภทของเครื่องมือกลข้อใด <b class="text-danger">ไม่ถูกต้อง</b></p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจาะ, เครื่องคว้าน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="2">
                <label class="form-check-label" for="radio2">เครื่องเจียระไน, เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="3">
                <label class="form-check-label" for="radio3">เครื่องกัดเพลานอน, เครื่องกัดเพลาตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q3" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจียระไนลับคมตัด, เครื่องเจียระไนราบ</label>
            </div>

            <p class="mt-5">4. เครื่องมือกลชนิดใดที่แปรรูปโดยให้เครื่องมือตัดเคลื่อนที่ในแนวเส้น</p>
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
                <label class="form-check-label" for="radio3">เครื่องเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q4" value="4">
                <label class="form-check-label" for="radio4">เครื่องไส</label>
            </div>

            <p class="mt-5">5. เครื่องมือกลชนิดใดที่แปรรูปโดยให้เครื่องมือตัดหมุนรอบตัวเอง แล้วเลื่อนชิ้นงานเข้าหาเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="1">
                <label class="form-check-label" for="radio1">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="2">
                <label class="form-check-label" for="radio2">เครื่องกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="3">
                <label class="form-check-label" for="radio3">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q5" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยกล</label>
            </div>

            <p class="mt-5">6. เครื่องเลื่อยกลแบบชักจัดอยู่ในเครื่องมือกลกลุ่มใด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="1">
                <label class="form-check-label" for="radio1">กลุ่มทำงานตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="2">
                <label class="form-check-label" for="radio2">กลุ่มทำงานขัดหรือเจียระไน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="3">
                <label class="form-check-label" for="radio3">กลุ่มทำงานที่ชิ้นงานหมุนรอบตัวเอง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q6" value="4">
                <label class="form-check-label" for="radio4">กลุ่มทำงานเจาะหรือคว้านรู</label>
            </div>

            <p class="mt-5">7. เครื่องมือกลข้อใดแตกต่างจากพวก</p>
            <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">
                        <img src="pretest/7a.png" alt="ก." style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">
                        <img src="pretest/7b.png" alt="ข." style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">
                        <img src="pretest/7c.png" alt="ค." style="width:70%">
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">
                        <img src="pretest/7d.png" alt="ง." style="width:70%">
                    </label>
                </div>
            </div>

            <p class="mt-5">8. เครื่องมือกลกลุ่มใดมีหลักการทำงานโดยชิ้นงานจะถูกขึ้นรูปจากการสัมผัสกับส่วนที่หมุนของเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="1">
                <label class="form-check-label" for="radio1">เครื่องกัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="3">
                <label class="form-check-label" for="radio3">เครื่องเลื่อยกลแบบชัก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q8" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจียระไน</label>
            </div>

            <p class="mt-5">9. เครื่องมือกลกลุ่มใดมีหลักการทำงานโดยให้ชิ้นงานหมุนรอบตัวเอง แล้วเลื่อนเครื่องมือตัดเข้าตัดเฉือนชิ้นงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="3">
                <label class="form-check-label" for="radio3">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q9" value="4">
                <label class="form-check-label" for="radio4">เครื่องกัด</label>
            </div>

            <p class="mt-5">10. เครื่องมือกลกลุ่มใดมีหลักการทำงานโดยชิ้นงานถูกจับยึดแน่นกับที่ ส่วนเครื่องมือตัดหมุนรอบตัวเองและเคลื่อนที่ในแนวเส้นตรงเข้าตัดเฉือนชิ้นงาน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="3">
                <label class="form-check-label" for="radio3">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q10" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจียระไน</label>
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

            <p class="mt-5">12. เครื่องมือกลกลุ่มใดที่เครื่องมือตัดเคลื่อนที่ไป-กลับในแนวเส้นตรง แล้วเลื่อนชิ้นงานเข้าหาเครื่องมือตัด</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="1">
                <label class="form-check-label" for="radio1">เครื่องไส</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="2">
                <label class="form-check-label" for="radio2">เครื่องกลึง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="3">
                <label class="form-check-label" for="radio3">เครื่องเจาะ</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q12" value="4">
                <label class="form-check-label" for="radio4">เครื่องกัด</label>
            </div>

            <p class="mt-5">13. เครื่องมือกลข้อใดจัดอยู่ในกลุ่มที่จับยึดชิ้นงานอยู่กับที่ แล้วเลื่อนชิ้นงานเข้าหาเครื่องมือตัดที่หมุนรอบตัวเองเพื่อทำการตัดเฉือน</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="1">
                <label class="form-check-label" for="radio1"><img src="pretest/13a.png" alt="ก." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="2">
                <label class="form-check-label" for="radio2"><img src="pretest/13b.png" alt="ข." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="3">
                <label class="form-check-label" for="radio3"><img src="pretest/13c.png" alt="ค." style="width:70%"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q13" value="4">
                <label class="form-check-label" for="radio4"><img src="pretest/13d.png" alt="ง." style="width:70%"></label>
            </div>

            <p class="mt-5">14. เครื่องมือกลกลุ่มใดควบคุมการทำงานด้วยคอมพิวเตอร์</p>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="1">
                <label class="form-check-label" for="radio1">เครื่องเจียระไนลับคมตัด</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="2">
                <label class="form-check-label" for="radio2">เครื่องไสช่วงสั้น</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="3">
                <label class="form-check-label" for="radio3">เครื่องกลึงซีเอ็นซี</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q14" value="4">
                <label class="form-check-label" for="radio4">เครื่องเจาะรัศมี</label>
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