<?php
session_start();

require 'dbConfig.php'; // เรียกการเชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $conn->real_escape_string($_POST['identifier']); // รับค่าชื่อผู้ใช้หรืออีเมล
    $password = $_POST['password'];

    // ตรวจสอบทั้งชื่อผู้ใช้และอีเมล
    $sql = "SELECT * FROM users WHERE username = '$identifier' OR email = '$identifier'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // รับข้อมูลผู้ใช้จากฐานข้อมูล
        $user = $result->fetch_assoc();

        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {

            // ตั้งค่าข้อมูลใน session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // เพิ่ม role ใน session

            // ส่งข้อมูล role กลับไปยัง JavaScript
            echo json_encode(['status' => 'success', 'role' => $user['role']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'รหัสผ่านไม่ถูกต้อง!']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ไม่พบชื่อผู้ใช้หรืออีเมลนี้ในระบบ!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
