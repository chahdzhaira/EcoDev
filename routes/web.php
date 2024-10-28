<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackOffice\PublicationAdminController  ;
use App\Http\Controllers\FrontOffice\PublicationController  ;
use App\Http\Controllers\FrontOffice\CommentController;
use App\Http\Controllers\RecyclingCenterController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\SalesCenterController;
use App\Http\Controllers\RecycledProductController;

use App\Http\Controllers\DeliveryAgenceController;

use App\Http\Controllers\SpecialServiceController;

use App\Http\Controllers\DepotCenterController;
use App\Http\Controllers\WasteController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\eventsController;
use App\Http\Controllers\participationController;
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
})->name('indexFront');

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

Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('publication/{id}',[PublicationAdminController::class,'update']);
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('create',[PublicationAdminController::class,'createByTextEditor']);
Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('post',[PublicationAdminController::class,'storeByTextEditor']);
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('edit/{id}',[PublicationAdminController::class,'editByTextEditor']);
Route::middleware(['auth:sanctum', 'verified', 'admin'])->put('update/{id}', [PublicationAdminController::class, 'updateByTextEditor']);
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('delete/{id}',[PublicationAdminController::class,'destroyByTextEditor']);
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/search', [PublicationAdminController::class, 'search'])->name('search');


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



//crud Depot_Center

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/create', function () {
    return view('BackOffice.Depot-Center.create');
})->name('create');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/index', function () {
    return view('BackOffice.Depot-Center.index');
})->name('index');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/edit', function () {
    return view('BackOffice.Depot-Center.edit');
})->name('edit');


Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/create', function () {
    return view('BackOffice.recycling_centers.create');
})->name('create');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/index', function () {
    return view('BackOffice.recycling_centers.index');
})->name('index');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/edit', function () {
    return view('BackOffice.recycling_centers.edit');
})->name('Recyclingedit');




// Route::get('/show', function () {
//     return view('FrontOffice.Depot-Center.index');
// })->name('show');

Route::get('/depotCenters', [DepotCenterController::class, 'userIndex'])->name('depot_center.index');



//crud Wastes
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/index', function () {
    return view('BackOffice.wastes.index');
})->name('index');

// Route::get('/create', function () {
//     return view('FrontOffice.wastes.create');
// })->name('create');

Route::get('/wastes/create/{depotId}', [WasteController::class, 'create'])->name('wastes.create');
//Route::get('/wastes/create/{depotId}', [WasteController::class, 'create'])->name('wastes.create');
Route::post('/wastes/store', [WasteController::class, 'store'])->name('wastes.store');
Route::get('/wastes/byDepot/{depotId}', [WasteController::class, 'getWastesByDepotCenter'])->name('wastes.byDepot');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/wastes/statistics', [WasteController::class, 'statistics'])->name('wastes.statistics');

Route::Resource('wastes', WasteController::class);
Route::resource('depot_centers', DepotCenterController::class);



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


Route::get('/waste/{id}/distribution-history', [WasteController::class, 'showDistributionHistory'])->name('waste.distribution.history');
Route::get('/wastes/create', [WasteController::class, 'create'])->name('wastes.create');
Route::post('/wastes/store', [WasteController::class, 'store'])->name('wastes.store');




// Route pour afficher l'historique des distributions
Route::get('/distributions', [DistributionController::class, 'index'])->name('distributions.index');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/distributions/export', [DistributionController::class, 'exportPDF'])->name('distributions.export');


Route::get('/recycling_centers/{id}', [RecyclingCenterController::class, 'show'])->name('recycling_centers.show');
Route::post('/recycling_centers/{id}/review', [RecyclingCenterController::class, 'addReview'])->name('recycling_centers.addReview');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/recycling-centers/download-pdf', [RecyclingCenterController::class, 'downloadPdf'])->name('recycling_centers.download_pdf');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/distributions/archived', [DistributionController::class, 'showArchived'])->name('distributions.archived');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->patch('/distributions/{id}/archive', [DistributionController::class, 'archive'])->name('distributions.archive');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->patch('/distributions/{id}/unarchive', [DistributionController::class, 'unarchive'])->name('distributions.unarchive');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/distributions/stats', [DistributionController::class, 'stats'])->name('distributions.stats');

Route::resource('/events', EventController::class);
Route::resource('/back/event', EventsController::class);

// Route pour gérer la soumission du formulaire
Route::post('/events/{event}/participate', [ParticipationController::class, 'store'])->name('participations.store');

Route::get('/events/{event}/participate', [ParticipationController::class, 'create'])->name('participations.create');
Route::delete('/participation/{participationId}', [ParticipationController::class, 'destroy'])->name('participation.destroy');
Route::get('participation/voucher/{eventId}/{participationId}', [ParticipationController::class, 'voucher'])->name('participation.voucher');
Route::post('voucher/download/{eventId}/{participationId}', [ParticipationController::class, 'downloadVoucher'])->name('voucher.download');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('FrontOffice.index'); // Or specify the view you want to display, e.g., 'dashboard'
    });
});

//Back - SalesCentercontrollers
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/sales_center_list', [SalesCenterController::class, 'index'])->name('salesCenters.index');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/sales_center_create', [SalesCenterController::class, 'create'])->name('salesCenters.create');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/sales_center_store', [SalesCenterController::class, 'store'])->name('salesCenters.store');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/sales_centers/{id}/edit', [SalesCenterController::class, 'edit'])->name('salesCenters.edit');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->delete('/sales_centers/{id}', [SalesCenterController::class, 'destroy'])->name('salesCenters.destroy');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->put('/sales-centers/{id}', [SalesCenterController::class, 'update'])->name('salesCenters.update');
//Back - RecycledProductController
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('salesCenters/{salesCenter}/recycledProducts', [RecycledProductController::class, 'index'])
    ->name('BackOffice.RecycledProduct.index');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/sales_centers/{salesCenter}/recycled_products/create', [RecycledProductController::class, 'create'])->name('BackOffice.RecycledProduct.create');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->post('/sales_centers/{salesCenter}/recycled_products', [RecycledProductController::class, 'store'])->name('BackOffice.RecycledProduct.store');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->put('/sales_centers/{salesCenter}/recycled_products/{recycledProduct}', [RecycledProductController::class, 'update'])->name('BackOffice.RecycledProduct.update');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/sales_centers/{salesCenter}/recycled_products/{recycledProduct}/edit', [RecycledProductController::class, 'edit'])->name('BackOffice.RecycledProduct.edit');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->delete('/recycled-products/{salesCenter}/{product}', [RecycledProductController::class, 'destroy'])->name('BackOffice.RecycledProduct.destroy');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('back-office/recycled-products/{salesCenterId}/{productId}/details', [RecycledProductController::class, 'show'])->name('BackOffice.RecycledProduct.show');


//Front - SalesCenterController 

Route::get('/front/sales-centers', [SalesCenterController::class, 'index'])->name('FrontOffice.salesCenters.index');

//Front - RecycledProductController 
Route::get('/front/sales-centers/{salesCenter}/recycled-products', [RecycledProductController::class, 'index'])
    ->name('FrontOffice.RecycledProduct.index');
    Route::get('/front/sales-centers/{salesCenterId}/{productId}/details', [RecycledProductController::class, 'show'])->name('FrontOffice.RecycledProduct.show');

//pdf
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/salesCenters/pdf', [SalesCenterController::class, 'generatePDF'])->name('salesCenters.pdf');
// routes/web.php
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/recycled-products/download/{salesCenterId}', [RecycledProductController::class, 'downloadPDF'])->name('recycledProducts.download');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/sales-center/{id}/recycled-products/statistics', [RecycledProductController::class, 'showStatistics'])->name('recycledProducts.statistics');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/salesCenters/map/{id}', [SalesCenterController::class, 'showMap'])->name('salesCenters.map');
