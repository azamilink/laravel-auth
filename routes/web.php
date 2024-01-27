<?php

use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZipController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Eloquent
Route::get('/students', [StudentController::class, 'fetchStudents']);

// eloquent relation one to one
Route::get('/add-user', [UserController::class, 'insertRecord']);
Route::get('/show-user/{id}', [UserController::class, 'fetchPhoneUser']);

// eloquent crud (Auth: Login Dulu)
Route::get('posts', [PostController::class, 'allPost'])->name('posts');
Route::get('add-post', [PostController::class, 'addPost'])->name('post.add');
Route::post('create-post', [PostController::class, 'createPost'])->name('post.create');
Route::get('show-post/{id}', [PostController::class, 'showPost'])->name('post.show');
Route::get('edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');
Route::post('update-post', [PostController::class, 'updatePost'])->name('post.update');
Route::get('delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');

// eloquent relation one to many
Route::get('add-comment/{id}', [PostController::class, 'addComment']);
Route::get('comments/{id}', [PostController::class, 'getCommentByPost']);

// eloquesnt relation many to many
Route::get('add-role', [RoleController::class, 'addRole']);
Route::get('attach-role/{id}', [RoleController::class, 'attachRole']);
Route::get('role-by-user/{id}', [RoleController::class, 'getAllRoleByUser']);
Route::get('user-by-role/{id}', [RoleController::class, 'getAllUserByRole']);

// Data Table
Route::get('data-tables', [EmployeeController::class, 'dataTables'])->name('data.tables');
Route::get('list', [EmployeeController::class, 'list'])->name('list');

// (Auth: Login Dulu)
Route::get('employees', [EmployeeController::class, 'employees'])->name('employees');

// export data to excel - pdf - csv
Route::get('download-pdf', [EmployeeController::class, 'downloadPdf']);
Route::get('export-to-excel', [EmployeeController::class, 'exportToExcel']);
Route::get('export-to-csv', [EmployeeController::class, 'exportToCSV']);

// import data from excel -csv
Route::get('import-form', [EmployeeController::class, 'importForm']);
Route::post('import', [EmployeeController::class, 'import'])->name('emp.import');

// resize image
Route::get('form-image', [ImageController::class, 'formImage']);
Route::post('resize-image', [ImageController::class, 'resizeImage'])->name('image.resize');

// dropzone
Route::get('gallery', [GalleryController::class, 'gallery']);
Route::post('dropzone', [GalleryController::class, 'dropzone'])->name('dropzone');

// editor
Route::get('editor', [EditorController::class, 'editor']);

//  image crud
Route::get('workers', [WorkerController::class, 'index'])->name('workers');
Route::get('add-worker', [WorkerController::class, 'addWorker'])->name('worker.add');
Route::post('store-worker', [WorkerController::class, 'storeWorker'])->name('worker.store');
Route::get('edit-worker/{id}', [WorkerController::class, 'editWorker'])->name('worker.edit');
Route::post('update-worker', [WorkerController::class, 'updateWorker'])->name('worker.update');
Route::get('delete-worker/{id}', [WorkerController::class, 'deleteWorker'])->name('worker.delete');

// Helper
Route::get('test-helper', [TestController::class, 'getFirstLastName']);

// form contact
Route::get('form-contact', [ContactController::class, 'contact']);
Route::post('send-contact', [ContactController::class, 'sendEmail'])->name('contact.sent');

// ZipFile
Route::get('zip', [ZipController::class, 'zipFile']);

// Search
Route::get('add-product', [ProductController::class, 'addProduct']);
Route::get('search', [ProductController::class, 'search']);
Route::get('auto-complete', [ProductController::class, 'autoComplete'])->name('autocomplete');
