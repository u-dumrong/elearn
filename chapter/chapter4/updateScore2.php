<?php
require "../../session.php";

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['pos1'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ไม่มีคะแนนส่งมา']);
    exit();
}

$score = intval($data['pos1']);
$user_id = $_SESSION['user_id'];

// อัพเดตคะแนนในฐานข้อมูล
require '../../dbConfig.php'; // ไฟล์สำหรับเชื่อมต่อฐานข้อมูล
$stmt = $conn->prepare("UPDATE students SET pos1 = ? WHERE user_id = ?");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL']);
    exit();
}
$stmt->bind_param("ii", $score, $user_id);
if ($stmt->execute()) {
    echo json_encode(['success' => 'คะแนนถูกบันทึกสำเร็จ']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'ไม่สามารถอัพเดตฐานข้อมูล']);
}
$stmt->close();
$conn->close();
?>
