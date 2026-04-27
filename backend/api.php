<?php

header("Content-Type: application/json");

require_once "services/BookingService.php";

$file = "sessions.json";



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo json_encode([]);
    }
    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $data = json_decode(file_get_contents("php://input"), true);

    
    if (!isset($data["student"]) || !isset($data["time"]) || !isset($data["payment"])) {
        echo json_encode(["error" => "Missing data"]);
        exit;
    }

    
    $bookingService = new BookingService();

    $result = $bookingService->book(
        $data["student"],
        $data["time"],
        $data["payment"]
    );

    echo json_encode($result);
    exit;
}


echo json_encode(["error" => "Invalid request method"]);