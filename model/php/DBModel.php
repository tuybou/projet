<?php

require_once 'env_settings.php';

class DBModel {

    protected $db = null;
    protected $connected = false;

    public function __construct() {
        $this->connected = $this->connect_to_db();
    }

    private function connect_to_db() {
        global $host, $dbname, $user, $pwd;
        try {
            $this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return true;
        } catch (Exception $e) {
            die("Connection to the database failed: " . $e->getMessage());
        }
    }

}
