<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UniversityController;
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


/*
|--------------------------------------------------------------------------
| Home Controller Routes
|--------------------------------------------------------------------------
*/

Route::get('/',[HomeController::class,'Home'])->name('dashboard');
Route::get('settings/',[HomeController::class,'Setting'])->name('settings');

/*
|--------------------------------------------------------------------------
| University Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('agency-add/',[UniversityController::class,'Home'])->name('agency.add');
Route::get('agency/',[UniversityController::class,'Show'])->name('agency.show');

/*
|--------------------------------------------------------------------------
| Student Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('student-add/',[StudentController::class,'Home'])->name('student.add');
Route::get('students/',[StudentController::class,'Show'])->name('student.show');

/*
|--------------------------------------------------------------------------
| Invoice Controller Routes
|--------------------------------------------------------------------------
*/

Route::get('invoice-add/',[InvoiceController::class,'Home'])->name('invoice.add');
Route::get('invoices/',[InvoiceController::class,'Show'])->name('invoice.show');

/*
|--------------------------------------------------------------------------
| Transaction Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('transaction-add/',[TransactionController::class,'Home'])->name('trans.add');
Route::get('transactions/',[TransactionController::class,'Show'])->name('trans.show');

/*
|--------------------------------------------------------------------------
| ADMIN Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('admin-add/',[AdminController::class,'Home'])->name('admin.add');
Route::get('admins/',[AdminController::class,'Show'])->name('admin.show');
