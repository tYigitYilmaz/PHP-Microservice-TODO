<?php
use Core\Route;

Route::group(['prefix'=>'title'],function (){
    Route::run('createTitle','title@createTitle', 'POST');
    Route::run('listAllTitles','title@listAllTitles');
    Route::run('selectTitle/{id}','title@selectTitle');
    Route::run('deleteTitle','title@deleteTitle', 'DELETE');
});

Route::group(['prefix'=>'subtitle'],function (){
    Route::run('createSubtitle','subtitle@createSubtitle', 'POST');
    Route::run('listAllSubtitles','subtitle@listAllSubtitles');
    Route::run('selectSubtitle/{id}','subtitle@selectSubtitle');
    Route::run('deleteSubtitle','subtitle@deleteSubtitle', 'DELETE');
});

Route::group(['prefix'=>'task'],function (){
    Route::run('createTask','task@createTask', 'POST');
    Route::run('listAllTasks','task@listAllTasks');
    Route::run('selectTask/{id}','task@selectTask');
    Route::run('writeNote','task@writeNote', 'PATCH');
    Route::run('deleteTask','task@deleteTask', 'DELETE');
});