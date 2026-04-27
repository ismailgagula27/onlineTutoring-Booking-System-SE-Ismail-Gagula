const API = "http://localhost/tutor-booking-se-lab8/backend/api.php";

function loadSessions() {
    fetch(API)
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById("list");
            list.innerHTML = "";

            data.forEach(s => {
                const li = document.createElement("li");
                li.innerText = s.student + " - " + s.time + " (" + s.payment + ")";
                list.appendChild(li);
            });
        });
}

function addSession() {
    const student = document.getElementById("student").value;
    const time = document.getElementById("time").value;
    const payment = document.getElementById("payment").value;

    if (!student || !time) {
        alert("Please enter name and time");
        return;
    }

    fetch(API, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ student, time, payment })
    })
    .then(res => res.json())
    .then(() => {
        loadSessions();
    });
}

loadSessions();