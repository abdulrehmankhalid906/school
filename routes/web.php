<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PermissionController;

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


Route::get('/fees', [FeeController::class,'index'])->name('get-fee');
Route::get('/generate-invoice', [FeeController::class,'generateInvoice'])->name('generate-invoice');
Route::get('/generate-invoice-pdf', [FeeController::class,'generatePDF'])->name('generate-invoice-pdf');
Route::get('/create-fee', [FeeController::class,'create'])->name('create-fee');
Route::post('/create-fee-terrif', [FeeController::class,'store'])->name('generate-fee-tarrif');
Route::get('/fetch-feeable', [FeeController::class,'getUser_fee'])->name('get-user-fee');

//api
Route::get('/generate-user-invoice', [FeeController::class,'generateUserInvoice'])->name('generate-user-invoice');


//User ProfileRoutes
Route::get('/user-profile', [ProfileController::class, 'Userprofile'])->name('user-profile');
Route::post('/user-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
Route::delete('/delete-profile', [ProfileController::class, 'deleteProfile'])->name('delete-profile');

//Custom Permission Routes
Route::get('/assign-permissions/{id}', [RoleController::class,'AssignPermissionsToRole'])->name('assign-permissions');
Route::put('/assign-permissions/{id}', [RoleController::class,'StoreAssignPermissions'])->name('store-assign-permissions');

//Resource Routes
Route::resource('/students', StudentController::class);
Route::resource('/subjects', SubjectController::class);
Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::resource('/inquires', InquiryController::class);

require __DIR__.'/auth.php';
