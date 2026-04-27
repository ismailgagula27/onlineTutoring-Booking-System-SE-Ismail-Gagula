<?php

require_once "../Database.php";
require_once "PaymentService.php";
require_once "../strategies/CardPayment.php";
require_once "../strategies/CashPayment.php";

class BookingService {

    public function book($student, $time, $paymentType) {

        $db = Database::getInstance();
        $sessions = $db->read();

        // Strategy izbor
        if ($paymentType === "card") {
            $strategy = new CardPayment();
        } else {
            $strategy = new CashPayment();
        }

        $paymentService = new PaymentService($strategy);
        $paymentResult = $paymentService->process(10);

        $newSession = [
            "id" => uniqid(),
            "student" => $student,
            "time" => $time,
            "payment" => $paymentResult
        ];

        $sessions[] = $newSession;
        $db->write($sessions);

        return $newSession;
    }
}