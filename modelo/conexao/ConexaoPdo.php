<?php

class ConexaoPdo {

    private static $instancia;
    private $db;

    private function __construct() {
        try {
            $host = "172.27.0.123";
            $user = "banco";
            $pass = "hilfiger";
            $dbname = "oscar_2014";

            $this->db = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->db->exec("SET lc_time_names='pt_br'");
        } catch (PDOException $e) {
            throw new BancoException($e);
        }
    }

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new ConexaoPdo();
        }
        return self::$instancia;
    }

    public function getDb() {
        return $this->db;
    }

}
