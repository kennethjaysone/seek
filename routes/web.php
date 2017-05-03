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

Route::get('/', function () {

	// $categories = factory('App\Category', 5)->create();

	// foreach ($categories as $category) {
	// 	factory('App\Job', 10)->create(['category_id' => $category->id]);
	// }

	

    return view('welcome');
});


Route::get('jobs', 'JobsController@index')->name('jobs.index');

Route::get('jobs/{category}/{job}', 'JobsController@show')->name('jobs.show');

Route::get('jobs/{category}', 'JobsController@index');


/**
 * All users have a dashboard /home
 */

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {

	Route::get('/', 'HomeController@index');

	/**
	 * Packages Related endpoints
	 */

	Route::get('packages', 'PackagesController@index')->name('packages.index');

	Route::get('packages/{package}', 'PackagesController@show')->name('packages.show');

	Route::post('packages/{package}/purchase', 'PaymentsController@store')->name('payments.store');

	Route::get('/payments', 'PaymentsController@index');

	/**
	 * Employer
	 */
	Route::get('/employer/profile/create', 'EmployersController@create')->middleware('role:employer')->name('employer.profile.create');

	Route::post('/employer/profile', 'EmployersController@store')->middleware('role:employer')->name('employer.profile.store');

	Route::get('/employer/profile/{employer}/edit', 'EmployersController@edit')->middleware('role:employer')->name('employer.profile.edit');

	Route::put('/employer/profile/{employer}', 'EmployersController@update')->middleware('role:employer')->name('employer.profile.update');

	Route::get('employer/deals', 'EmployersController@employerDealsIndex')->name('employer.deals.index');


});

Auth::routes();

/**
 * This is the admin dashboard
 */

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function() {

	Route::get('/', 'AdminController@index');

	/**
	 * Employer related enpoints
	 */

	Route::get('/employers', 'EmployersController@index')->name('admin.employers.index');

	Route::get('/employers/{employer}', 'EmployersController@show')->name('admin.employers.show');

	Route::post('/employers/deals', 'EmployersController@updateDeal')->name('admin.employers.deal.update');

	/**
	 * Deals related endpoints
	 */

	Route::get('/deals', 'DealsController@index')->name('admin.deals.index');

	Route::get('/deals/create', 'DealsController@create')->name('admin.deals.create');
	
	Route::get('/deals/{deal}', 'DealsController@show')->name('admin.deals.show');

	Route::post('/deals', 'DealsController@store')->name('admin.deals.store');

	Route::get('/deals/{deal}/edit', 'DealsController@edit')->name('admin.deals.edit');

	Route::put('/deals/{deal}', 'DealsController@update')->name('admin.deals.update');

	/**
	 * User Related enpoints
	 */

	Route::get('/users', 'UsersController@index')->name('admin.users.index');

	Route::get('/users/{user}', 'UsersController@show')->name('admin.users.show');

	Route::put('/users/{user}/role', 'UsersController@updateRole')->name('admin.update.role');

});
