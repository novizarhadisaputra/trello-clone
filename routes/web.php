<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::resource('card', CardController::class);
Route::resource('task', TaskController::class);

Route::get('/hitung/{angka1}/{angka2}', function ($angka1, $angka2) {
    $hasil = $angka1 + $angka2;
    return $hasil;
});

Route::get('/user/{name}', function ($name = []) {
    $kelas1 = [];

    $object1 = new stdClass;
    $object1->name = 'Mas Burhan';
    $object1->age = '30';
    $object1->status = 'Menikah';
    $object1->barang = ['tas', 'pulpen', 'alquran'];

    $object2 = new stdClass;
    $object2->name = 'Novizar';
    $object2->age = '27';
    $object2->status = 'Belum Menikah';
    $object2->barang = ['pulpen', 'alquran'];

    $object3 = new stdClass;
    $object3->name = 'Putra';
    $object3->age = '27';
    $object3->status = 'Lajang';
    $object3->barang = ['pulpen', 'alquran'];

    $kelas1[0] = $object1;
    $kelas1[1] = $object2;
    $kelas1[2] = $object3;

    foreach ($kelas1 as $value) {
        if ($value->status == 'Menikah') {
            echo $value->name . ' ' . $value->status . '<br>';
        } else {
            echo $value->name . ' adalah Jomblo' . '<br>';
        }
    }
    // return 'Success';
});

// Route::post('/terima-data', []);
