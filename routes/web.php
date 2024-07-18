
<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'root'] )->name('home');

//managing students
Route::get('/view-students', [StudentController::class, 'index'] )->name('student.index');
Route::get('/create-student', [StudentController::class, 'create'] )->name('student.create');
Route::post('/store-student', [StudentController::class, 'store'] )->name('student.store');
Route::get('/edit-student/{id}', [StudentController::class, 'edit'] )->name('student.edit');
Route::put('/update-student/{id}', [StudentController::class, 'update'] )->name('student.update');
Route::delete('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

//managing teachers
Route::get('/view-teachers', [TeacherController::class, 'index'] )->name('teacher.index');
Route::get('/create-teacher', [TeacherController::class, 'create'] )->name('teacher.create');
Route::post('/store-teacher', [TeacherController::class, 'store'] )->name('teacher.store');
Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/update-teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/delete-teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');


//managing programs
Route::get('/view-programs', [ProgramController::class, 'index'] )->name('program.index');
Route::get('/create-program', [ProgramController::class, 'create'] )->name('program.create');
Route::post('/store-program', [ProgramController::class, 'store'] )->name('program.store');
Route::get('/edit-program/{id}', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/update-program/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/delete-program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

//managing subjects
Route::get('/view-subjects', [SubjectController::class, 'index'] )->name('subject.index');
Route::get('/create-subject', [SubjectController::class, 'create'] )->name('subject.create');
Route::post('/store-subject', [SubjectController::class, 'store'] )->name('subject.store');
Route::get('/edit-subject/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
Route::put('/update-subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('/delete-subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

//managing subject offered
Route::get('/view-subject-offered', [OfferController::class, 'index'])->name('offer.index');
Route::get('/create-offer', [OfferController::class, 'create'])->name('offer.create');
Route::post('/store-offer', [OfferController::class, 'store'])->name('offer.store');
Route::get('/offer/assign-teacher/{offer_id}', [OfferController::class, 'assignTeacher'])->name('offer.assign_teacher');
Route::post('/offer/store-teacher-assignment', [OfferController::class, 'storeTeacherAssignment'])->name('offer.store_teacher_assignment');
Route::get('/edit-offer/{id}', [OfferController::class, 'edit'])->name('offer.edit');
Route::put('/update-offer/{id}', [OfferController::class, 'update'])->name('offer.update');
Route::delete('/delete-offer/{id}', [OfferController::class, 'destroy'])->name('offer.destroy');

//managing enrollment
Route::get('/search-student-page', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::get('/search-student', [EnrollmentController::class, 'search'])->name('enrollment.search');
Route::post('/enroll/{student_id}/{offer_id}', [EnrollmentController::class, 'enroll'])->name('enrollment.enroll');
Route::delete('/unenroll/{studentId}/{offerId}', [EnrollmentController::class, 'unenroll'])->name('enrollment.unenroll');


