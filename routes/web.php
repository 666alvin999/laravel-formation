<?php

    use App\Http\Controllers\BlogController;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function() {
        return view('welcome');
    });

    Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/new', 'create')->name('create');

        Route::post('/new', 'store');

        Route::get('/{post:slug}', 'show')->where([
            'post' => '[a-z0-9\-]+'
        ])->name('show');

        Route::get('/{post:slug}/edit', 'edit')->name('edit');

        Route::post('/{post:slug}/edit', 'update');
    });
