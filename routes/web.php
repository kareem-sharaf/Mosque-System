<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActionsController;

use App\Http\Controllers\ReportController;

use App\Http\Middleware\CustomAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__ . '/auth.php';






Route::group(['prefix' => 'students'], function () {
    Route::controller(StudentController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/create', [StudentController::class, 'create'])->name('students.create');
            Route::post('/', [StudentController::class, 'store'])->name('students.store');
            Route::get('/', [StudentController::class, 'index'])->name('students.index');
            Route::delete('/delete/{student_id}', [StudentController::class, 'destroy'])->name('student.delete');

            Route::get('/edit/{student_id}', [StudentController::class, 'edit'])->name('student.edit');
            Route::POST('/update/{student_id}', [StudentController::class, 'update'])->name('student.update');
        });
    });
});





Route::group(['prefix' => 'reports'], function () {
    Route::controller(ReportController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/create', [ReportController::class, 'create'])->name('report.create');
            Route::post('/', [ReportController::class, 'store'])->name('report.store');
            Route::get('/', [ReportController::class, 'index'])->name('reports.index');
            Route::delete('/delete/{report_id}', [ReportController::class, 'destroy'])->name('report.delete');

            Route::get('/edit/{report_id}', [ReportController::class, 'edit'])->name('report.edit');
            Route::POST('/update/{report_id}', [ReportController::class, 'update'])->name('report.update');
        });
    });
});










Route::group(['prefix' => 'actions'], function () {
    Route::controller(ActionsController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/{report_id}', [ActionsController::class, 'index'])->name('actions.index');
            Route::get('/create/{report_id}', [ActionsController::class, 'create'])->name('action.create');
            Route::post('/store/{report_id}', [ActionsController::class, 'store'])->name('action.store');
            Route::put('/update/{action_id}', [ActionsController::class, 'update'])->name('action.update');
            Route::get('/edit/{report_id}', [ActionsController::class, 'edit'])->name('action.edit');
        });
    });
});
