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











// Route::group(['middleware' => ['guest']], function() {
	
// 	Route::get('/register/thankyou', 'Auth\RegisterController@thankyou');	

// });

Route::get('api/auth-user', 'UserController@authUser')->name('auth-user');

Auth::routes(['verify' => true]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



// Route::get('/test', 'Auth\InitController@test')->middleware('auth');



Route::group(['middleware' => ['auth', 'verified']], function () {

// 	Route::get('/init_user', 'Auth\InitController@showInitUser')->name('init_user');

// 	Route::post('/init', 'Auth\InitController@initUser')->name('init');




 	Route::group(['middleware' => ['initialized']], function() {

// 		Route::get('/home', 'HomeController@index')->name('home');


	

	Route::prefix('api')->group(function() {

		
		Route::get('user/{id?}/permissions', 'UserController@getUserPermissions');

		Route::get('user/permissions', 'UserController@getUserPermissions');
		
		Route::apiResource('users', 'UserController');

		Route::apiResource('roles', 'RolesController');

		Route::apiResource('routes', 'RouteController');


		Route::prefix('admin')->group(function() {

			Route::prefix('leads')->group(function() {

				Route::resource('sources', 'SourceController');

				Route::resource('sourcetypes', 'SourceTypeController');

			});

			
		});	

	});


// 	    Route::resource('admin/roles', 'Admin\RolesController');

// 	    Route::resource('clients', 'ClientsController');
	    
// 	    Route::get('profile/{user?}', 'ProfilesController@show')->name('profile');
// 	    Route::resource('service_types', 'ServiceTypesController');
	    
// 	    Route::resource('sources', 'SourcesController');
// 	    Route::get('lead_fields/form', 'LeadFormController@show')->name('lead_fields.form');
// 	    Route::resource('lead_fields', 'LeadFieldsController');
// 	    Route::resource('lead_rates', 'LeadRatesController');
// 	    //Route::get('users', 'UsersController@index')->name('users.index');
// 	    Route::resource('leads', 'LeadsController');
// 	    Route::post('leads/{lead}/rate', 'RateLeadsController@store')->name('leads.rate');
// 	    Route::post('lead_activities/{lead}', 'LeadActivitiesController@store')->name('lead_activities.store');
// 	    Route::get('settings', 'SettingsController@index')->name('settings.index');
// 	    Route::patch('settings', 'SettingsController@update')->name('settings.update');

	});

});


	Route::view('/{one?}/{two?}/{three?}/{four?}', 'vue');


