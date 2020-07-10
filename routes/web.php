<?php

use \App\Product;

Route::get("/", "RouterController@index");

Route::get("/aboutUs", "RouterController@aboutUs");

Route::get("/rh-armas-hachas", "RouterController@getProductsRhArmasHachas");

Route::get("/rh-armas-dagas", "RouterController@getProductsRhArmasDagas");

Route::get("/product-details/{id}", "RouterController@getProductDetails");

Route::get("/login", "RouterController@login");

Route::get("/shopping-cart", "RouterController@getShoppingCart");

Route::get("/make-order", "RouterController@makeOrder");

Route::get('email/send', 'EmailController@send');

Route::get('/checkUserLogging', 'RouterController@checkUserLogging');

Route::get('/checkUserToLogin', 'LoginController@getUser');
