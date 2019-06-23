<?php


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],

    function() {

        Route::group(['namespace' => 'Admin'], function () {

            Route::group(['middleware' => 'guest'], function() {
                Route::get('/login', 'AdminAuth@login')->name('login');

                Route::post('/login', 'AdminAuth@postLogin')->name('login');
                Route::get('/forget/password', 'AdminAuth@forgetPassword')->name('forget');
                Route::post('/forget/password', 'AdminAuth@postForgetPassword')->name('forget');
                Route::get('/reset/password/{token}', 'AdminAuth@resetPassword');
                Route::post('/reset/password/{token}', 'AdminAuth@postResetPassword');
            });

            Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
                Route::get('/', 'AdminController@index')->name('home');
                Route::get('logout', 'AdminAuth@logout')->name('logout');

                // Route For Users

                Route::get('new/user', 'AdminController@addUser')->name('newUser');
                Route::post('new/user', 'AdminController@postAddUser')->name('newUser');
                Route::get('view/users', 'AdminController@viewUser')->name('viewUser');
                Route::get('view/modertor', 'AdminController@viewModertor')->name('viewModertor');
                Route::get('view/normal-users', 'AdminController@viewUsers')->name('viewUsers');
                Route::get('edit/user/{id}', 'AdminController@editUser');
                Route::post('edit/user/{id}', 'AdminController@updateUser')->name('updateUser');
                Route::get('delete/user/{id}', 'AdminController@deleteUser');
                Route::get('setting', 'AdminController@setting')->name('setting');
                Route::post('setting', 'AdminController@updateSetting')->name('setting');
                Route::get('profile/{id}', 'AdminController@profile')->name('profile');

                // Route For Category

                Route::get('add/category', 'CategoryController@addCategory')->name('addCategory');
                Route::post('add/category', 'CategoryController@postAddCategory')->name('addCategory');
                Route::get('edit/category/{id}', 'CategoryController@editCategory')->name('editCategory');
                Route::post('edit/category/{id}', 'CategoryController@updateCategory')->name('editCategory');
                Route::get('view/category', 'CategoryController@viewCategory')->name('viewCategory');
                Route::get('delete/category/{id}', 'CategoryController@deleteCategory');


                // Route For Posts

                Route::get('add/post', 'PostsController@addPost')->name('addPost');
                Route::post('add/post', 'PostsController@postAddPost')->name('addPost');
                Route::get('edit/post/{id}', 'PostsController@editPost')->name('editPost');
                Route::post('edit/post/{id}', 'PostsController@updatePost')->name('editPost');
                Route::get('view/posts', 'PostsController@viewPosts')->name('viewPosts');
                Route::get('delete/post/{id}', 'PostsController@deletePost');

                // Route Hotels

                Route::get('add/hotel', 'HotelController@addHotel')->name('addHotel');
                Route::post('add/hotel', 'HotelController@postAddHotel')->name('addHotel');
                Route::get('edit/hotel/{id}', 'HotelController@editHotel')->name('editHotel');
                Route::post('edit/hotel/{id}', 'HotelController@update')->name('editHotel');
                Route::get('delete/hotel/{id}', 'HotelController@delete')->name('deleteHotel');
                Route::get('view/hotels', 'HotelController@view')->name('viewHotels');



            });

        });

    });



