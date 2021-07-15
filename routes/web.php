<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{id}', [HomeController::class, 'blog_single'])->name('blogs.single');
Route::get('/works', [HomeController::class, 'works'])->name('works');
Route::get('/works/{id}', [HomeController::class, 'work_single'])->name('works.single');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{id}', [HomeController::class, 'service_single'])->name('services.single');
Route::get('/recruit', [HomeController::class, 'recruit'])->name('recruit');
Route::post('/recruit/post', [HomeController::class, 'recruit_post'])->name('recruit.post');
Route::get('/company', [HomeController::class, 'company'])->name('company');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/post', [HomeController::class, 'contact_post'])->name('contact.post');
Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap');

//Admin Routes

//dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

//blog
Route::get('/admin/blogs', [AdminController::class, 'blogs'])->name('admin.blogs');
Route::get('/admin/blog/add', [AdminController::class, 'blog_add'])->name('admin.blog.add');
Route::get('/admin/blog/{id}', [AdminController::class, 'blog_single'])->name('admin.blog.single');
Route::post('/admin/blog/store', [AdminController::class, 'blog_store'])->name('admin.blog.store');
Route::get('/admin/blog/edit/{id}', [AdminController::class, 'blog_edit'])->name('admin.blog.edit');
Route::post('/admin/blog/update/{id}', [AdminController::class, 'blog_update'])->name('admin.blog.update');
Route::get('/admin/blog/delete/{id}', [AdminController::class, 'blog_delete'])->name('admin.blog.delete');


Route::post('/admin/ckeditor/upload', [AdminController::class, 'ckeditor_upload'])->name('ckeditor.upload');

//work
Route::get('/admin/works', [AdminController::class, 'works'])->name('admin.works');
Route::get('/admin/work/add', [AdminController::class, 'work_add'])->name('admin.work.add');
Route::get('/admin/work/{id}', [AdminController::class, 'work_single'])->name('admin.work.single');
Route::post('/admin/work/store', [AdminController::class, 'work_store'])->name('admin.work.store');
Route::get('/admin/work/edit/{id}', [AdminController::class, 'work_edit'])->name('admin.work.edit');
Route::post('/admin/work/update/{id}', [AdminController::class, 'work_update'])->name('admin.work.update');
Route::get('/admin/work/delete/{id}', [AdminController::class, 'work_delete'])->name('admin.work.delete');

//service
Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');
Route::get('/admin/service/add', [AdminController::class, 'service_add'])->name('admin.service.add');
Route::get('/admin/service/{id}', [AdminController::class, 'service_single'])->name('admin.service.single');
Route::post('/admin/service/store', [AdminController::class, 'service_store'])->name('admin.service.store');
Route::get('/admin/service/edit/{id}', [AdminController::class, 'service_edit'])->name('admin.service.edit');
Route::post('/admin/service/update/{id}', [AdminController::class, 'service_update'])->name('admin.service.update');
Route::get('/admin/service/delete/{id}', [AdminController::class, 'service_delete'])->name('admin.service.delete');

//user management
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/user/add', [AdminController::class, 'user_add'])->name('admin.user.add');
Route::get('/admin/user/{id}', [AdminController::class, 'user_single'])->name('admin.user.single');
Route::post('/admin/user/store', [AdminController::class, 'user_store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [AdminController::class, 'user_edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');
Route::get('/admin/user/delete/{id}', [AdminController::class, 'user_delete'])->name('admin.user.delete');

//auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_user'])->name('login');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'store_user'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
