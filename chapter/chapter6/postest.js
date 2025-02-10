document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "2",
        q2: "4",
        q3: "1",
        q4: "1",
        q5: "3",
        q6: "4",
        q7: "2",
        q8: "4",
        q9: "1",
        q10: "1",
        q11: "1",
        q12: "2",
        q13: "3",
        q14: "2",
        q15: "1",
        q16: "1",
        q17: "3"
    };

    const form = document.getElementById("quizForm");
    const formData = new FormData(form);

    let score = 0;
    for (let [question, answer] of formData.entries()) {
        if (correctAnswers[question] === answer) {
            score++;
        }
    }

    const totalQuestions = Object.keys(correctAnswers).length;
    alert(`คุณได้คะแนน ${score} เต็ม ${totalQuestions}`);

    // ส่งคะแนนไปยังเซิร์ฟเวอร์
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "updateScore2.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            window.location.href = '../../profile.php';
        }
    };
    const data = { pos6: score };
    xhr.send(JSON.stringify(data));
});
