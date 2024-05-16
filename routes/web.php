<?php

    use App\Http\Controllers\BlogController;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function() {
        return view('welcome');
    });

    Route::prefix('/blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');

        Route::get('/{slug}/{id}', [BlogController::class, 'show'])->where([
            'id' => '[0-9]+',
            'slug' => '[a-z0-9\-]+'
        ])
            ->name('show');
    });
