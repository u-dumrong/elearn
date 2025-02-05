document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "1",
        q2: "2",
        q3: "3",
        q4: "4",
        q5: "3",
        q6: "1",
        q7: "3",
        q8: "2",
        q9: "1",
        q10: "4",
        q11: "4",
        q12: "3",
        q13: "1",
        q14: "4",
        q15: "2",
        q16: "2",
        q17: "3",
        q18: "1",
        q19: "4"
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
    const data = { pre4: score };
    xhr.send(JSON.stringify(data));
});
