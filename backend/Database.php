<?php

class Database {
    private static $instance = null;
    private $file = "sessions.json";

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function read() {
        return json_decode(file_get_contents($this->file), true);
    }

    public function write($data) {
        file_put_contents($this->file, json_encode($data));
    }
}