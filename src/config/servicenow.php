<?php

return [
    'instance' => env('SERVICENOW_INSTANCE'),

    'auth' => [
        'type' => env('SERVICENOW_OAUTH_TYPE', 'client'),
        'client_id' => env('SERVICENOW_CLIENT_ID'),
        'client_secret' => env('SERVICENOW_CLIENT_SECRET'),
        'username' => env('SERVICENOW_USERNAME'),
        'password' => env('SERVICENOW_PASSWORD'),
    ],
];
