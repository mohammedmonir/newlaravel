<?php
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],

function(){

     Route::prefix('dashboard')->group(function(){

          Route::get('/index','dashboardController@index');

          Route::resource('users','UserController')->except(['show']);
          

          
     });

});





 



