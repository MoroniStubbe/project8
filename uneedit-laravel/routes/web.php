<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/change_info', function () {
    return view('change_info');
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
    return view('index')->name('index');
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
