<?php 

return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AQvWjFUVD25KK39t4Rvxxjk7L_EjKIKujRX2qyZT7j1356ModVtuIozbzgMYgBR6_9POZoqDqEahjtS3'),
    'secret' => env('PAYPAL_SECRET','ENm9x_6t7X5n26QPf-MuU4-oe9UFBXYh2-CMQgTy5G1tXp_8S4sXf9rdZvH1qiHRfJLikYk0EPVI__OZ'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];

?>
