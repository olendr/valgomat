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

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
 * All admin routes
 * Middleware: 'auth'
 * Prefixed with '/admin'
 */
Route::group(
    [
        'prefix' => 'admin',
    ],
    function() {

        Route::get('/',
            [
                'as' => 'admin.index',
                'uses' => 'AdminController@index'
            ]
        );

        Route::post('catergory/store',
            [
                'as' => 'admin.category.store',
                'uses' => 'AdminController@storeCategory'
            ]
        );

        Route::post('opinion/store',
            [
                'as' => 'admin.opinion.store',
                'uses' => 'AdminController@storeOpinion'
            ]
        );

        Route::post('party/store',
            [
                'as' => 'admin.party.store',
                'uses' => 'AdminController@storeParty'
            ]
        );
    }
);

/*
 * API Routes
 */
Route::group(
    [
        'prefix' => 'api'
    ],
    function() {
        Route::get('personalia',
            [
                'as' => 'api.personalia',
                'uses' => 'ApiController@personalia',
            ]
        );
        Route::post('store',
            [
                'as' => 'api.store',
                'uses' => 'ApiController@store',
            ]
        );

        Route::get('opinions',
            [
                'as' => 'api.categories.opinions',
                'uses' => 'ApiController@opinions'
            ]
        );

        Route::get('parties',
            [
                'as' => 'api.parties',
                'uses' => 'ApiController@parties'
            ]
        );

        Route::post('sort',
            [
                'as' => 'api.sort',
                'uses' => 'ApiController@sort'
            ]
        );
    }
);
