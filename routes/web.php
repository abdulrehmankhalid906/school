<?php

use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index']);
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/students', StudentController::class);
Route::resource('/subjects', SubjectController::class);


Route::get('/fees', [FeeController::class,'index'])->name('get-fee');
Route::get('/create-fee', [FeeController::class,'create'])->name('create-fee');
Route::post('/create-fee-terrif', [FeeController::class,'store'])->name('generate-fee-tarrif');
Route::get('/fetch-feeable', [FeeController::class,'getUser_fee'])->name('get-user-fee');
Route::get('/fetch-monthsData', [FeeController::class,'monthly_data'])->name('fetch-monthly-data');



require __DIR__.'/auth.php';
