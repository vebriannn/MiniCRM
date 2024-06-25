<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\Login;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\View\DashboardController;
use App\Http\Controllers\View\EmployeesController;
use App\Http\Controllers\View\DivisionController;


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

// form login dan auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/check', [LoginController::class, 'login'])->name('login.auth');

// form register dan store
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

// logout akun
Route::get('/akun/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'view', 'middleware' => 'users.middleware'], function() {
    
    // view companies dan crud
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/companies/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/companies/create/store', [DashboardController::class, 'store'])->name('dashboard.create.store');
    
    Route::get('/companies/edit/{id}', [DashboardController::class, 'edit'])->name('edit.data.companies');
    Route::put('/companies/updated/{id}', [DashboardController::class, 'update'])->name('edit.data.companies.update');
    
    Route::post('/companies/delete/{id}', [DashboardController::class, 'deleteCompanies'])->name('delete.data.companies');



    // view employees dan crud
    Route::get('/employees/{id}', [EmployeesController::class, 'index'])->name('view.data.employees');
    Route::get('/empys/create/{id}', [EmployeesController::class, 'create'])->name('create.data.employees');
    Route::post('/empys/create/store/{id}', [EmployeesController::class, 'store'])->name('create.data.employees.store');
    
    Route::get('/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('edit.data.employees');
    Route::put('/employees/updated/{id}', [EmployeesController::class, 'update'])->name('edit.data.employees.update');
    
    Route::post('/employees/delete/{id}', [EmployeesController::class, 'delete'])->name('delete.data.employees');



    // view division dan crud
    Route::get('/divisions', [DivisionController::class, 'index'])->name('view.data.division');
    Route::get('/divisions/create', [DivisionController::class, 'create'])->name('create.data.division');
    Route::post('/divisions/create/store', [DivisionController::class, 'store'])->name('create.data.division.store');
    
    Route::get('/divisions/edit/{id}', [DivisionController::class, 'edit'])->name('edit.data.division');
    Route::post('/divisions/update/{id}', [DivisionController::class, 'update'])->name('edit.data.division.update');
    
    Route::post('/divisions/delete/{id}', [DivisionController::class, 'delete'])->name('delete.data.division');
});