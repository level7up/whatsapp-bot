<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $whatsapp = new \App\Services\WhatsAppService();
    $whatsapp->sendMessage('201002874060', 'Hello from Laravel!');
    dd('sss');
    return view('welcome');
});
