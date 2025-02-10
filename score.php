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
$view_all2 = isset($_GET['view_all2']);

// ส่วนของ PHP ที่มีการบันทึกค่าของกลุ่มที่เลือก
$group = isset($_GET['group']) ? intval($_GET['group']) : (isset($_SESSION['selected_group']) ? $_SESSION['selected_group'] : 1);
$_SESSION['selected_group'] = $group;  // บันทึกค่าใน session

$sql = "SELECT u.username, u.profile_picture, s.student_group, s.pre1, s.pos1, s.pre2, s.pos2, 
s.pre3, s.pos3, s.pre4, s.pos4, s.pre5, s.pos5, s.pre6, s.pos6, s.pre7, s.pos7, s.total_score, s.total_score2 
FROM users u JOIN students s ON u.id = s.user_id WHERE u.role = 'student'";

if ($group) {
    $sql .= " AND s.student_group = $group"; // กรองตามกลุ่ม
}

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
    <nav class="navbar navbar-expand bg-light navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="teacher.php">
                <h4><img src="logo.png" alt="Logo" style="width:40px;">ทฤษฎีเครื่องมือกล</h4>
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="teacher.php">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="offcanvas" data-bs-target="#demo">เมนู</a>
                </li>
                <li class="nav-item">
                    <form method="GET" class="mt-2">
                        <input type="number" id="groupInput" name="group" min="1" placeholder="เลือกกลุ่ม" required>
                        <button type="submit" class="btn btn-warning">ดูนักเรียน</button>
                    </form>
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
            <button type="button" class="btn btn-warning m-1">
                <a class="nav-link active" href="score.php">รายชื่อนักเรียน</a>
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
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/pretest.php">แบบทดสอบก่อนเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/lesson.php">บทเรียน</a></li>';
                echo '<li><a class="dropdown-item" href="chapter/chapter' . $i . '/postest.php">แบบทดสอบหลังเรียน</a></li>';
                echo '</ul>';
                echo '</div>';
            }
            ?>
            <hr>
            <a href='logout.php' class="btn btn-danger m-1">ลงชื่อออก</a>
        </div>
    </div>

    <!-- เนื้อหา -->
    <div class="btn-group btn-group-md mt-1">
        <?php for ($i = 1; $i <= 7; $i++): ?>
            <a id="btn<?= $i; ?>" type="button" class="btn <?= ($i % 2 != 0) ? 'btn-warning' : 'btn-dark'; ?>" href="?pre=pre<?= $i; ?>&pos=pos<?= $i; ?>" onclick="setActiveButton(event, 'btn<?= $i; ?>')">
                ดูคะแนนสอบบทที่ <?= $i; ?>
            </a>
        <?php endfor; ?>
        <a id="view_all" type="button" class="btn btn-dark" href="?view_all=true" onclick="setActiveButton(event, 'view_all')">
            ดูคะแนนสอบก่อนเรียนทุกบท
        </a>
        <a id="view_all2" type="button" class="btn btn-warning" href="?view_all2=true" onclick="setActiveButton(event, 'view_all2')">
            ดูคะแนนสอบหลังเรียนทุกบท
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>รูป</th>
                <th>ชื่อ</th>
                <th>กลุ่มที่</th>
                <?php if ($view_all): ?>
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <th>บทที่ <?= $i; ?></th>
                    <?php endfor; ?>
                    <th>รวม</th>
                <?php elseif ($view_all2): ?>
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <th>บทที่ <?= $i; ?></th>
                    <?php endfor; ?>
                    <th>รวม</th>
                <?php else: ?>
                    <th>ก่อนเรียน</th>
                    <th>หลังเรียน</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    $profile_picture = !empty($row['profile_picture']) ? $row['profile_picture'] : 'who.png';
                    echo "<td><img src='uploads/" . $profile_picture . "' alt='Profile Picture' width='100'></td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['student_group'] . "</td>";
                    if ($view_all) {
                        for ($i = 1; $i <= 7; $i++) {
                            echo "<td>" . $row['pre' . $i] . "</td>";
                        }
                        echo "<td>" . $row['total_score'] . "</td>";
                    } elseif ($view_all2) {
                        for ($i = 1; $i <= 7; $i++) {
                            echo "<td>" . $row['pos' . $i] . "</td>";
                        }
                        echo "<td>" . $row['total_score2'] . "</td>";
                    } else {
                        echo "<td>" . $row[$pre] . "</td>";
                        echo "<td>" . $row[$pos] . "</td>";
                    }
                    echo "</tr>";
                }
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

        document.addEventListener("DOMContentLoaded", function() {
            // ตรวจสอบและทำให้ปุ่มที่เลือกก่อนหน้า active
            let activeButton = localStorage.getItem("activeButton");
            if (activeButton) {
                document.getElementById(activeButton)?.classList.add("active");
            }

            // ตรวจสอบค่า selected group ที่เก็บใน localStorage
            const selectedGroup = localStorage.getItem("selectedGroup");
            if (selectedGroup) {
                document.getElementById("groupInput").value = selectedGroup;
            }
        });

        function setActiveButton(event, id) {
            event.preventDefault(); // ป้องกันการรีเฟรชหน้าหลังจากคลิก
            localStorage.setItem("activeButton", id); // เก็บ id ของปุ่มที่เลือก

            // ลบคลาส 'active' จากทุกปุ่มแล้วเพิ่มให้ปุ่มที่ถูกเลือก
            document.querySelectorAll(".btn").forEach(btn => btn.classList.remove("active"));
            document.getElementById(id)?.classList.add("active");

            // ไปยัง URL ที่ถูกคลิก
            window.location.href = event.currentTarget.href;
        }
    </script>
</body>

</html>