<?php

use App\Http\Controllers\AssetController;
use App\Models\Asset;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', function () {
        //return view('welcome');
        return view('home');
    })->name('home');

    Route::view('/categories','categories.index')->name('categories');
    Route::view('/lendingAsset', 'lendingAssets.index')->name('lendingAssets');
    Route::view('/manageUsers', 'users.index')->name('manageUsers');
    Route::view('/manageAssets','manageItems.index')->name('manageItems');

    Route::get('/addAsset',[AssetController::class, 'create'])->name('addAsset');
    Route::post('/storeAsset', [AssetController::class, 'store'])->name('storeAsset');
});