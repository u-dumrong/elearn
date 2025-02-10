document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "1",
        q2: "3",
        q3: "2",
        q4: "4",
        q5: "2",
        q6: "1",
        q7: "4",
        q8: "4",
        q9: "3",
        q10: "3",
        q11: "1",
        q12: "2",
        q13: "1",
        q14: "2"
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
    const data = { pos1: score };
    xhr.send(JSON.stringify(data));
});
