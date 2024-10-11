<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesCenterController;
use App\Http\Controllers\RecycledProductController;


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

Route::get('/', function () {
    return view('BackOffice.page-login');
})->name('page-login');

// route FrontOffice

Route::get('/indexFront', function () {
    return view('FrontOffice.index');
})->name('index');

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

Route::get('/dashboard', function () {
    return view('BackOffice.dashboard');
})->name('dashboard');

Route::get('/widgets', function () {
    return view('BackOffice.widgets');
})->name('widgets');

Route::get('/ui-cards', function () {
    return view('BackOffice.ui-cards');
})->name('ui-cards');

Route::get('/table-data-table', function () {
    return view('BackOffice.table-data-table');
})->name('table-data-table');

Route::get('/table-basic', function () {
    return view('BackOffice.table-basic');
})->name('table-basic');

Route::get('/page-user', function () {
    return view('BackOffice.page-user');
})->name('page-user');


Route::get('/page-mailbox', function () {
    return view('BackOffice.page-mailbox');
})->name('page-mailbox');

Route::get('/page-login', function () {
    return view('BackOffice.page-login');
})->name('page-login');

Route::get('/page-lockscreen', function () {
    return view('BackOffice.page-lockscreen');
})->name('page-lockscreen');

Route::get('/page-invoice', function () {
    return view('BackOffice.page-invoice');
})->name('page-invoice');

Route::get('/page-error', function () {
    return view('BackOffice.page-error');
})->name('page-error');

Route::get('/indexBack', function () {
    return view('BackOffice.index');
})->name('indexBack');

Route::get('/form-samples', function () {
    return view('BackOffice.form-samples');
})->name('form-samples');

Route::get('/form-components', function () {
    return view('BackOffice.form-components');
})->name('form-components');

Route::get('/docs', function () {
    return view('BackOffice.docs');
})->name('docs');

Route::get('/bootstrap-components', function () {
    return view('BackOffice.bootstrap-components');
})->name('bootstrap-components');

Route::get('/blank-page', function () {
    return view('BackOffice.blank-page');
})->name('blank-page');


//controllers
Route::get('/sales_center_list', [SalesCenterController::class, 'index'])->name('salesCenters.index');
Route::get('/sales_center_create', [SalesCenterController::class, 'create'])->name('salesCenters.create');
Route::post('/sales_center_store', [SalesCenterController::class, 'store'])->name('salesCenters.store');
Route::get('/sales_centers/{id}/edit', [SalesCenterController::class, 'edit'])->name('salesCenters.edit');
Route::delete('/sales_centers/{id}', [SalesCenterController::class, 'destroy'])->name('salesCenters.destroy');
Route::put('/sales-centers/{id}', [SalesCenterController::class, 'update'])->name('salesCenters.update');

// Route for recycled products related to a specific sales center
Route::get('salesCenters/{salesCenter}/recycledProducts', [RecycledProductController::class, 'index'])
    ->name('BackOffice.RecycledProduct.index');
Route::get('/sales_centers/{salesCenter}/recycled_products/create', [RecycledProductController::class, 'create'])->name('BackOffice.RecycledProduct.create');
Route::post('/sales_centers/{salesCenter}/recycled_products', [RecycledProductController::class, 'store'])->name('BackOffice.RecycledProduct.store');
Route::put('/sales_centers/{salesCenter}/recycled_products/{recycledProduct}', [RecycledProductController::class, 'update'])->name('BackOffice.RecycledProduct.update');
Route::get('/sales_centers/{salesCenter}/recycled_products/{recycledProduct}/edit', [RecycledProductController::class, 'edit'])->name('BackOffice.RecycledProduct.edit');
Route::delete('/recycled-products/{salesCenter}/{product}', [RecycledProductController::class, 'destroy'])->name('BackOffice.RecycledProduct.destroy');
Route::get('back-office/recycled-products/{salesCenterId}/{productId}/details', [RecycledProductController::class, 'show'])->name('BackOffice.RecycledProduct.show');


Route::get('/front/sales-centers', [SalesCenterController::class, 'index'])->name('FrontOffice.salesCenters.index');
// Route for recycled products related to a specific sales center in FrontOffice
Route::get('/front/sales-centers/{salesCenter}/recycled-products', [RecycledProductController::class, 'index'])
    ->name('FrontOffice.RecycledProduct.index');
    Route::get('/front/sales-centers/{salesCenterId}/{productId}/details', [RecycledProductController::class, 'show'])->name('FrontOffice.RecycledProduct.show');
