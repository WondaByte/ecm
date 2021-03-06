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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['prefix'=>'ecm-portal', 'middleware' => 'web'], function(){

	//auth route
	Route::group(['prefix'=>'auth'], function(){

		Route::get('/', [
			'uses' => 'LoginController@signIn',
			'as' => 'login'
		]);
		Route::post('/login', 'LoginController@postSignIn');
	
		Route::get('/logout',[
			'uses' => 'LoginController@logout',
			'as' => 'logout'
		]);
		Route::get('/reset-password', 'LoginController@resetPassword');
		Route::post('/reset-password', 'LoginController@postResetPassword');
	});

	// registration routes
	Route::group(['prefix' => 'register'], function(){
		Route::get('/', 'RegistrationController@getRegister');
		Route::post('/', 'RegistrationController@postRegister')->name('/register');
	});

	// bank routes
	Route::group(['prefix' => 'bank'], function(){
		Route::get('/dashboard', [
			'uses' => 'BankController@dashboard',
			'as' => 'bank/dashboard'
		]);
	});

	//admin routes
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/dashboard', [
			'uses' => 'AdminController@dashboard',
			'as' => 'admin/dashboard'
		]);

		Route::post('reports', 'ReportController@show');

		// view routes
		Route::group(['prefix' => 'view'], function(){          
    		Route::get('{main}/{sub}', 'AdminController@asyncView');
		});

		// Action routes
		Route::group(['prefix' => 'action'], function(){
			Route::post('user', 'UserController@store');
			Route::delete('user', 'UserController@destroy');
			Route::put('user', 'UserController@update');

			Route::post('product', 'ProductController@store');
			Route::delete('product', 'ProductController@destroy');
			Route::put('product', 'ProductController@update');

			Route::post('constants', 'ConstantController@store');
			Route::delete('constants', 'ConstantController@destroy');
			Route::put('constants', 'ConstantController@update');

			Route::post('bank', 'BankController@store');
			Route::delete('bank', 'BankController@destroy');
			Route::put('bank', 'BankController@update');

			Route::post('bdc', 'BdcController@store');
			Route::delete('bdc', 'BdcController@destroy');
			Route::put('bdc', 'BdcController@update');

			Route::post('depot', 'DepotController@store');
			Route::delete('depot', 'DepotController@destroy');
			Route::put('depot', 'DepotController@update');
		});
	});

	// bdc routes
	Route::group(['prefix'=>'bdc-rep'], function(){
		Route::get('/dashboard', [
			'uses' => 'BdcController@dashboard',
			'as' => 'bdc/dashboard'
		]);
	});

	// ecmrep routes
	Route::group(['prefix'=>'field-rep'], function(){
		Route::get('/dashboard', [
			'uses' => 'ECMRepController@dashboard',
			'as' => 'field-rep/dashboard'
		]);

		Route::group(['prefix' => 'action'], function(){
			Route::post('/constants', 'ECMRepController@storeConstants');
			Route::post('/report', 'ECMRepController@submitReport');
		});
	});
});
