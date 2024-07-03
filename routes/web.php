<?php

    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\Auth\RegisteredUserController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\TaskController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

//    Route::get('/', function () {
//        return view('welcome');
//    });

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('tasks');
        }
        return view('welcome'); 
    });

    Route::middleware(['guest'])->group(function () {
        Route::get('/login', function () {
            if (Auth::check()) {
                return redirect()->route('tasks');
            }
            return view('auth.login');
        })->name('login');

        Route::get('/register', function () {
            if (Auth::check()) {
                return redirect()->route('tasks');
            }
            return view('auth.register');
        })->name('register');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::post('/register', [RegisteredUserController::class, 'store']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('post', function () {
            return view('post.index');
        })->name('post');
        Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
        Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
        Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');


    });

    require __DIR__ . '/auth.php';
