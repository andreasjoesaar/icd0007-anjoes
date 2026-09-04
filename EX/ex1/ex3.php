<?php
function stringToIntegerList(string $input): array
{
    $array_as_int = [];
    foreach (explode(",",trim($input, "[]")) as $str) {
        array_push($array_as_int,intval($str));
    }
    /*  1. trim() eemaldab sõnest sümbolid "[" ja "]".
        2. explode() muudab saadud sõne massiiviks, kasutades sümbolit "," massiivi elementide eraldamiseks.
        3. for-tsükkel käib läbi saadud sõnedest koosneva massiivi ja intval() muudab sõned täisarvudeks.
        4. array_push() lisab saadud täisarvud uude massiivi, mis seejärel saab funktsiooni väljundiks.
    */

    return $array_as_int;
}