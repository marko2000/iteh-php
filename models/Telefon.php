<?php

class Telefon{

    public $telefon_id = 0;
    public $telefon_naziv = 0;

    public function getTelefon_id() {
        return $this->telefon_id;
    }

    public function getTelefon_naziv() {
        return $this->telefon_naziv;
    }

    public function setTelefon_id($telefon_id) {
        $this->telefon_id = $telefon_id;
    }

    public function setTelefon_naziv($telefon_naziv) {
        $this->telefon_naziv = $telefon_naziv;
    }

    public static function returnAllData() {
        include 'connection.php';
        
        $data = $mysqli->query('SELECT * FROM telefoni');
        $telefoniArray = array();
        
        while ($row = $data->fetch_assoc()) {
            $telefon = new Telefon();
            $telefon->setTelefon_id($row['telefon_id']);
            $telefon->setTelefon_naziv($row['telefon_naziv']);
            array_push($telefoniArray, $telefon);
        }

        return $telefoniArray;
    }

    public function save() {
        include_once 'connection.php';

        $data = $mysqli->query("INSERT INTO telefoni (telefon_naziv) VALUES ('$this->telefon_naziv')");

        if ($data > 0) return true;
        else return false;
    }

    public static function izbrisi($telefon_id) {
        include_once 'connection.php';

        $data = $mysqli->query('DELETE FROM telefoni WHERE telefon_id=' . $telefon_id);

        if ($data > 0) return true;
        else return false;
    }
}