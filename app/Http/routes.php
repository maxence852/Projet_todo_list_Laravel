<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//page d'acceuil
Route::get('/auth/login', "PagesController@login");
Route::get('/', "PagesController@login");

//page à propos
Route::get('/about', "PagesController@about");

//page espace membre
Route::get('/membres/espace_membre', "PagesController@members");
Route::post('/membres/espace_membre', "PagesController@delete");

Route::get('/membres/about_membre', "PagesController@about_membre");

//route liste tache
Route::get('/membres/liste_tache/{id_liste}', "PagesController@liste_tache");

//route supprime tache
Route::get('/membres/delete_tache/{id}', "PagesController@delete");

//route supprime liste
Route::get('/membres/delete_liste/{id}', "PagesController@delete_liste");

//routes tache edition
Route::get('/membres/tache_edition/{id_liste}', "PagesController@tache_edition");
Route::post('/membres/edit_tache/{id_liste}', "PagesController@edit_tache");

//route modifier liste
Route::get('/membres/modif_list/{id_liste}', "PagesController@modif_list");
Route::post('/membres/edit_list/{id_liste}', "PagesController@edit_list");

//route ajout liste
Route::get('/membres/ajout_list', "PagesController@affichage_list");
Route::post('/membres/ajout_list', "PagesController@ajout_list");

//route ajout tâche
Route::get('/membres/ajout_tache/{id_liste}',"PagesController@affichage_tache");
Route::post('/membres/ajout_tache/{id_liste}',"PagesController@ajout_tache");




/*Route::controllers([
    'auth' => 'Auth\AuthController',
    'password'=> 'Auth\PasswordController',
]);*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@login');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@register');
Route::post('auth/register', 'Auth\AuthController@postRegister');