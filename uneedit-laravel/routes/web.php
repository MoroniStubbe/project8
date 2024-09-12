<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/delivery_services', function () {
    return view('delivery_services');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/login_or_signup', function () {
    return view('login_or_signup');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/request', function () {
    return view('request');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/admin/add_user', function () {
    return view('admin.add_user');
});

Route::post('/admin/add_user', function () {
    return view('admin.add_user');
});

Route::get('/admin/requests', function () {
    return view('admin.requests');
});

Route::get('/admin', function () {
    return view('admin.login_admin');
});

Route::get('/admin/news_panel', function () {
    return view('admin.news_panel');
});

Route::post('/admin/news_panel', function () {
    return view('admin.news_panel');
});

Route::get('/admin/faq_panel', function () {
    return view('admin.faq_panel');
});

Route::post('/admin/faq_panel', function () {
    return view('admin.faq_panel');
});

Route::get('/user/create', function () {
    return view('user/create');
})->name('user.create.view');

Route::post('/user/create', [UserController::class, 'store'])->name('user.create');

Route::post('/user/update', function () {
    return view('update');
})->name('user.update');

Route::get('/user/update', function () {
    return view('update');
})->name('user.update.view');

Route::post('/user/login', function () {
    return view('user/login');
})->name('user.login');

Route::get('/user/login', function () {
    return view('user/login');
})->name('user.login.view');

Route::post('/user/logout', function () {
    return view('user/logout');
})->name('user.logout');
