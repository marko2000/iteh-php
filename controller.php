<?php

include 'models/Telefon.php';
include 'models/Ocena.php';

if (isset($_GET['telefon']) && $_GET['telefon'] == 'show') {
    echo json_encode(telefon::returnAllData());
}

if (isset($_GET['ocena']) && $_GET['ocena'] == 'show') {
    echo json_encode(ocena::returnAllData());
}

if (isset($_GET['ocena']) && $_GET['ocena'] == 'search') {
    if (isset($_GET['text'])) {
        echo json_encode(ocena::returnByName($_GET['text']));
    }
}

// if (isset($_GET['ocena']) && $_GET['ocena'] == 'sortAsc') {
//     echo json_encode(ocena::sortAsc());
// }

// if (isset($_GET['ocena']) && $_GET['ocena'] == 'sortDesc') {
//     echo json_encode(ocena::sortDesc());
// }

if (isset($_GET['izbrisi']) && $_GET['izbrisi'] == 'ocena') {
    if (ocena::izbrisi($_GET['id'])) {
        echo 'OK';
    } else {
        echo 'ERROR';
    }
}

if (isset($_GET['izbrisi']) && $_GET['izbrisi'] == 'telefon') {
    if (telefon::izbrisi($_GET['id'])) {
        echo 'OK';
    } else {
        echo 'ERROR';
    }
}