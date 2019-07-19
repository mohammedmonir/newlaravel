<?php

Route::prefix('dashboard')->name('dashboard.*')->group(function(){

     Route::get('/index','dashboardController@index')->name('index');
 
});



