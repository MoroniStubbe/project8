<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RequestController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\IsAdmin;

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
})->name('request.view');

Route::post('/request/create', [RequestController::class, 'create'])->name('request.create');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/product', function () {
    return view('product');
})->name('product');

// Admin routes with 'is_admin' middleware
Route::prefix('admin')->middleware(IsAdmin::class)->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index.view');

    Route::get('/add_product', function () {
        return view('admin.add_product');
    })->name('admin.add.product.view');

    Route::post('/add_product', function () {
        return view('admin.add_product');
    })->name('admin.add.product');

    Route::get('/add_user', function () {
        return view('admin.add_user');
    })->name('admin.add.user.view');

    Route::post('/add_user', function () {
        return view('admin.add_user');
    });

    Route::get('/add_admin', function () {
        return view('admin.add_admin');
    })->name('admin.add.admin.view');

    Route::post('/add_admin', function () {
        return view('admin.add_admin');
    })->name('admin.add.admin');

    Route::post('/make/{id}', [UserController::class, 'make_admin'])->name('admin.make');

    Route::post('/remove/{id}', [UserController::class, 'remove_admin'])->name('admin.remove');

    Route::get('/requests', function () {
        return view('admin.requests');
    })->name('admin.requests.view');

    Route::post('/news_panel/create', [NewsController::class, 'create'])->name('admin.news.create');

    Route::post('/news_panel/delete', [NewsController::class, 'delete'])->name('admin.news.delete');

    Route::get('/news_panel', function () {
        return view('admin.news_panel');
    })->name('admin.news.panel.view');

    Route::get('/faq_panel', function () {
        return view('admin.faq_panel');
    })->name('admin.faq.panel.view');

    Route::post('/faq_panel', function () {
        return view('admin.faq_panel');
    });
});

Route::prefix('user')->group(function () {
    Route::group(['middleware' => RedirectIfAuthenticated::class], function () {
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
        Route::post('/save', [UserController::class, 'save'])->name('user.save');

        Route::get('/save', function () {
            return view('user/save');
        })->name('user.save.view');

        Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    });
});

require __DIR__ . '/auth.php';
