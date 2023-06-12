<?php

use App\Utilities\Generator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware ref. Make something great!
|
*/

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/', function () {
    $data = DB::raw('');

    return Generator::xlsx()
        ->fromBlade('sample')
        ->setData($data)
        ->render([
            'tgl_mrs',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
            'nama_pasien',
        ])
        ->generate();
});
