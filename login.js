document.getElementById('loginButton').addEventListener('click', function () {
    const formData = new FormData(document.getElementById('loginForm'));

    // ใช้ Fetch API เพื่อส่งคำขอไปยังไฟล์ PHP
    fetch('processLogin.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json(); // แปลงเป็น JSON
        })
        .then(data => {
            console.log("Server response:", data); // ตรวจสอบว่าข้อมูลที่ได้รับจาก PHP คืออะไร
            //alert(data); // แสดงข้อความตอบกลับ

            if (data.status === 'success') {
                alert("ล็อกอินสำเร็จ!");
                if (data.role === 'teacher') {
                    window.location.href = "teacher.php"; // เปลี่ยนไปหน้าหลักของครู
                } else if (data.role === 'student') {
                    window.location.href = "student.php"; // เปลี่ยนไปหน้าหลักของนักเรียน
                }
            } else {
                alert(data.message); // แสดงข้อความผิดพลาดจาก PHP
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("เกิดข้อผิดพลาดในการเชื่อมต่อกับเซิร์ฟเวอร์!");
        });
});

// เพิ่ม event listener ให้จับการกดปุ่ม Enter
document.getElementById('loginForm').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        // ป้องกันการ submit ฟอร์มปกติ
        event.preventDefault();
        // คลิกปุ่มเข้าสู่ระบบ
        document.getElementById('loginButton').click();
    }
});