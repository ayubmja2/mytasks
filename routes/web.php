<?php

use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\TaskController;
    use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/tasks', function () {
//    return view('tasks');
//})->middleware(['auth', 'verified'])->name('tasks');

Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth', 'verified')->name('tasks');

Route::get('post', function() {
    return view('post.index');
})->middleware(['auth', 'verified'])->name('post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
});

require __DIR__.'/auth.php';
