<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['user_id'])) {
    echo '<!DOCTYPE html>
    <html lang="th">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>แจ้งเตือน</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <style>
            body {
                text-align: center;
                padding: 50px;
                background-color: #f9f9f9;
            }
            .message-box {
                display: inline-block;
                padding: 20px;
                border: 2px solid #ff0000;
                background-color: #fff4f4;
                color: #ff0000;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .bg {
                animation: slide 1s ease-in-out infinite alternate;
                background-image: linear-gradient(-60deg, #fff4f4 50%, #ff0000 50%);
            }

            .bg2 {
                animation-duration: 2s;
            }

            .bg3 {
                animation-duration: 3s;
            }
        </style>
        <script>
            let countdown = 7; // เวลานับถอยหลังเริ่มต้น (วินาที)
            function startCountdown() {
                const timer = setInterval(() => {
                    document.getElementById("countdown").innerText = countdown;
                    countdown--;
                }, 1000);
            }
        </script>
    </head>
    <body onload="startCountdown()">
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>

        <div class="message-box">
            <h1>กรุณา Login เพื่อเข้าสู่ระบบ</h1>
            <p>ระบบจะนำคุณไปยังหน้าแรกใน <span id="countdown">7</span> วินาที...</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    ';
    header('refresh:7;index.html'); // รีไดเร็กต์ไปหน้าแรก
    exit();
}
