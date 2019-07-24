<?php
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],

function(){

     Route::prefix('dashboard')->middleware(['auth'])->group(function(){

          Route::get('/index','dashboardController@index');

          Route::resource('users','UserController')->except(['show']);
          

          
     });

});





 



