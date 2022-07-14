<?php

class Ocena {

    public $ocena_id;
    public $ocena_kriterijum;
    public $telefon_opis;
    public $telefon_ocena;
    public $telefon_id;

    public function getOcena_id() {
        return $this->ocena_id;
    }

    public function getOcena_kriterijum() {
        return $this->ocena_kriterijum;
    }

    public function getTelefon_opis() {
        return $this->telefon_opis;
    }

    public function getTelefon_ocena() {
        return $this->telefon_ocena;
    }

    public function getTelefon_id() {
        return $this->telefon_id;
    }

    public function setOcena_id($ocena_id) {
        $this->ocena_id = $ocena_id;
    }

    public function setOcena_kriterijum($ocena_kriterijum) {
        $this->ocena_kriterijum = $ocena_kriterijum;
    }

    public function setTelefon_opis($telefon_opis) {
        $this->telefon_opis = $telefon_opis;
    }

    public function setTelefon_ocena($telefon_ocena) {
        $this->telefon_ocena = $telefon_ocena;
    }

    public function setTelefon_id($telefon_id) {
        $this->telefon_id = $telefon_id;
    }

    public static function returnAllData() {
        include_once 'connection.php';

        $data = $mysqli->query('SELECT ocena_id, ocena_kriterijum, telefon_opis, telefon_ocena, ocene.telefon_id FROM telefoni, ocene WHERE telefoni.telefon_id=ocene.telefon_id');
        $oceneArray = array();

        while ($row = $data->fetch_assoc()) {
            $ocena = new Ocena();
            $ocena->setOcena_id($row['ocena_id']);
            $ocena->setOcena_kriterijum($row['ocena_kriterijum']);
            $ocena->setTelefon_opis($row['telefon_opis']);
            $ocena->setTelefon_ocena($row['telefon_ocena']);
            $ocena->setTelefon_id($row['telefon_id']);

            array_push($oceneArray, $ocena);
        }

        return $oceneArray;
    }

    public static function sortAsc() {
        include_once 'connection.php';

        $data = $mysqli->query("SELECT ocena_id, ocena_kriterijum, telefon_opis, telefon_ocena, ocene.telefon_id FROM telefoni, ocene WHERE telefoni.telefon_id=ocene.telefon_id ORDER BY telefon_ocena ASC");
        $oceneArray = array();

        while ($row = $data->fetch_assoc()) {
            $ocena = new Ocena();
            $ocena->setOcena_id($row['ocena_id']);
            $ocena->setOcena_kriterijum($row['ocena_kriterijum']);
            $ocena->setTelefon_opis($row['telefon_opis']);
            $ocena->setTelefon_ocena($row['telefon_ocena']);
            $ocena->setTelefon_id($row['telefon_id']);
        }

        return $oceneArray;
    }

    public static function sortDesc() {
        include_once 'connection.php';

        $data = $mysqli->query("SELECT ocena_id, ocena_kriterijum, telefon_opis, telefon_ocena, ocene.telefon_id FROM telefoni, ocene WHERE telefoni.telefon_id=ocene.telefon_id ORDER BY telefon_ocena DESC");
        $oceneArray = array();

        while ($row = $data->fetch_assoc()) {
            $ocena = new Ocena();
            $ocena->setOcena_id($row['ocena_id']);
            $ocena->setOcena_kriterijum($row['ocena_kriterijum']);
            $ocena->setTelefon_opis($row['telefon_opis']);
            $ocena->setTelefon_ocena($row['telefon_ocena']);
            $ocena->setTelefon_id($row['telefon_id']);
        }

        return $oceneArray;
    }

    public static function returnByName($naziv) {
        include_once 'connection.php';

        $data = $mysqli->query("SELECT ocena_id, ocena_kriterijum, telefon_opis, telefon_ocena, ocene.telefon_id FROM telefoni, ocene WHERE telefoni.telefon_id=ocene.telefon_id AND ocena_kriterijum LIKE '%$naziv%'");
        $oceneArray = array();

        while ($row = $data->fetch_assoc()) {
            $ocena = new Ocena();
            $ocena->setOcena_id($row['ocena_id']);
            $ocena->setOcena_kriterijum($row['ocena_kriterijum']);
            $ocena->setTelefon_opis($row['telefon_opis']);
            $ocena->setTelefon_ocena($row['telefon_ocena']);
            $ocena->setTelefon_id($row['telefon_id']);

            array_push($oceneArray, $ocena);
        }

        return $oceneArray;
    }

    public function save() {
        include_once 'connection.php';

        $data = $mysqli->query("INSERT INTO ocene (ocena_kriterijum, telefon_opis, telefon_ocena, telefon_id) VALUES ('$this->ocena_kriterijum', '$this->telefon_opis', '$this->telefon_ocena', '$this->telefon_id')");

        if ($data > 0) return true;
        else return false;
    }

    public static function izbrisi($ocena_id) {
        include_once 'connection.php';

        $data = $mysqli->query('DELETE FROM ocene WHERE ocena_id=' . $ocena_id);

        if ($data > 0) return true;
        else return false;
    }
}