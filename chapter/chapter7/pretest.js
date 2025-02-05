document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "4",
        q2: "2",
        q3: "1",
        q4: "3",
        q5: "2",
        q6: "2",
        q7: "4",
        q8: "3",
        q9: "1",
        q10: "2",
        q11: "1",
        q12: "3",
        q13: "1",
        q14: "3",
        q15: "1",
        q16: "4",
        q17: "2"
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
    xhr.open("POST", "updateScore.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            //window.location.href = '../../../profile.php';
        }
    };
    const data = { pre7: score };
    xhr.send(JSON.stringify(data));
});
