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

Route::get('/test', function() {
    // $a = null;
    // echo $a . "\n";
    // print $a . "\n";
    // print_r([],'222'). "\n";
    // var_dump($a);
    print_r([]);
});


Route::get('/', "home\IndexController@index");
Route::get('/index', "home\IndexController@index");
Route::get('/detail/{id}/{category?}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\DetailController@index");
// Route::get('/videoType/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@videoType");
Route::get('/films/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@films");
Route::get('/soaps/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@soaps");
Route::get('/TVshows/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@TVshows");
Route::get('/cartoons/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@cartoons");
Route::get('/superHero/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@superHero");
Route::get('/doubanTop/{category}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\IndexController@doubanTop");
Route::get('/play/{id}/{category?}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\PlayController@index");
Route::get('/moreMsg/{type}/{category?}/{pageNum?}/{soapType?}/{country?}/{filmtype?}/{years?}', "home\SearchController@moreMsg");
Route::get('/typeSearchMsg/{category}/{soapType}/{country}/{filmtype}/{years}/{pageNum?}', "home\SearchController@typeSearchMsg");
// Route::get('/home/search/{type}/', "home\SearchController@searchMsg");
Route::post('/search', "home\SearchController@searchMsg");


