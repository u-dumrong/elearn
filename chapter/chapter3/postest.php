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

            for ($i = 1; $i <= 4; $i++) {
                echo '<div class="dropdown p-1">';
                echo '<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">';
                echo 'บทที่ ' . $i . " " . $lessons[$i - 1];
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="../chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
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
        <h1 class="text-center navyf">แบบทดสอบหลังเรียน</h1>
        <h2 class="text-danger text-center">บทที่ 3. ความรู้เบื้องต้นเกี่ยวกับเครื่องมือกล</h2>
        <p><b class="text-danger">คำชี้แจง :</b> จงเลือกคำตอบข้อที่ถูกต้องที่สุดเพียงคำตอบเดียว (14 คะแนน)</p>
        <form id="quizForm">
            <p class="mt-5">1.จากรูป คือ เครื่องเลื่อยกลชนิดใด</p>
            <img src="postest/Q1.PNG" alt="pic" style="width:70%">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="1">
                <label class="form-check-label" for="radio1">เครื่องเลื่อยกลสายพานแนวตั้ง</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="2">
                <label class="form-check-label" for="radio2">เครื่องเลื่อยวงเดือน</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="3">
                <label class="form-check-label" for="radio3">เครื่องเลื่อยกลแบบชัก</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="4">
                <label class="form-check-label" for="radio4">เครื่องเลื่อยกลสายพานแนวนอน</label>

                <p class="mt-5">2.ส่วนประกอบใดของเครื่องเลื่อยกลแบบชักทำหน้าที่จับยึดใบเลื่อย</p>
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

                <p class="mt-5">3.มอเตอร์ของเครื่องเลื่อยกลแบบชักทำหน้าที่อะไร</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="1">
                    <label class="form-check-label" for="radio1">ต้นกำลังขับโครงเลื่อย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="2">
                    <label class="form-check-label" for="radio2">จับยึดชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="3">
                    <label class="form-check-label" for="radio3">ควบคุมการทำงานของเครื่อง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q3" value="4">
                    <label class="form-check-label" for="radio4">จับยึดใบเลื่อย</label>
                </div>

                <p class="mt-5">4.เครื่องเลื่อยกลชนิดใดมีหลักการทำงานเป็นจังหวะคู่จังหวะชัก</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="1">
                    <label class="form-check-label" for="radio1">เครื่องเลื่อยกลสายพานตั้ง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="2">
                    <label class="form-check-label" for="radio2">เครื่องเลื่อยวงเดือน </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="3">
                    <label class="form-check-label" for="radio3">เครื่องเลื่อยกลแบบชัก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q4" value="4">
                    <label class="form-check-label" for="radio4">เครื่องเลื่อยกลสายพานนอน </label>
                </div>

                <p class="mt-5">5.ชุดเชื่อมต่อใบเลื่อยเป็นส่วนประกอบของเลื่อยกลชนิดใด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q5" value="1">
                    <label class="form-check-label" for="radio1">เครื่องเลื่อยกลแบบชัก</label>
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
                    <label class="form-check-label" for="radio4">เครื่องเลื่อยวงเดือน</label>
                </div>

                <p class="mt-5">6.ช่วยให้ใบเลื่อยเคลื่อนที่ได้ตรงและไม่เอนเอียงขณะตัดคือ หน้าที่ของส่วนประกอบใด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="1">
                    <label class="form-check-label" for="radio1">ชุดประคองใบเลื่อย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="2">
                    <label class="form-check-label" for="radio2">ชุดส่งกำลัง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="3">
                    <label class="form-check-label" for="radio3">ชุดเชื่อมต่อใบเลื่อย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q6" value="4">
                    <label class="form-check-label" for="radio4">ชุดล้อสายพาน</label>
                </div>

                <p class="mt-5">7.การตัดชิ้นงานที่มีความยาวเท่ากันหลายชิ้นด้วยเครื่องเลื่อยกลแบบชักควรใช้อุปกรณ์ใดช่วยตัด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="1">
                    <label class="form-check-label" for="radio1">เวอร์เนียคาลิเปอร์ </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="2">
                    <label class="form-check-label" for="radio2">แท่นรองรับชิ้นงาน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="3">
                    <label class="form-check-label" for="radio3">บรรทัดเหล็ก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q7" value="4">
                    <label class="form-check-label" for="radio4">อุปกรณ์ปรับตั้งความยาวตัด</label>
                </div>

                <p class="mt-5">8.เครื่องเลื่อยกลชนิดใดมีหลักการทำงาน คือ ให้ใบเลื่อยหมุนวนรอบตัวเองป้อนชิ้นงานเข้าหาใบเลื่อยด้วยมือ</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="1">
                    <label class="form-check-label" for="radio1">เครื่องเลื่อยกลแบบชัก</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="2">
                    <label class="form-check-label" for="radio2">เครื่องเลื่อยกลสายพานแนวนอน</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="3">
                    <label class="form-check-label" for="radio3">เครื่องเลื่อยกลสายพานแนวตั้ง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q8" value="4">
                    <label class="form-check-label" for="radio4">เครื่องเลื่อยวงเดือน</label>
                </div>

                <p class="mt-5">9.จากรูปข้อใด คือ ประแจบล็อก</p>
                <img src="postest/Q9.PNG" alt="pic" style="width:70%">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="1">
                    <label class="form-check-label" for="radio1">ความยาว</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="2">
                    <label class="form-check-label" for="radio2">ความกว้าง</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="3">
                    <label class="form-check-label" for="radio3">ระยะห่างของรูเจาะ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="4">
                    <label class="form-check-label" for="radio4">ความหนา</label>
                </div>

                <p class="mt-5">จากรูปจงใช้ตอบคำถามข้อ 10-12</p>
                <img src="postest/Q10.PNG" alt="pic" style="width:70%">
                <p class="mt-5">10.หมายเลข 1 คือ มุมอะไรของใบเลื่อยกลชัก</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="1">
                    <label class="form-check-label" for="radio1">มุมหลบ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="2">
                    <label class="form-check-label" for="radio2">มุมคมตัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="3">
                    <label class="form-check-label" for="radio3">มุมคาย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q10" value="4">
                    <label class="form-check-label" for="radio4">มุมตัด</label>
                </div>

                <p class="mt-5">11.หมายเลข 2 คือ มุมอะไรของใบเลื่อยกลชัก</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="1">
                    <label class="form-check-label" for="radio1">มุมคาย</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="2">
                    <label class="form-check-label" for="radio2">มุมตัด</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="3">
                    <label class="form-check-label" for="radio3">มุมหลบ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q11" value="4">
                    <label class="form-check-label" for="radio4">มุมคมตัด</label>
                </div>

                <p class="mt-5">12.มุมที่ช่วยคายเศษวัสดุออกจากฟันใบเลื่อยขณะตัด คือ มุมหมายเลขใด</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q12" value="1">
                    <label class="form-check-label" for="radio1">หมายเลข 1 </label>
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

                <p class="mt-5">13.ข้อใด คือ การจัดเรียงฟันใบเลื่อยแบบฟันเอียงซ้ายสลับฟันเอียงขวา (Straight Set)</p>
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

                <p class="mt-5">14. ข้อใด คือ การจัดเรียงฟันใบเลื่อยแบบชุดฟันเอียงซ้ายสลับชุดฟันเอียงขวา (Wave Set)</p>
                <div class="d-flex flex-column flex-md-row"> <!-- แนวตั้งบนมือถือ แนวนอนบนจอใหญ่ -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="1">
                        <label class="form-check-label" for="radio1">
                            <img src="postest/Q14A.PNG" alt="pic" style="width:60%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="2">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q14B.PNG" alt="pic" style="width:60%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="3">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q14C.PNG" alt="pic" style="width:60%">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="q14" value="4">
                        <label class="form-check-label" for="radio2">
                            <img src="postest/Q14D.PNG" alt="pic" style="width:60%">
                        </label>
                    </div>
                </div>

                <p class="mt-5">15.จากรูป ใบเลื่อยมีระยะพิตช์เท่าใด</p>
                <img src="postest/Q15.PNG" alt="pic" style="width:70%">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="1">
                    <label class="form-check-label" for="radio1">3 มิลลิเมตร </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="2">
                    <label class="form-check-label" for="radio2">4 มิลลิเมตร</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="3">
                    <label class="form-check-label" for="radio3">10 ฟันต่อนิ้ว</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="q9" value="4">
                    <label class="form-check-label" for="radio4">11 ฟันต่อนิ้ว</label>
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