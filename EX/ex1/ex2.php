<?php
function contains(array $list, mixed $value): bool
{
    // Kui massiiv on tühi, on kindel, et see sisendväärtust ei sisalda
    if ($list === []) {
        return false;
    }
    
    foreach($list as $list_member) {
        if ($list_member === $value) {
            // Kui massiivi väärtus on sama, mis sisendväärtus, saab for-tsüklist väljuda
            return true;
            break;
        } 
        else {
            continue;
        }
    }

    // Kui for-tsüklist ei ole ennetähtaegselt väljutud, tähendab see, et väärtust massiivist ei leitud
    return false;
}