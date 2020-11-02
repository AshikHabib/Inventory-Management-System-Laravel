<?php

use Illuminate\Support\Facades\Route;

//Mail
// use Illuminate\Auth\Events\Verified;
// use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

/////////////////////////////////////////////////////////////////////////////////

// The Email Verification Notice
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware(['auth'])->name('verification.notice');

// //The Email Verification Handler
// Route::get('/email/verify/{id}/{hash}', function (Request $request) {
//     if (! hash_equals((string) $request->route('id'),
//                       (string) $request->user()->getKey())) {
//         abort(403);
//     }

//     if (! hash_equals((string) $this->route('hash'),
//                       sha1($this->user()->getEmailForVerification()))) {
//         abort(403);
//     }

//     $request->user()->markEmailAsVerified();

//     event(new Verified($request->user()));

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// //Resending The Verification Email
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('status', 'verification-link-sent');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//////////////////////////////////////////////////////////////////////////////////


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/inbox', function(){
	echo "Inbox";
})->name('inbox');


//EMPLOYEES ROUTES------------------------------------------
Route::get('/add-employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('add.employee');
Route::get('/all-employee', [App\Http\Controllers\EmployeeController::class, 'allEmployee'])->name('all.employee');
Route::post('/insert-employee', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('/view-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'viewEmployee']);
Route::get('/delete-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'deleteEmployee']);
Route::get('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployee']);
Route::post('/update-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'updateEmployee']);
//----------------------------------------------------------


//CUSTOMERS ROUTES------------------------------------------
Route::get('/add-customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('add.customer');
Route::get('/all-customer', [App\Http\Controllers\CustomerController::class, 'allCustomer'])->name('all.customer');
Route::post('/insert-customer', [App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/view-customer/{id}', [App\Http\Controllers\CustomerController::class, 'viewCustomer']);
Route::get('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'deleteCustomer']);
Route::get('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'editCustomer']);
Route::post('/update-customer/{id}', [App\Http\Controllers\CustomerController::class, 'updateCustomer']);
//----------------------------------------------------------


//SUPPLIERS ROUTES------------------------------------------
Route::get('/add-supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('add.supplier');
Route::get('/all-supplier', [App\Http\Controllers\SupplierController::class, 'allSupplier'])->name('all.supplier');
Route::post('/insert-supplier', [App\Http\Controllers\SupplierController::class, 'store']);
Route::get('/view-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'viewSupplier']);
Route::get('/delete-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'deleteSupplier']);
Route::get('/edit-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'editSupplier']);
Route::post('/update-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'updateSupplier']);
//----------------------------------------------------------


//SALARIES ROUTES------------------------------------------

////////// ADVANCED //////////////////////////////
Route::get('/add-advanced-salary', [App\Http\Controllers\SalaryController::class, 'advancedIndex'])->name('add.advancedsalary');
Route::get('/all-advanced-salary', [App\Http\Controllers\SalaryController::class, 'allSalary'])->name('all.advancedsalary');
Route::post('/insert-advanced-salary', [App\Http\Controllers\SalaryController::class, 'advancedStore']);

Route::get('/view-salary/{id}', [App\Http\Controllers\SalaryController::class, 'viewSalary']);
Route::get('/delete-salary/{id}', [App\Http\Controllers\SalaryController::class, 'deleteSalary']);
Route::get('/edit-salary/{id}', [App\Http\Controllers\SalaryController::class, 'editSalary']);
Route::post('/update-salary/{id}', [App\Http\Controllers\SalaryController::class, 'updateSalary']);

////////// PAY ///////////////////////////////////
Route::get('/pay-salary', [App\Http\Controllers\SalaryController::class, 'index'])->name('pay.salary');

//----------------------------------------------------------


//CATEGORIES ROUTES-----------------------------------------
Route::get('/add-category', [App\Http\Controllers\CategoryController::class, 'index'])->name('add.category');
Route::get('/all-category', [App\Http\Controllers\CategoryController::class, 'allCategory'])->name('all.category');
Route::post('/insert-category', [App\Http\Controllers\CategoryController::class, 'store']);

Route::get('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);
Route::get('/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);
Route::post('/update-category/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory']);
//----------------------------------------------------------


//PRODUCTS ROUTES------------------------------------------
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'index'])->name('add.product');
Route::get('/all-product', [App\Http\Controllers\ProductController::class, 'allProduct'])->name('all.product');
Route::post('/insert-product', [App\Http\Controllers\ProductController::class, 'store']);

Route::get('/view-product/{id}', [App\Http\Controllers\ProductController::class, 'viewProduct']);
Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
Route::post('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct']);
//----------------------------------------------------------


//EXPENSES ROUTES------------------------------------------
Route::get('/add-expense', [App\Http\Controllers\ExpenseController::class, 'index'])->name('add.expense');
Route::get('/today-expense', [App\Http\Controllers\ExpenseController::class, 'todayExpense'])->name('today.expense');
Route::get('/monthly-expense', [App\Http\Controllers\ExpenseController::class, 'monthlyExpense'])->name('monthly.expense');
Route::get('/yearly-expense', [App\Http\Controllers\ExpenseController::class, 'yearlyExpense'])->name('yearly.expense');
Route::post('/insert-expense', [App\Http\Controllers\ExpenseController::class, 'store']);

Route::get('/view-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'viewExpense']);
Route::get('/delete-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'deleteExpense']);
Route::get('/edit-today-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'editTodayExpense']);
Route::post('/update-expense/{id}', [App\Http\Controllers\ExpenseController::class, 'updateExpense']);

/////////////////// MONTHLY EXPENSES ONLY /////////////////////////////
Route::get('/january-expense', [App\Http\Controllers\ExpenseController::class, 'januaryExpense'])->name('january.expense');
Route::get('/february-expense', [App\Http\Controllers\ExpenseController::class, 'februaryExpense'])->name('february.expense');
Route::get('/march-expense', [App\Http\Controllers\ExpenseController::class, 'marchExpense'])->name('march.expense');
Route::get('/april-expense', [App\Http\Controllers\ExpenseController::class, 'aprilExpense'])->name('april.expense');
Route::get('/may-expense', [App\Http\Controllers\ExpenseController::class, 'mayExpense'])->name('may.expense');
Route::get('/june-expense', [App\Http\Controllers\ExpenseController::class, 'juneExpense'])->name('june.expense');
Route::get('/july-expense', [App\Http\Controllers\ExpenseController::class, 'julyExpense'])->name('july.expense');
Route::get('/august-expense', [App\Http\Controllers\ExpenseController::class, 'augustExpense'])->name('august.expense');
Route::get('/september-expense', [App\Http\Controllers\ExpenseController::class, 'septemberExpense'])->name('september.expense');
Route::get('/october-expense', [App\Http\Controllers\ExpenseController::class, 'octoberExpense'])->name('october.expense');
Route::get('/november-expense', [App\Http\Controllers\ExpenseController::class, 'novemberExpense'])->name('november.expense');
Route::get('/december-expense', [App\Http\Controllers\ExpenseController::class, 'decemberExpense'])->name('december.expense');
//---------------------------------------------------------------



//ATTENDANCE ROUTES----------------------------------------------
Route::get('/take-attendance', [App\Http\Controllers\AttendanceController::class, 'takeAttendance'])->name('take.attendance');
Route::get('/all-attendance', [App\Http\Controllers\AttendanceController::class, 'allAttendance'])->name('all.attendance');
Route::post('/insert-attendance', [App\Http\Controllers\AttendanceController::class, 'insertAttendance']);

Route::get('/view-attendance/{edit_date}', [App\Http\Controllers\AttendanceController::class, 'viewAttendance']);
Route::get('/delete-attendance/{edit_date}', [App\Http\Controllers\AttendanceController::class, 'deleteAttendance']);
Route::get('/edit-attendance/{edit_date}', [App\Http\Controllers\AttendanceController::class, 'editAttendance']);
Route::post('/update-attendance', [App\Http\Controllers\AttendanceController::class, 'updateAttendance']);

//---------------------------------------------------------------



//SETTING ROUTES----------------------------------------------
Route::get('/website-setting', [App\Http\Controllers\SettingController::class, 'Setting'])->name('setting');
Route::post('/update-website/{id}', [App\Http\Controllers\SettingController::class, 'updateWebsite']);

//------------------------------------------------------------


//POS ROUTES--------------------------------------------------
Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos');

//------------------------------------------------------------


//CART ROUTES--------------------------------------------------
Route::post('/add-cart', [App\Http\Controllers\CartController::class, 'addCart']);
Route::post('/cart-update/{rowId}', [App\Http\Controllers\CartController::class, 'cartUpdate']);
Route::get('/cart-remove/{rowId}', [App\Http\Controllers\CartController::class, 'cartRemove']);

//INVOICE
Route::post('/create-invoice', [App\Http\Controllers\CartController::class, 'createInvoice']);

//------------------------------------------------------------