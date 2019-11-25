<?php
return array(
/** set your paypal credential **/
'client_id' =>env('PAYPAL_CLIENT_ID','AQvWjFUVD25KK39t4Rvxxjk7L_EjKIKujRX2qyZT7j1356ModVtuIozbzgMYgBR6_9POZoqDqEahjtS3'),
'secret' => env('PAYPAL_SECRET','ENm9x_6t7X5n26QPf-MuU4-oe9UFBXYh2-CMQgTy5G1tXp_8S4sXf9rdZvH1qiHRfJLikYk0EPVI__OZ'),
    /**
    * SDK configuration 
    */
    'settings' => array(
    /**
    * Available option 'sandbox' or 'live'
    */
    'mode' => env('PAYPAL_MODE','sandbox'),
    /**
    * Specify the max request time in seconds
    */
    'http.ConnectionTimeOut' => 30,
    /**
    * Whether want to log to a file
    */
    'log.LogEnabled' => true,
    /**
    * Specify the file that want to write on
    */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
    * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
    *
    * Logging is most verbose in the 'FINE' level and decreases as you
    * proceed towards ERROR
    */
    'log.LogLevel' => 'ERROR'
    ),
);
