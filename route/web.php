<?php
use baofeng\Demo\Route\Route;

Route::get("/" , "App\\Controllers\\UserController@index");

Route::get("test","App\\Controllers\\UserController@index");
