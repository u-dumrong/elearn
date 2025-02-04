document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "2",
        q2: "1",
        q3: "3",
        q4: "1",
        q5: "4",
        q6: "4",
        q7: "3",
        q8: "2",
        q9: "2",
        q10: "3",
        q11: "4",
        q12: "3",
        q13: "4",
        q14: "2",
        q15: "1",
        q16: "3",
        q17: "3",
        q18: "4",
        q19: "1",
        q20: "3",
        q21: "2",
        q22: "3",
        q23: "3",
        q24: "2",
        q25: "2"
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
