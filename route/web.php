<?php
use baofeng\Demo\Route\Route;

Route::get("/" , "App\\Controllers\\UserController@index");

Route::get("test","App\\Controllers\\UserController@index");

Route::get("setKafka","App\\Controllers\\UserController@testKafka");

Route::get("getKafka","App\\Controllers\\UserController@getKafka");
