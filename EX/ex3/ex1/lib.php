<?php
declare(strict_types=1);

function getServerInfoRows(array $server): array
{
    $rows = [
        'Päringumeetod' => $server['REQUEST_METHOD'],
        'Host' => $server['HTTP_HOST'],
        'Serveri port' => $server['REMOTE_PORT'],
        'Päringu URL' => $server['REQUEST_URI'],
        'Skripti asukoht' => $server['SCRIPT_FILENAME'],
        'Serveri tarkvara' => $server['SERVER_SOFTWARE'],
        'Dokumendijuure asukoht' => $server['DOCUMENT_ROOT']
    ];

    return $rows;
}
