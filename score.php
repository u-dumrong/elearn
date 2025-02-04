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

// กำหนดค่าเริ่มต้นของ pre และ pos
$pre = isset($_GET['pre']) ? $_GET['pre'] : 'pre1';
$pos = isset($_GET['pos']) ? $_GET['pos'] : 'pos1';
$view_all = isset($_GET['view_all']);

$sql = $view_all ? "SELECT u.username, u.profile_picture, s.pre1, s.pos1, s.pre2, s.pos2, 
s.pre3, s.pos3, s.pre4, s.pos4, s.pre5, s.pos5, s.pre6, s.pos6, s.pre7, s.pos7, s.total_score 
FROM users u JOIN students s ON u.id = s.user_id WHERE u.role = 'student'" :
    "SELECT u.username, u.profile_picture, s.$pre, s.$pos, s.total_score 
FROM users u JOIN students s ON u.id = s.user_id WHERE u.role = 'student'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>รายชื่อนักเรียน</title>
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
    <nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id="navLink" class="nav-link" href="#">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#demo">เมนู</a>
                </li>
            </ul>

            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="profile.php">โปรไฟล์</a>
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
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/lesson.php">บทเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/postest.php">แบบทดสอบหลังเรียน</a></li>';
                echo '</ul>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- เนื้อหา -->
    <div class="btn-group btn-group-md mt-1">
        <?php for ($i = 1; $i <= 7; $i++): if ($i % 2 != 0) { ?>
                <a type="button" class="btn btn-warning" href="?pre=pre<?= $i; ?>&pos=pos<?= $i; ?>">
                    ดู Pre<?= $i; ?> และ Pos<?= $i; ?>
                </a>
            <?php } else { ?>
                <a type="button" class="btn navy text-white" href="?pre=pre<?= $i; ?>&pos=pos<?= $i; ?>">
                    ดู Pre<?= $i; ?> และ Pos<?= $i; ?>
                </a>
        <?php }
        endfor; ?>
        <a type="button" class="btn navy text-white" href="?view_all=true">
            ดูทุกบทและ Total Score
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Profile Picture</th>
                <th>Username</th>
                <?php if ($view_all): ?>
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <th>Pre<?= $i; ?></th>
                        <th>Pos<?= $i; ?></th>
                    <?php endfor; ?>
                <?php else: ?>
                    <th>ก่อนเรียน</th>
                    <th>หลังเรียน</th>
                <?php endif; ?>
                <th>Total Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='uploads/" . $row['profile_picture'] . "' alt='Profile Picture' width='100'></td>";
                    echo "<td>" . $row['username'] . "</td>";
                    if ($view_all) {
                        for ($i = 1; $i <= 7; $i++) {
                            echo "<td>" . $row['pre' . $i] . "</td>";
                            echo "<td>" . $row['pos' . $i] . "</td>";
                        }
                    } else {
                        echo "<td>" . $row[$pre] . "</td>";
                        echo "<td>" . $row[$pos] . "</td>";
                    }
                    echo "<td>" . $row['total_score'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let data = {
            role: '<?php echo $role; ?>' // ส่งค่าจาก PHP ไปยัง JavaScript
        };

        document.getElementById("navLink").addEventListener("click", function(event) {
            event.preventDefault(); // ป้องกันการเปิดลิงก์ก่อนกำหนด
            if (data.role === 'teacher') {
                window.location.href = "teacher.php";
            } else if (data.role === 'student') {
                window.location.href = "student.php";
            }
        });
    </script>
</body>

</html>