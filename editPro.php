<?php
session_start();
require 'dbConfig.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html"); // ถ้ายังไม่ได้ล็อกอิน ส่งไปหน้า login
    exit();
}

$user_id = $_SESSION['user_id'];

// ดึงข้อมูลพื้นฐานจากตาราง users
$stmt = $conn->prepare("SELECT username, email, role, profile_picture FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email, $role, $profile_picture);
$stmt->fetch();
$stmt->close();

if ($role === 'teacher') {
    $stmt = $conn->prepare("SELECT department FROM teachers WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($department);
    $stmt->fetch();
    $stmt->close();
}

if ($role === 'teacher' && isset($_POST['department'])) {
    $new_department = trim($_POST['department']);

    // อัปเดต department ในฐานข้อมูล
    $stmt = $conn->prepare("UPDATE teachers SET department = ? WHERE user_id = ?");
    $stmt->bind_param("si", $new_department, $user_id);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // เช็คการอัปเดตชื่อและอีเมล
    $new_username = trim($_POST['username']);
    $new_email = trim($_POST['email']);

    // ถ้าชื่อหรืออีเมลว่างให้แสดงข้อความเตือน
    if (empty($new_username) || empty($new_email)) {
        $error_message = "กรุณากรอกชื่อและอีเมลให้ครบ";
    } else {
        // อัปเดตชื่อและอีเมลในฐานข้อมูล
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_username, $new_email, $user_id);
        $stmt->execute();
        $stmt->close();

        // อัปโหลดรูปโปรไฟล์
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
            $profile_picture_name = $_FILES['profile_picture']['name'];
            $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
            $upload_dir = 'uploads/';
            $upload_path = $upload_dir . basename($profile_picture_name);

            if (move_uploaded_file($profile_picture_tmp, $upload_path)) {
                // อัปเดตรูปโปรไฟล์ในฐานข้อมูล
                $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
                $stmt->bind_param("si", $profile_picture_name, $user_id);
                $stmt->execute();
                $stmt->close();
            }
        }

        // รีเฟรชหน้าหลังจากบันทึกข้อมูลแล้ว
        header("Location: profile.php");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>แก้ไขโปรไฟล์</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .custom-file-input {
            display: none;
        }
    </style>
</head>

<body>
    <!-- พื้นหลัง -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <!-- ส่วนหัว -->
    <div class="p-5 navy text-white text-center">
        <h1>แก้ไขโปรไฟล์</h1>
    </div>

    <!-- เนื้อหา -->
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card" style="width:400px">
            <?php if ($profile_picture): ?>
                <img class="card-img-top" src="uploads/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="width:100%">
            <?php else: ?>
                <p>ยังไม่มีรูปโปรไฟล์</p>
            <?php endif; ?>
            </p>
            <?php if (isset($error_message)): ?>
                <p style="color:red;"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <div class="card-body">
                <form action="editPro.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label"><b>ชื่อผู้ใช้:</b></label>
                        <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" placeholder="กรอกชื่อผู้ใช้งาน" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><b>อีเมล:</b></label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="กรอกอีเมล" required>
                    </div>

                    <?php if ($role === 'teacher'): ?>
                        <div class="mb-3">
                        <label for="department" class="form-label"><b>แผนก:</b></label>
                        <input type="text" name="department" class="form-control" value="<?php echo htmlspecialchars($department); ?>" placeholder="กรอกแผนก" required>
                    </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="file" class="btn btn-warning w-100">เลือกรูปภาพ</label>
                        <input type="file" name="profile_picture" accept="image/*" id="file" class="custom-file-input">
                    </div>

                    <button type="submit" class="btn navy text-white w-100">ตกลง</button>
                </form>

            </div>
        </div>
    </div>

    <!-- ส่วนท้าย -->
    <div class="mt-5 p-4 bg-dark text-center">
        <a href="mailto:66309010042@udontech.ac.th" class="text-warning">66309010042@udontech.ac.th</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>