document.getElementById('checkAnswers').addEventListener('click', function () {
    const correctAnswers = {
        q1: "1",
        q2: "2",
        q3: "4",
        q4: "3",
        q5: "1",
        q6: "4",
        q7: "1",
        q8: "3",
        q9: "3",
        q10: "4",
        q11: "1",
        q12: "4",
        q13: "2",
        q14: "2",
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
    const data = { pos5: score };
    xhr.send(JSON.stringify(data));
});
