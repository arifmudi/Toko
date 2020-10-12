<?php 

return [
    'services' =>[
        'rajaongkir' => [
            'api_key' => env('RAJAONGKIR_KEY', null),
            'origin' => env('RAJAONGKIR_ORIGIN', null),
        ],
        'midtrans' => [
            'endpoint' => env('MIDTRANS_endpoint', 'https://app.sandbox.midtrans.com/snap/v1/'),
            'client_key' => env('MIDTRANS_Client_Key', null),
            'server_key' => env('MIDTRANS_Server_Key', null),
            'merchant_id' => env('MIDTRANS_ID_Merchant', null),
        ]
    ],
];