<?php

return [

    'cache' => [
        'enabled' => true,

        'service' => PragmaRX\Countries\Support\Cache::class,

        'duration' => 180,
    ],

    'hydrate' => [
        'before' => true,

        'after' => true,

        'elements' => [
            'flag' => false,
            'currency' => false,
            'states' => true,
            'timezone' => true,
            'borders' => false,
            'topology' => false,
            'geometry' => false,
            'collection' => true,
        ],
    ],

];
