<?php
use Core\Route;

Route::group(['prefix'=>'category'],function (){
    Route::run('createCategory','category@createCategory', "Post");
    Route::run('listAllCategories','category@listAllCategories');
    Route::run('selectCategory','category@selectCategory');
});
