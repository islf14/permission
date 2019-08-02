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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/array', function () {
    return view('array');
});
// Route::get('/array', 'HomeController@index')->name('array');



Route::get('/notas','NotasController@index')->name('notas')->middleware('permiso:notas.index');

Route::get('notas/crear','NotasController@create')->name('notas.create')->middleware('permiso:crear-notas');


// Route::get('roles','RoleController@index')->name('roles.index')->middleware('permiso:roles.index');

// Route::get('usuario','UserController@index')->name('user.index')->middleware('permiso:user.index');



// Route::get('notas/{id}/eliminar','NotasController@destroy')->name('notas.eliminar');

// Route::get('notas/{id}/eliminar','NotasController@destroy')->name('notas.eliminar')->middleware('permiso.eliminar-notas');

Route::group(['middleware' => ['permiso:eliminar-notas']], function(){
    Route::get('notas/{id}/eliminar','NotasController@destroy')->name('notas.eliminar');
});

Route::middleware(['auth'])->group(function () {
	//Roles

	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permiso:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permiso:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permiso:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permiso:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permiso:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permiso:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permiso:roles.edit');


	//user
	Route::get('user', 'UserController@index')->name('user.index')
		->middleware('permiso:user.index');

	Route::put('user/{user}', 'UserController@update')->name('user.update')
		->middleware('permiso:user.edit');

	Route::get('user/{user}', 'UserController@show')->name('user.show')
		->middleware('permiso:user.show');

	Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy')
		->middleware('permiso:user.destroy');

	Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit')
		->middleware('permiso:user.edit');
        
	//Products
	Route::post('products/store', 'ProductController@store')->name('products.store')
		->middleware('permiso:products.create');

	Route::get('products', 'ProductController@index')->name('products.index')
		->middleware('permiso:products.index');

	Route::get('products/create', 'ProductController@create')->name('products.create')
		->middleware('permiso:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
		->middleware('permiso:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
		->middleware('permiso:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
		->middleware('permiso:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
		->middleware('permiso:products.edit');
});


// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

// $role = Role::create(['name' => 'writer']);
// $permission = Permission::create(['name' => 'edit articles']);

// $role = Role::find(4);
// $role->givePermissionTo('roles.index');
// $user->assignRole('Supervisor');