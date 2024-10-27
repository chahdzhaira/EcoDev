<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecyclingCenterController;
use App\Http\Controllers\WasteController;
use App\Http\Controllers\DistributionController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/create', function () {
    return view('BackOffice.recycling_centers.create');
})->name('create');

Route::get('/index', function () {
    return view('BackOffice.recycling_centers.index');
})->name('index');

Route::get('/edit', function () {
    return view('BackOffice.recycling_centers.edit');
})->name('edit');




Route::get('/recycling-centers', [RecyclingCenterController::class, 'userIndex'])->name('recycling-centers.index');

// Routes existantes pour l'admin
Route::resource('recycling_centers', RecyclingCenterController::class);
Route::post('/recycling-centers/{center}/distribute', [RecyclingCenterController::class, 'distribute'])->name('distribute');


// Route pour afficher la liste des déchets
Route::get('/wastes', [WasteController::class, 'index'])->name('wastes.index');

// Route pour afficher le formulaire de distribution (POST)
Route::post('/waste/distribution/form', [WasteController::class, 'showDistributionForm'])->name('waste.distribution.form');

// Route pour traiter la distribution des déchets (POST)
Route::post('/waste/distribute', [WasteController::class, 'distribute'])->name('waste.distribute');

Route::get('/distributions', [DistributionController::class, 'index'])->name('distributions.index');

Route::get('/waste/{id}/distribution-history', [WasteController::class, 'showDistributionHistory'])->name('waste.distribution.history');
Route::get('/wastes/create', [WasteController::class, 'create'])->name('wastes.create');
Route::post('/wastes/store', [WasteController::class, 'store'])->name('wastes.store');




// Route pour afficher l'historique des distributions
Route::get('/distributions', [DistributionController::class, 'index'])->name('distributions.index');

Route::get('/distributions/export', [DistributionController::class, 'exportPDF'])->name('distributions.export');


Route::get('/recycling_centers/{id}', [RecyclingCenterController::class, 'show'])->name('recycling_centers.show');
Route::post('/recycling_centers/{id}/review', [RecyclingCenterController::class, 'addReview'])->name('recycling_centers.addReview');

Route::get('/recycling-centers/download-pdf', [RecyclingCenterController::class, 'downloadPdf'])->name('recycling_centers.download_pdf');

Route::get('/distributions/archived', [DistributionController::class, 'showArchived'])->name('distributions.archived');
Route::patch('/distributions/{id}/archive', [DistributionController::class, 'archive'])->name('distributions.archive');
Route::patch('/distributions/{id}/unarchive', [DistributionController::class, 'unarchive'])->name('distributions.unarchive');

Route::get('/distributions/stats', [DistributionController::class, 'stats'])->name('distributions.stats');

