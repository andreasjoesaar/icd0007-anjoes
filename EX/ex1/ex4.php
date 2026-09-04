<?php
$students = [
    ["name" => "Mari", "points" => 18],
    ["name" => "Karl", "points" => 12],
    ["name" => "Anna", "points" => 20],
    ["name" => "Karl", "points" => 15],
];
function getBestPointsByStudent(array $students): array
{
    $best_grades = [];
    foreach ($students as $name_points) {
        
        $name = $name_points["name"];
        $points = $name_points["points"];

        // Kui õpilase nimi on juba väljundmassiivis olemas, siis käivitub järgnev loogikaahel, mis otsustab, kas uus tulemus on parem kui vana:
        if (in_array($name, array_keys($best_grades), true)) {
            if ($points > $best_grades[$name]) {
                $best_grades[$name] = $points;
            };
        
        // Kui tulemust ei ole varasemast olemas, siis tekitab programm selle välijundmassiivi
        } else {
            $best_grades[$name] = $points;
        }
        
    }
    return $best_grades;
}