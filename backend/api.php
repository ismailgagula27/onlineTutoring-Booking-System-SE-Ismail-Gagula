<?php

header("Content-Type: application/json");

$file = "sessions.json";

// GET - vrati sve sesije
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo file_get_contents($file);
    exit;
}

// POST - dodaj novu sesiju
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $sessions = json_decode(file_get_contents($file), true);

    $newSession = [
        "id" => uniqid(),
        "student" => $data["student"],
        "time" => $data["time"]
    ];

    $sessions[] = $newSession;

    file_put_contents($file, json_encode($sessions));

    echo json_encode($newSession);
}