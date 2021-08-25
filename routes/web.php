<?php

use Illuminate\Support\Facades\Route;

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
    
  Route::get('/', 'IndexController@home');
  Route::get('meniu', 'IndexController@meniu');
  Route::get('plaja', 'IndexController@meniuPlaja');
  Route::get('bauturi', 'DrinksController@index');
  Route::get('plaja/bauturi', 'DrinksController@bauturiPlaja');
  Route::get('confidentialitate', 'IndexController@confidentialitate');
  Route::get('cookies', 'IndexController@cookies');
  Route::get('locale/{locale}', function($locale) {
  Session::put('locale', $locale);
  return redirect()->back();
});
Route::get('/storage/thumb/{query}/{file?}', 'ThumbController@index')
    ->where([
        'query' => '[A-Za-z0-9\:\;\-]+',
        'file'  => '[A-Za-z0-9\/\.\-\_]+',
    ])
    ->name('thumb');

