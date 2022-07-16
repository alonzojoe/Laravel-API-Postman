<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;

// API Routes

Route::group(['prefix'=>'/books'], function(){

    Route::get('/', [BookController::class, 'index']);

    Route::post('/create', [BookController::class, 'store']);

    Route::get('/{id}', [BookController::class, 'show']);

    Route::patch('/{id}', [BookController::class, 'update']);

    Route::delete('/{id}', [BookController::class, 'destroy']);


});


