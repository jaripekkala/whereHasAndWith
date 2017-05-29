<?php

use App\User;

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

$whereTagIsFoo = function ($query) {
    $query->where('tag', 'Foo');
};

Route::get('/', function () use ($whereTagIsFoo) {
    // Users with posts
    $all = User::with('posts')->get();

    // Users with posts where tag Foo
    $with = User::with(['posts' => $whereTagIsFoo])->get();
    
    // Users where has posts with tag Foo with posts
    $whereHas = User::whereHas('posts', $whereTagIsFoo)->with('posts')->get();

    // Users with posts where tag Foo with posts where tag Foo
    $whereHasAndWith = User::whereHas('posts', $whereTagIsFoo)
        ->with(['posts' => $whereTagIsFoo])->get();

    return view('welcome')->with(
        compact('all', 'with', 'whereHas', 'whereHasAndWith')
    );
});
