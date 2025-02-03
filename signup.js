// ผู้ใช้คลิกปุ่ม signupButton แล้ว JavaScript สร้างข้อมูลฟอร์ม (FormData) จากฟอร์ม signupForm
document.getElementById('signupButton').addEventListener('click', function () {
    const formData = new FormData(document.getElementById('signupForm'));

    // ใช้ Fetch API ส่งข้อมูลนี้ไปยังไฟล์ PHP (processSignup.php) ด้วยเมธอด POST
    fetch('processSignup.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
                throw new Error('เครือข่ายตอบสนองไม่ปกติ');
            }
            return response.text();
    })
        .then(data => {
            alert(data); // แสดงข้อความตอบกลับด้วย alert() หรือพิมพ์ข้อผิดพลาดในคอนโซลหากเกิดปัญหา
            if (data.trim().includes("ลงทะเบียนสำเร็จในฐานะครู!") || data.trim().includes("ลงทะเบียนสำเร็จในฐานะนักเรียน!")){
                window.location.href = "login.html";
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("เกิดข้อผิดพลาดในการเชื่อมต่อ!");
        });
});

// เพิ่ม event listener ให้จับการกดปุ่ม Enter
document.getElementById('signupForm').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        // ป้องกันการ submit ฟอร์มปกติ
        event.preventDefault();
        // คลิกปุ่มลงชื่อเข้าใช้
        document.getElementById('signupButton').click();
    }
});