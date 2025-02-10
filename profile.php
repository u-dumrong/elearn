<?php
require 'session.php';
require 'dbConfig.php'; // เชื่อมต่อฐานข้อมูล

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

$user_id = $_SESSION['user_id'];

// ดึงข้อมูลพื้นฐานจากตาราง users
$stmt = $conn->prepare("SELECT profile_picture, username, email, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($profile_picture, $username, $email, $role);
$stmt->fetch();
$stmt->close();

// ตรวจสอบ role เพื่อดึงข้อมูลเพิ่มเติม
if ($role === 'student') {
    $stmt = $conn->prepare("SELECT pre1, pre2, pre3, pre4, pre5, pre6, pre7, pos1, pos2, pos3, pos4, pos5, pos6, pos7, total_score, student_group FROM students WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($pre1, $pre2, $pre3, $pre4, $pre5, $pre6, $pre7, $pos1, $pos2, $pos3, $pos4, $pos5, $pos6, $pos7, $total_score, $student_group);
    $stmt->fetch();
    $stmt->close();
} elseif ($role === 'teacher') {
    $stmt = $conn->prepare("SELECT department FROM teachers WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($department);
    $stmt->fetch();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>โปรไฟล์</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
            <a id="navLink" class="navbar-brand" href="student.php">
                <h4><img src="logo.png" alt="Logo" style="width:40px;">ทฤษฎีเครื่องมือกล</h4>
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
                <a class=" nav-link active" href="profile.php">โปรไฟล์</a>
            </button>
            <hr>
            <a href='logout.php' class="btn btn-danger m-1">ลงชื่อออก</a>
        </div>
    </div>

    <!-- เนื้อหา -->
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card" style="width:400px">
            <?php
            $profile_picture = !empty($profile_picture) ? $profile_picture : 'who.png';
            ?>
            <img class="card-img-top" src="uploads/<?php echo htmlspecialchars($profile_picture); ?>" alt="" style="width:100%">

            <div class="card-body">
                <p class="card-text"><strong>ชื่อผู้ใช้:</strong> <?php echo htmlspecialchars($username); ?></p>
                <p class="card-text"><strong>อีเมล:</strong> <?php echo htmlspecialchars($email); ?></p>

                <?php if ($role === 'student'): ?>
                    <p class="card-text"><strong>กลุ่มนักเรียน:</strong> <?php echo htmlspecialchars($student_group); ?></p>
                    <p class="card-text"><strong>คะแนนล่าสุด:</strong></p>
                    <?php
                    $score = [$pre1,  $pos1, $pre2, $pos2, $pre3, $pos3, $pre4, $pos4, $pre5, $pos5, $pre6, $pos6, $pre7, $pos7];

                    for ($i = 0; $i < count($score); $i++) {
                        if ($i % 2 == 0) {
                            echo "<p class='card-text'>สอบก่อนเรียนบทที่ " . (int)($i / 2 + 1) . ": " . "<strong>" . htmlspecialchars("$score[$i]") . "</strong><br>";
                        } else {
                            echo "สอบหลังเรียนบทที่ " . (int)($i / 2 + 1) . ": " . "<strong>" . htmlspecialchars("$score[$i]") . "</strong></p><br>";
                        }
                    }

                    echo "<p class='card-text'>รวม: " . "<strong>" . htmlspecialchars("$total_score") . "</strong></p>";
                    ?>

                <?php elseif ($role === 'teacher'): ?>
                    <p class="card-text"><strong>แผนก:</strong> <?php echo htmlspecialchars($department); ?></p>
                <?php endif; ?>
                <a href='editPro.php' class="btn navy text-white">แก้ไขโปรไฟล์</a>
            </div>
        </div>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let data = {
            role: '<?php echo $role; ?>' // ส่งค่าจาก PHP ไปยัง JavaScript
        };

        ["navLink", "navLink2"].forEach(id => {
            document.getElementById(id).addEventListener("click", function(event) {
                event.preventDefault();
                if (data.role === 'teacher') {
                    window.location.href = "teacher.php";
                } else if (data.role === 'student') {
                    window.location.href = "student.php";
                }
            });
        });
    </script>
</body>

</html>