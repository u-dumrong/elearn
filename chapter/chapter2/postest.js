document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "3",
        q2: "4",
        q3: "2",
        q4: "3",
        q5: "1",
        q6: "2",
        q7: "4",
        q8: "1",
        q9: "3",
        q10: "3",
        q11: "1",
        q12: "2",
        q13: "1",
        q14: "4",
        q15: "1"
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
    const data = { pos2: score };
    xhr.send(JSON.stringify(data));
});
