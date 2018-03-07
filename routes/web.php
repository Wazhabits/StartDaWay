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

//
//
// SITE VIEW ROUTES
//
//
// INDEX
//
Route::get('/', 'SiteView@Index')->name('index');
//
// ORGANIZATION
//
Route::get('/org/view/{organization}', 'SiteView@Organization')->name('organization');
//
// SEARCH
//
Route::post('/prepare/search/', 'DataController@Search');
Route::get('/search/{search}', 'SiteView@Search')->name('search');
//
// CREATE ORGANIZATION
//
Route::get('/org/create/', 'SiteView@CreateOrganizations');





//
//
// || USERS METHOD ROUTES
//
//
// USER ACTIVATION
//
Route::get('activation/{unicode}', 'DataController@MemberActivation');
//
// USER REGISTER
//
Route::post('member/register', 'DataController@MemberRegister');
//
// USER CONNECTION
//
Route::post('member/connect', 'DataController@MemberConnect');
//
// USER UPDATE PROFILE
//
Route::post('member/update', 'DataController@MemberUpdate');
//
// USER DISCONNECTION
//
Route::post('member/disconnect', 'DataController@MemberDisconnect');
//






//
//
// || ORGANIZATIONS METHOD ROUTES
//
//
// CREATE ORGANIZATION
//
Route::post('organizations/create', 'DataController@OrganizationCreate');
//
//
//





