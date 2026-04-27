const API = "http://localhost/backend/api.php";

function loadSessions() {
    fetch(API)
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById("list");
            list.innerHTML = "";

            data.forEach(s => {
                const li = document.createElement("li");
                li.innerText = s.student + " - " + s.time;
                list.appendChild(li);
            });
        });
}

function addSession() {
    const student = document.getElementById("student").value;
    const time = document.getElementById("time").value;

    fetch(API, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ student, time })
    }).then(() => loadSessions());
}

loadSessions();