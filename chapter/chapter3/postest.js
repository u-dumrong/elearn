document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "4",
        q2: "3",
        q3: "1",
        q4: "3",
        q5: "3",
        q6: "1",
        q7: "2",
        q8: "3",
        q9: "1",
        q10: "3",
        q11: "4",
        q12: "1",
        q13: "2",
        q14: "3",
        q15: "3"
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
            //window.location.href = '../../../profile.php';
        }
    };
    const data = { pos3: score };
    xhr.send(JSON.stringify(data));
});
