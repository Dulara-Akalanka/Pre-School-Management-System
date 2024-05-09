<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UploadFileController;

// Route::get('student', function () {
//     return view('student-create');
// });

// Route::post('/file/upload', function () {
//     $file = request()->file('file');
//     $file->move(public_path('uploads'), $file->getClientOriginalName());
//     return redirect()->back()->with('success', 'File uploaded successfully!');
// })->name('file.upload');



// For the Login Page
Route::get('/', [UserController::class,'loginPage'])->name('login-page');
Route::post('sign-in', [UserController::class, 'login'])->name('sign-in');

Route::get('logout',[UserController::class,'logout'])->name('logout');


// Admin routes
Route::middleware('AdminAuth')->group(function(){
    Route::get('admin-dashboard', [AdminController::class,'adminDashboard'])->name('admin-dashboard');
    
    Route::get('welcome', [AdminController::class,'display'])->name('welcome');

    Route::get('admin', [AdminController::class,'adminDisplay'])->name('admin');
    Route::get('admin-add', [AdminController::class,'adminForm'])->name('admin-add');
    Route::post('add-admin', [AdminController::class,'createAdmin'])->name('add-admin');
    Route::get('admin-update/{id}', [AdminController::class, 'adminViewUpdate'])->name('admin-update');
    Route::post('update-admin', [AdminController::class, 'updateAdmin'])->name('update-admin'); 

    Route::get('coordinator', [CoordinatorController::class,'adminDisplayCoordinator'])->name('coordinator');
    Route::get('coordinator-add', [CoordinatorController::class,'adminCoordinatorForm'])->name('coordinator-add');
    Route::post('add-coordinator', [CoordinatorController::class,'createCoordinator'])->name('add-coordinator');
    Route::get('coordinator-update/{id}', [CoordinatorController::class, 'coordinatorViewUpdate'])->name('coordinator-update');
    Route::post('update-coordinator', [CoordinatorController::class, 'updateCoordinator'])->name('update-coordinator');
    Route::get('delete-coordinator/{id}', [CoordinatorController::class, 'deleteCoordinator'])->name('delete-coordinator');

    Route::get('teacher', [TeacherController::class,'displayTeacher'])->name('teacher');
    Route::get('teacher-add', [TeacherController::class,'teacherForm'])->name('teacher-add');
    Route::post('add-teacher', [TeacherController::class,'createTeacher'])->name('add-teacher');
    Route::get('teacher-update/{id}', [TeacherController::class, 'teacherViewUpdate'])->name('teacher-update');
    Route::post('update-teacher', [TeacherController::class, 'updateTeacher'])->name('update-teacher');
    Route::get('delete-teacher/{id}', [TeacherController::class, 'deleteTeacher'])->name('delete-teacher');

    Route::get('student', [StudentController::class,'displayStudent'])->name('student');
    Route::get('student-add', [StudentController::class,'studentForm'])->name('student-add');
    Route::post('add-student',[StudentController::class,'createStudent'])->name('add-student');
    Route::get('student-update/{id}', [StudentController::class, 'studentViewUpdate'])->name('student-update');
    Route::post('update-student', [StudentController::class, 'updateStudent'])->name('update-student');
    Route::get('delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('delete-student');

    //payment
    Route::get('student-month-pay', [StudentPaymentController::class,'monthPaymentForm'])->name('student-month-pay');
    Route::get('student-function-pay', [StudentPaymentController::class,'functionPaymentForm'])->name('student-function-pay');
    Route::get('student-other-pay', [StudentPaymentController::class,'otherPaymentForm'])->name('student-other-pay');
    Route::post('pay-student', [StudentPaymentController::class,'payment'])->name('pay-student');

    //Route::get('g_invoice/{id}', [StudentPaymentController::class,'generateInvoice'])->name('g_invoice');

    Route::get('view-invoice/{id}', [StudentPaymentController::class,'viewPdf'])->name('view-invoice');



//     Route::get('showInvoice', function () {
//     return view('Admin.invoice');
// });

    //report generate
    Route::get('attendance-view', [AttendanceController::class,'viewAttendance'])->name('attendance-view');
    Route::get('payment-view', [StudentPaymentController::class,'viewPayment'])->name('payment-view');
    Route::post('view-attendance', [AttendanceController::class,'attendanceView'])->name('view-attendance');
    Route::post('view-payment', [StudentPaymentController::class,'paymentView'])->name('view-payment');


    //make credentials
    Route::get('coordinator-credential', [UserController::class,'coordinatorUsername'])->name('coordinator-credential');
    Route::get('teacher-credential', [UserController::class,'teacherUsername'])->name('teacher-credential');
    Route::get('student-credential', [UserController::class,'studentUsername'])->name('student-credential');

    Route::post('credential', [UserController::class,'createCredential'])->name('credential');

    //record attendance
    Route::get('view-barcode',[AttendanceController::class, 'index'])->name('view-barcode');
    Route::post('barcode-scan',[AttendanceController::class, 'barcodeScan'])->name('barcode-scan');

});

// Coordinator routes
Route::middleware('CoordinatorAuth')->group(function(){
    Route::view('coordinator-dashboard','Coordinator.coordinator-dashboard');

    Route::get('admin-view', [CoordinatorController::class,'displayAdmin'])->name('admin-view');

    Route::get('c-coordinator', [CoordinatorController::class,'displayCoordinator'])->name('c-coordinator');

    Route::get('c-teacher', [CoordinatorController::class,'displayTeacher'])->name('c-teacher');
    Route::get('c-teacher-add', [CoordinatorController::class,'teacherForm'])->name('c-teacher-add');
    Route::post('c-add-teacher', [CoordinatorController::class,'createTeacher'])->name('c-add-teacher');
    Route::get('c-teacher-update/{id}', [CoordinatorController::class, 'teacherViewUpdate'])->name('c-teacher-update');
    Route::post('c-update-teacher', [CoordinatorController::class, 'updateTeacher'])->name('c-update-teacher');
    Route::get('c-delete-teacher/{id}', [TeacherController::class, 'deleteTeacher'])->name('c-delete-teacher');

    Route::get('c-student', [CoordinatorController::class,'displayStudent'])->name('c-student');
    Route::get('c-student-add', [CoordinatorController::class,'studentForm'])->name('c-student-add');
    Route::post('c-add-student',[CoordinatorController::class,'createStudent'])->name('c-add-student');
    Route::get('c-student-update/{id}', [CoordinatorController::class, 'studentViewUpdate'])->name('c-student-update');
    Route::post('c-update-student', [CoordinatorController::class, 'updateStudent'])->name('c-update-student');
    Route::get('c-delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('c-delete-student');

    //payment
    Route::get('c-student-month-pay', [StudentPaymentController::class,'CmonthPaymentForm'])->name('c-student-month-pay');
    Route::get('c-student-function-pay', [StudentPaymentController::class,'CfunctionPaymentForm'])->name('c-student-function-pay');
    Route::get('c-student-other-pay', [StudentPaymentController::class,'CotherPaymentForm'])->name('c-student-other-pay');
    Route::post('c-pay-student', [StudentPaymentController::class,'payment'])->name('c-pay-student');

});

//Teacher routes
Route::middleware('TeacherAuth')->group(function(){
    Route::view('teacher-dashboard','Teacher.teacher-dashboard');

    Route::get('t-teacher', [TeacherController::class,'teacherDisplay'])->name('t-teacher');

    Route::get('t-student', [TeacherController::class,'displayStudent'])->name('t-student');
    Route::get('t-student-update/{id}', [StudentController::class, 'studentViewUpdate'])->name('t-student-update');
    Route::post('t-update-student', [StudentController::class, 'updateStudent'])->name('t-update-student');

    Route::get('uploadfile', [UploadFileController::class, 'index'])->name('uploadfile');
    Route::post('upload-file', [UploadFileController::class, 'UploadFile'])->name('upload-file');

    Route::get('/download/{file}', 'DownloadController@download')->name('file.download');

    Route::get('delete-file', [UploadFileController::class, 'deleteFiles'])->name('delete-file');
});

//Student routes
Route::middleware('StudentAuth')->group(function(){
    Route::view('student-dashboard','Student.student-dashboard');

    Route::get('s-teacher', [StudentController::class,'displayTeacher'])->name('s-teacher');

    Route::get('s-student', [StudentController::class,'studentDisplay'])->name('s-student');

    Route::get('s-payment', [StudentPaymentController::class,'displayPayment'])->name('s-payment');
});