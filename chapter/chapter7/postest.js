document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "3",
        q2: "2",
        q3: "1",
        q4: "4",
        q5: "1",
        q6: "2",
        q7: "1",
        q8: "3",
        q9: "2",
        q10: "3",
        q11: "4",
        q12: "3",
        q13: "1",
        q14: "1",
        q15: "4"
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
    const data = { pos7: score };
    xhr.send(JSON.stringify(data));
});
