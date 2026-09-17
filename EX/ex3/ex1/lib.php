<?php
declare(strict_types=1);

function getServerInfoRows(array $server): array
{  
    
    $rows = [
        [
            'label' => 'Päringumeetod',
            'value' => $server['REQUEST_METHOD'] ?? ''
        ],

        [
            'label' => 'Host',
            'value' => $server['HTTP_HOST'] ?? ''
        ],
        [
            'label' => 'Serveri port',
            'value' => $server['SERVER_PORT'] ?? ''
        ],
        [
            'label' => 'Päringu URL',
            'value' => $server['REQUEST_URI'] ?? ''
        ],
        [
            'label' => 'Skripti asukoht',
            'value' => $server['SCRIPT_FILENAME'] ?? ''
        ],
        [
            'label' => 'Serveri tarkvara',
            'value' => $server['SERVER_SOFTWARE'] ?? ''
        ],
        [
            'label' => 'Dokumendijuure asukoht',
            'value' => $server['DOCUMENT_ROOT'] ?? ''
        ],
        
        
    ];

    return $rows;
}
