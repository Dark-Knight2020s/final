<?php

use Illuminate\Support\Facades\Route;



Route::get('products','ProductController@index');
Route::get('edit/{product_edit}','ProductController@ShowEditProduct');
Route::post('store','ProductController@store');
Route::delete('delete/{product_delete}','ProductController@destroy');
Route::patch('update/{product_update}','ProductController@Update');