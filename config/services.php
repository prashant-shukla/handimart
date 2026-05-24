<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN')
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '23817254976-jmhj7282un14h81t85gkl497rv0n2lmd.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],
    'facebook' => [
        'client_id' => '226408686891746',
        'client_secret' => '82e46f499590dd295c61be771370ceaf',
        'redirect' => ' ',
    ],

];
