<?php
// เรียก config.php
require 'dbConfig.php';

/*
    - รับค่าจาก JavaScript
    - ตรวจสอบว่าคำขอที่เข้ามาเป็นแบบ POST
    - รับข้อมูล username, email, และ password จากฟอร์ม
    - กำหนดมาตรการความปลอดภัย:
        1. ป้องกัน SQL Injection ด้วย real_escape_string
        2. เข้ารหัสรหัสผ่าน ด้วย password_hash
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // ตรวจสอบรูปแบบอีเมล
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "รูปแบบอีเมลไม่ถูกต้อง!";
        exit; // หยุดกระบวนการถ้าอีเมลไม่ถูกต้อง
    }

    // ตรวจสอบว่ามี username หรือ email ซ้ำหรือไม่
    $checkSql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // ถ้ามีข้อมูลซ้ำ
        echo "เกิดข้อผิดพลาด: ชื่อหรืออีเมลนี้ถูกใช้แล้ว!";
    } else {
        // ถ้าไม่มีข้อมูลซ้ำ ให้เพิ่มข้อมูลใหม่
        $role = 'student'; // กำหนดบทบาทให้เป็น student โดยอัตโนมัติ
        // ตรวจสอบว่าตรงกับเงื่อนไขพิเศษสำหรับครู
        $teacherUsername = "teacher"; // ตัวอย่าง username ของครูที่อนุญาต
        $teacherPassword = "l1pv55y"; // ตัวอย่างรหัสผ่านของครูที่อนุญาต 

        if ($username === $teacherUsername && $password === $teacherPassword) {
            $role = 'teacher'; // ถ้าตรงกับเงื่อนไข ให้กำหนดบทบาทเป็น teacher
        }

        // เข้ารหัสรหัสผ่าน
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', '$role')";

        // ตรวจสอบว่าเพิ่มข้อมูลใน users สำเร็จหรือไม่
        if ($conn->query($sql) === TRUE) {
            $userId = $conn->insert_id; // ดึง ID ของผู้ใช้ที่เพิ่งเพิ่ม

            if ($role === 'student') {
                // เพิ่มข้อมูลในตาราง students
                $insertStudent = "INSERT INTO students (user_id) VALUES ('$userId')";
                if ($conn->query($insertStudent) === TRUE) {
                    //header('Content-Type: text/plain; charset=utf-8'); // ตั้งค่า header ให้ตอบกลับเป็นข้อความธรรมดา
                    echo "ลงทะเบียนสำเร็จในฐานะนักเรียน!";
                } else {
                    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลนักเรียน: " . $conn->error;
                }
            } else if ($role === 'teacher') {
                // เพิ่มข้อมูลในตาราง teachers ถ้าเป็นครู
                $insertTeacher = "INSERT INTO teachers (user_id) VALUES ('$userId')";
                if ($conn->query($insertTeacher) === TRUE) {
                    echo "ลงทะเบียนสำเร็จในฐานะครู!";
                } else {
                    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลครู: " . $conn->error;
                }
            }
        } else {
            echo "เกิดข้อผิดพลาดในการลงทะเบียน: " . $conn->error;
        }
    }
}
// ปิดการเชื่อมต่อ
$conn->close();
