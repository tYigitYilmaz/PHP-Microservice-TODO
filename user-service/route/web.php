<?php
use Core\Route;

Route::group(['prefix'=>'user'],function (){
    Route::run('register','user@register', 'POST');
    Route::run('login','user@login', 'POST');
});
