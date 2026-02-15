<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Models\Newsletter;

use Illuminate\Support\Facades\File;

Route::get('/', function () {
    $images = File::files(public_path('images'));
    $imageUrls = array_map(function ($file) {
        return asset('images/' . $file->getFilename());
    }, $images);

    return view('home', [
        'images' => $imageUrls,
        'newsletters' => Newsletter::whereNotNull('created_at')->latest('published_at')->paginate(3)
    ]);
});

Route::get('lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');
