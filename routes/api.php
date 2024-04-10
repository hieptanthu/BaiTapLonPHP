<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/example', function () {
    dd("oke");
    return response()->json(['message' => 'This is an example API endpoint']);
});