<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/change_info', function () {
    return view('change_info');
});

Route::get('/check', function () {
    return view('check');
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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login_or_signup', function () {
    return view('login_or_signup');
});

Route::post('/logout', function () {
    return view('logout');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/request', function () {
    return view('request');
});

Route::get('/service', function () {
    return view('service');
});
