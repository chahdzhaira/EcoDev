<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/todo', function () {
return view('todo');
})->name('dashboard-todo');

Route::get('/', function () {
    return view('FrontOffice.index');
})->name('index');

Route::get('redirects' , 'App\Http\Controllers\HomeController@index');
// route FrontOffice

// Route::get('/indexFront', function () {
//     return view('FrontOffice.index');
// })->name('index');

Route::get('/team', function () {
    return view('FrontOffice.team');
})->name('team');
Route::get('/services', function () {
    return view('FrontOffice.services');
})->name('services');

Route::get('/faq', function () {
    return view('FrontOffice.faq');
})->name('faq');

Route::get('/detail', function () {
    return view('FrontOffice.detail');
})->name('detail');

Route::get('/contact', function () {
    return view('FrontOffice.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('FrontOffice.blog');
})->name('blog');

Route::get('/blog_detail', function () {
    return view('FrontOffice.blog_detail');
})->name('blog_detail');

Route::get('/about', function () {
    return view('FrontOffice.about');
})->name('about');

// route BackOffice

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/dashboard', function () {
    return view('BackOffice.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/widgets', function () {
    return view('BackOffice.widgets');
})->name('widgets');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/ui-cards', function () {
    return view('BackOffice.ui-cards');
})->name('ui-cards');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/table-data-table', function () {
    return view('BackOffice.table-data-table');
})->name('table-data-table');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/table-basic', function () {
    return view('BackOffice.table-basic');
})->name('table-basic');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/page-user', function () {
    return view('BackOffice.page-user');
})->name('page-user');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/page-mailbox', function () {
    return view('BackOffice.page-mailbox');
})->name('page-mailbox');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/page-login', function () {
    return view('BackOffice.page-login');
})->name('page-login');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/page-lockscreen', function () {
    return view('BackOffice.page-lockscreen');
})->name('page-lockscreen');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/page-invoice', function () {
    return view('BackOffice.page-invoice');
})->name('page-invoice');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/page-error', function () {
    return view('BackOffice.page-error');
})->name('page-error');

Route::middleware(['auth:sanctum', 'verified'])->get('/indexBack', function () {
    return view('BackOffice.index');
})->name('indexBack');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/form-samples', function () {
    return view('BackOffice.form-samples');
})->name('form-samples');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/form-components', function () {
    return view('BackOffice.form-components');
})->name('form-components');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/docs', function () {
    return view('BackOffice.docs');
})->name('docs');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/bootstrap-components', function () {
    return view('BackOffice.bootstrap-components');
})->name('bootstrap-components');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/blank-page', function () {
    return view('BackOffice.blank-page');
})->name('blank-page');