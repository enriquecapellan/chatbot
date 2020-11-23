<?php

Use App\Interfaces\CurrencyInterface;
Use App\Interfaces\AccountInterface;
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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', 'WelcomeController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::get('currency', function(CurrencyInterface $repository) {
    dd($repository->all());
});
