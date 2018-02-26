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

Route::get('/', ['as'  => 'home', function () {
    return view('home');
}]);

Route::get('about-me', ['as' => 'about', function () {
    return view('about');
}]);


Route::get('contact', ['as' => 'contact.form', function () {
    return view('contact');
}]);


Route::get('contact/success', ['as' => 'contact.success', function () {
    return view('success');
}]);


// Session::flash('csrf_token', 'randomtoken');

Route::post('contact', ['as' => 'contact.submit', function() {
    //dd(request()->input());
    $validation = validator(
    	request()->only( 'name', 'email', 'message'),
    	[

    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'

    	]
    );

    if ($validation->passes()) {
    	//dd('hooray it passed');
        Mail::to('jason.alinochkalapteva@gmail.com')->send(new App\Mail\Contact(request()));

        return redirect()->route('contact.success');



    }

    //dd($validation->errors());
    return redirect()->route('contact.form')->withErrors($validation->errors())->withInput();


}]);
