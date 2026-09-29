<?php
declare(strict_types=1);

function readNotice(?string $filename = null): string
{
    return "";
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    echo readNotice();
}
