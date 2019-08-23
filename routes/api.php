<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// we can group all our library routes together
$router->group(["prefix" => "library"], function ($router) {
    // store a book using the post method
    // this calls the store method of the Library controller
    $router->post("/", "Library@store");
    // get a list of all books in the library
    // this calls the index method on the Library controller
    $router->get("/", "Library@index");
    // retrieve a book from the library 
    // this calls the show method on the Library controller
    $router->get("{book}", "Library@show");
    // edit a book in the library 
    // this calls the show method on the Library controller
    $router->put("{book}", "Library@update");
    // delete a book from the library 
    // this calls the destroy method on the Library controller
    $router->delete("{book}", "Library@destroy");


});