<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailSettingController;
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

Route::post('public/invoice-tracker/',[HomeController::class,'InvoiceTracker'])->name('invoice.tracker');
Route::get('public/invoice/',[HomeController::class,'invoiceForm'])->name('invoice.checker');
Route::get('public/transaction/',[HomeController::class,'transactionForm'])->name('trans.checker');
Route::post('public/transaction-tracker/',[HomeController::class,'TransactionTracker'])->name('trans.tracker');

Route::get('/',[HomeController::class,'login'])->name('login');
Route::post('admin/verify/',[HomeController::class,'LoginVerify'])->name('login.verify');


Route::middleware(['auth'])->group(function () {

/*
|--------------------------------------------------------------------------
| Home Controller Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin',[HomeController::class,'Home'])->name('dashboard');
Route::get('settings/',[HomeController::class,'Setting'])->name('settings');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
/*
|--------------------------------------------------------------------------
| Email Controller Routes
|--------------------------------------------------------------------------
*/
Route::post('email/update/',[EmailSettingController::class,'updateEmailSetting'])->name('email.update');

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
Route::post('student-info/',[InvoiceController::class,'ajaxStudentInfo'])->name('invoice.ajaxShow');
Route::post('invoice-make/',[InvoiceController::class,'store'])->name('invoice.store');
Route::get('invoices/{id}',[InvoiceController::class,'details'])->name('invoice.details');
Route::get('invoices/download/{id}',[InvoiceController::class,'download'])->name('invoice.download');
Route::get('invoices/edit/{id}',[InvoiceController::class,'edit'])->name('invoice.edit');
Route::put('invoices/update/{id}',[InvoiceController::class,'update'])->name('invoice.update');
Route::delete('invoices/destroy/{id}',[InvoiceController::class,'destroy'])->name('invoice.destroy');

/*
|--------------------------------------------------------------------------
| Transaction Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('transaction-add/',[TransactionController::class,'Home'])->name('trans.add');
Route::get('transactions/',[TransactionController::class,'Show'])->name('trans.show');
Route::post('transactions/store/',[TransactionController::class,'store'])->name('trans.store');
Route::get('transactions/details/{id}',[TransactionController::class,'details'])->name('trans.details');
Route::delete('transactions/destroy/{id}',[TransactionController::class,'destroy'])->name('trans.destroy');
/*
|--------------------------------------------------------------------------
| ADMIN Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('admin-add/',[AdminController::class,'Home'])->name('admin.add');
Route::get('admins/',[AdminController::class,'Show'])->name('admin.show');
Route::post('admins/add/',[AdminController::class,'store'])->name('admin.store');
Route::get('admins/details/{id}',[AdminController::class,'details'])->name('admin.details');
Route::delete('admins/destroy/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
});
