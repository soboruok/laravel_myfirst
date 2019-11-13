<?php

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
    return view('auth/login');
});


// Matches The "/tasks/create" URL
Route::prefix('weavings')->middleware('auth')->group(function () {

    //전체리스트 불러오기
    Route::get('/', 'WeavingController@index');

    //클래스이름@함수명을 실행해라. 
    //폼을 불러온다. 
    Route::get('/create', 'WeavingController@create');

    //폼에서 넘어온값을 받아서 테이블에 넣는다. 
    Route::post('/', 'WeavingController@store');


    //글 보기. 테이블에 저장된 하나의 레코를 불러온다. weavingID를 show함수에. 
    Route::get('/{weavingID}', 'WeavingController@show');

    //글 수정.
    Route::get('/{weavingID}/edit', 'WeavingController@edit'); 

    //글 수정폼 받아서 테이블에 넣는다. 
    Route::put('/{weavingID}', 'WeavingController@update');

});

// Matches The "/tasks/create" URL
Route::prefix('cats')->middleware('auth')->group(function () {

    //전체리스트 불러오기
    Route::get('/', 'CatController@index');
    //글보여주기
    Route::get('/{cat}', 'CatController@show');

});

    Auth::routes();

    //로그인하고나서 어디로가나? 아래꺼는 로그인관련거 설치하면 자동 설치
    //Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', 'CatController@index')->name('home');
