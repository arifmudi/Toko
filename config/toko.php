<?php 

return [
    'services' =>[
        'rajaongkir' => [
            'api_key' => env('RAJAONGKIR_KEY', null),
            'origin' => env('RAJAONGKIR_ORIGIN', null),
        ],
    ],
];