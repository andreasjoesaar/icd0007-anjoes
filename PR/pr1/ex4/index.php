<?php

define('DATA_FILE', __DIR__ . '/data.json');

// Siia jõuab list.php-s tehtud POST requesti array, kus on üks item (string mille kasutaja sisestas, nimega item)
if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
    $newItem = trim($_POST['item']) ?? '';
    // Võtame olemasolevast failist massiivi kujul andmed (kui ei ole faili, siis tekitame tühja massiivi)
    if ($newItem !== '') {
        $items = file_exists(DATA_FILE) ? json_decode(file_get_contents(DATA_FILE), true) : [];
        // Lisame uue rea massiivi
        $items[] = $newItem;
        // Kirjutame faili uuesti üle
        file_put_contents(DATA_FILE,json_encode($items, JSON_PRETTY_PRINT));
    }
    
    // Redirectime siiasamma faili tagasi (aga seekord teise meetodiga, mis teeb teisi asju ehk populate'ib items muutuja andmetega)
    header('Location: index.php');
    exit();
}

// See aktiveerub siis, kui lehte tavalisel kujul kuvatakse (ilma POST-ita) või siis pärast POST meetodi lõpus olevat suunamist
if ($_SERVER['REQUEST_METHOD'] === "GET")  {
    $items = [];
    $items = file_exists(DATA_FILE) ? json_decode(file_get_contents(DATA_FILE), true) : [];
    
}

// See kood pmst võimaldab kasutada $items muutujat list php koodis
require_once __DIR__ . '/list.php';
