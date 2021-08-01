<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');


// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'Backend\PagesController@index')->name('admin.index');  

  // Enlisted Controller  
  Route::group(['prefix' => '/enlists'], function(){
  Route::get('/', 'Backend\EnlistedController@index')->name('admin.enlists');
  Route::post('/store', 'Backend\EnlistedController@store')->name('admin.enlists.store');
  Route::post('/edit/{id}', 'Backend\EnlistedController@update')->name('admin.enlists.update');
  Route::post('/delete/{id}', 'Backend\EnlistedController@delete')->name('admin.enlists.delete');    
  }); 

   // Logo Routes
   Route::group(['prefix' => '/logos'], function(){
    Route::get('/', 'Backend\LogoController@index')->name('admin.logos');
    Route::post('/store', 'Backend\LogoController@store')->name('admin.logo.store');
    Route::post('/logo/edit/{id}', 'Backend\LogoController@update')->name('admin.logo.update');
    Route::post('/logo/delete/{id}', 'Backend\LogoController@delete')->name('admin.logo.delete');
  });
  
   // Images Routes
   Route::group(['prefix' => '/images'], function(){
    Route::get('/', 'Backend\CircleImageController@index')->name('admin.circleimages');
    Route::post('/store', 'Backend\CircleImageController@store')->name('admin.circleimages.store');
    Route::post('/edit/{id}', 'Backend\CircleImageController@update')->name('admin.circleimages.update');
    Route::post('/delete/{id}', 'Backend\CircleImageController@delete')->name('admin.circleimages.delete');
  });

   // Images Routes
   Route::group(['prefix' => '/bgimage'], function(){
    Route::get('/', 'Backend\BackgroundImageController@index')->name('admin.bgimages');
    Route::post('/store', 'Backend\BackgroundImageController@store')->name('admin.bgimages.store');
    Route::post('/edit/{id}', 'Backend\BackgroundImageController@update')->name('admin.bgimages.update');
    Route::post('/delete/{id}', 'Backend\BackgroundImageController@delete')->name('admin.bgimages.delete');
  });

   // FooterController Routes
   Route::group(['prefix' => '/footer'], function(){
    Route::get('/', 'Backend\FooterController@index')->name('admin.footer');
    Route::post('/store', 'Backend\FooterController@store')->name('admin.footer.store');
    Route::post('/edit/{id}', 'Backend\FooterController@update')->name('admin.footer.update');
    Route::post('/delete/{id}', 'Backend\FooterController@delete')->name('admin.footer.delete');
  });


  // Admin Login Routes
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

  // Password Email Send
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  // Password Reset
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');
  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// API routes
Route::get('get-districts/{id}', function($id){
  return json_encode(App\Models\District::where('division_id', $id)->get());
});