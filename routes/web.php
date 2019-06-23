<?php


Route::group(['/'], function () {
    Route::get('/', 'HomeController@index');
    Route::post('/contact', 'HomeController@postContact')->name('contact');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/blog/tags/{tag}', 'TagsController@index');
    Route::get('/blog/category/{id}', 'HomeController@category');
    Route::get('/post/{id}', 'HomeController@viewPost');
    Route::get('/hotels', 'HomeController@hotels');
    Route::get('/hotel/{id}', 'HomeController@viewHotel');
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact-us', function () {
        return view('contact');
    })->name('contact-us');

});

//Route::get('/test', function () {
//    dd(\App\Tag::inserTag('hello,pphp javascript python'));
//});
