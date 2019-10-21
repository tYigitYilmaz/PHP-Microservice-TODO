<?php
use Core\Route;

Route::group(['prefix'=>'category'],function (){
    Route::run('createCategory','category@createCategory', 'POST');
    Route::run('listAllCategories','category@listAllCategories');
    Route::run('selectCategory/{id}','category@selectCategory');
    Route::run('deleteCategory','category@deleteCategory', 'DELETE');
    Route::run('gatewayRequest','category@index','POST');
});

