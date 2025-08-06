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
Route::post('agency-insert/',[UniversityController::class,'addAgency'])->name('agency.insert');
Route::get('agency/',[UniversityController::class,'Show'])->name('agency.show');
Route::get('agency/{id}',[UniversityController::class,'Details'])->name('agency.details');
Route::get('agency/edit/{id}',[UniversityController::class,'edit'])->name('agency.edit');
Route::post('agency/update/{id}',[UniversityController::class,'update'])->name('agency.update');
Route::delete('agency/destroy/{id}',[UniversityController::class,'destroy'])->name('agency.destroy');

/*
|--------------------------------------------------------------------------
| Student Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('student-add/',[StudentController::class,'Home'])->name('student.add');
Route::get('students/',[StudentController::class,'Show'])->name('student.show');
Route::post('students-add/',[StudentController::class,'createStudent'])->name('student.insert');
Route::get('students/{id}',[StudentController::class,'details'])->name('student.details');
Route::get('students/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('students/update/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('students/destroy/{id}',[StudentController::class,'destroy'])->name('student.destroy');


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
