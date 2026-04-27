<?php

class PaymentService {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function process($amount) {
        return $this->strategy->pay($amount);
    }
}