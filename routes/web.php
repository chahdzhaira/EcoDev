<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackOffice\PublicationAdminController  ;
use App\Http\Controllers\FrontOffice\PublicationController  ;
use App\Http\Controllers\FrontOffice\CommentController;


use App\Http\Controllers\DeliveryAgenceController;

use App\Http\Controllers\SpecialServiceController;

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

// Route::get('/awareness', function () {
//     return view('FrontOffice.Publication.index');
// })->name('awareness');

Route::resource('/awareness', PublicationController::class); 

Route::get('/publicationDetail', function () {
    return view('FrontOffice.Publication.publicationDetail');
})->name('publicationDetail');

Route::resource('comment', CommentController::class);

Route::post('/awareness/{publication}/comment', [CommentController::class, 'store'])->name('comment.store');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comment.update');
Route::get('comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::post('/comments/{id}/like', [CommentController::class, 'like'])->name('comment.like');

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

Route::resource('/publication', PublicationAdminController::class); 

Route::post('publication/{id}',[PublicationAdminController::class,'update']);
Route::get('create',[PublicationAdminController::class,'createByTextEditor']);
Route::post('post',[PublicationAdminController::class,'storeByTextEditor']);
Route::get('edit/{id}',[PublicationAdminController::class,'editByTextEditor']);
Route::put('update/{id}', [PublicationAdminController::class, 'updateByTextEditor']);
Route::get('delete/{id}',[PublicationAdminController::class,'destroyByTextEditor']);
Route::get('/search', [PublicationAdminController::class, 'search'])->name('search');


// Route Backoffice pour l'affichage des agences de livraison
Route::prefix('delivery-agences')->group(function () {
    Route::get('/', [DeliveryAgenceController::class, 'index'])->name('delivery-agences.index');
    Route::get('/create', [DeliveryAgenceController::class, 'create'])->name('delivery-agences.create');
    Route::post('/', [DeliveryAgenceController::class, 'store'])->name('delivery-agences.store');

    // Route::post('/special-services/{agencyId}/store', [SpecialServiceController::class, 'store'])->name('special-services.store');

    Route::get('/{id}/services', [DeliveryAgenceController::class, 'showServices'])->name('delivery-agences.services');
    Route::get('/{agencyId}/special-services', [SpecialServiceController::class, 'index'])->name('special-services.index'); // Route manquante ajoutée ici
    Route::get('/{agencyId}/special-services/create', [SpecialServiceController::class, 'create'])->name('special-services.create');
    Route::post('/{agencyId}/special-services', [SpecialServiceController::class, 'store'])->name('special-services.store');
    Route::get('/{agencyId}/special-services/{id}/edit', [SpecialServiceController::class, 'edit'])->name('special-services.edit');
    Route::put('/{agencyId}/special-services/{id}', [SpecialServiceController::class, 'update'])->name('special-services.update');
    Route::delete('/{agencyId}/special-services/{id}', [SpecialServiceController::class, 'destroy'])->name('special-services.destroy');

    Route::get('/{id}', [DeliveryAgenceController::class, 'show'])->name('delivery-agences.show');
    Route::get('/{id}/edit', [DeliveryAgenceController::class, 'edit'])->name('delivery-agences.edit');
    Route::put('/{id}', [DeliveryAgenceController::class, 'update'])->name('delivery-agences.update');
    Route::delete('/{id}', [DeliveryAgenceController::class, 'destroy'])->name('delivery-agences.destroy');
});

// Route FrontOffice pour l'affichage des agences de livraison
Route::prefix('front/delivery-agences')->group(function () {
    Route::get('/', [DeliveryAgenceController::class, 'indexFrontend'])->name('front.deliveryagence.index');
    Route::get('/{id}', [DeliveryAgenceController::class, 'showFrontend'])->name('front.deliveryagence.show');
// Route FrontOffice pour l'affichage des services spéciaux d'une agence de livraison
Route::get('/{agencyId}/special-services', [DeliveryAgenceController::class, 'showServicesFront'])->name('front.deliveryagence.special-services'); // Ajout de cette route






});



