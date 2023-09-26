<?php

use Illuminate\Support\Facades\Route;
Route::get('/sample', function () {
    return view('sample', ['name' => 'varsha']);
});
?>