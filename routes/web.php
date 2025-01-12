<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//add books
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('book-inventory', [BookController::class, 'index'])->name('book_inventory.index');
    Route::get('book-inventory/create', [BookController::class, 'create'])->name('book_inventory.create');
    Route::post('book-inventory', [BookController::class, 'store'])->name('book_inventory.store');
    Route::get('book-inventory/{book}/edit', [BookController::class, 'edit'])->name('book_inventory.edit');  // Edit route (GET)
    Route::put('book-inventory/{book}', [BookController::class, 'update'])->name('book_inventory.update');
    Route::delete('book-inventory/{book}', [BookController::class, 'destroy'])->name('book_inventory.destroy');
    Route::post('book_inventory/{book}/restore', [BookController::class, 'restore'])->name('admin.book_inventory.restore');
    Route::delete('book_inventory/{book}/force-delete', [BookController::class, 'forceDelete'])->name('admin.book_inventory.force_delete');
    Route::get('book-inventory/{book}', [BookController::class, 'show'])->name('book_inventory.show');
});
