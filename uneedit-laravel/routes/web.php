<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/welcome', function () {
    return view('welcome');
})->name("welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/auth', function () {
    return view('auth');
})->name('auth');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/delivery_services', function () {
    return view('delivery_services');
})->name('delivery_services');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/request', function () {
    return view('request');
})->name('request');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::prefix('admin')->group(function () {
    Route::get('/add_user', function () {
        return view('admin.add_user');
    });

    Route::post('/add_user', function () {
        return view('admin.add_user');
    });

    Route::get('/requests', function () {
        return view('admin.requests');
    });

    Route::get('', function () {
        return view('admin.login_admin');
    });

    Route::get('/news_panel', function () {
        return view('admin.news_panel');
    });

    Route::post('/news_panel', function () {
        return view('admin.news_panel');
    });

    Route::get('/faq_panel', function () {
        return view('admin.faq_panel');
    });

    Route::post('/faq_panel', function () {
        return view('admin.faq_panel');
    });
});

Route::prefix('user')->group(function () {
    Route::group(['middleware' => ['RedirectIfAuthenticated', 'guest']], function () {
        Route::get('/login_or_signup', function () {
            return view('login_or_signup');
        })->name('login_or_signup');

        Route::post('/create', [UserController::class, 'create'])->name('user.create');

        Route::get('/create', function () {
            return view('user/create');
        })->name('user.create.view');

        Route::post('/login', [UserController::class, 'login'])->name('user.login');

        Route::get('/login', function () {
            return view('user/login');
        })->name('user.login.view');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/update', function () {
            return view('user/update');
        })->name('user.update');

        Route::get('/update', function () {
            return view('user/update');
        })->name('user.update.view');

        Route::post('/logout', function () {
            return view('user/logout');
        })->name('user.logout');
    });
});

require __DIR__ . '/auth.php';
