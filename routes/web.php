<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

//Controllers
use App\Http\Controllers\TasksController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ThumbnailController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\MailController;


use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\CertificatesController;

use App\Http\Livewire\chat\CreateChat;
use App\Http\Livewire\chat\Main;




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
//note routes 
Route::middleware(['auth:sanctum', 'verified'])->post('/notes/store', [NotesController::class, 'store'])->name('notes.create');
Route::middleware(['auth:sanctum', 'verified'])->get('/notes', [NotesController::class, 'index'])->name('notes.index');
Route::middleware(['auth:sanctum', 'verified'])->delete('/notes/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');
Route::middleware(['auth:sanctum', 'verified'])->put('/notes/{id}', [NotesController::class, 'update'])->name('notes.update');
Route::middleware(['auth:sanctum', 'verified'])->get('/notes/check-expired-notes', [NotesController::class, 'checkExpiredNotes']  );

//documentation 
Route::middleware(['auth:sanctum', 'verified'])->get('/documentation', [DocumentationController::class, 'index'])->name('documentation.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/documentation/', [DocumentationController::class, 'store'])->name('documentation.store');
Route::middleware(['auth:sanctum', 'verified'])->delete('/documentation/{id}', [DocumentationController::class , 'destroy'])->name('documentation.destroy');
Route::middleware(['auth:sanctum', 'verified'])->put('/documentation/{id}', [DocumentationController::class, 'update'])->name('documentation.update');


Route::middleware(['auth:sanctum', 'verified'])->get('/checkout/{id}txn{amount}', [CheckoutController::class, 'checkout'])->name('checkout.new');
Route::post('/checkout/', [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');


// Route::get('/pay', function () {
//     return view('order.payment');
// });


// chat
// begin 

Route::get('/users', CreateChat::class)->name('users');
Route::get('/chat{key?}', Main::class)->name('chat');
Route::delete('/delete-message/{id}', 'MessageController@delete');

// end


Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/send/mail',[ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/terms', function () {
    return view('termspolicies');
})->name('terms');

Route::get('/about', [FreelancerController::class, 'about'])->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/orders', function () {
    return view('order.user');
})->name('orders');

//freelancer routes
Route::get('/freelancer', [FreelancerController::class, 'index'])->name('freelancer.list');
Route::middleware(['auth:sanctum', 'verified'])->get('/freelancer/create', [FreelancerController::class, 'create'])->name('freelancer.create.view');
Route::middleware(['auth:sanctum', 'verified'])->post('/freelancer/store', [FreelancerController::class, 'store'])->name('freelancer.store');
// Route::get('/freelancer/{id}', [FreelancerController::class, 'show'])->name('freelancer.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/freelancer/edit/{id}', [FreelancerController::class, 'edit'])->name('freelancer.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/freelancer/update/{id}', [FreelancerController::class, 'update'])->name('freelancer.update');
Route::middleware(['auth:sanctum', 'verified'])->get('/freelancer/delete/{id}', [FreelancerController::class, 'destroy'])->name('freelancer.delete');

//gig routes
Route::get('/', [GigController::class, 'index'])->name('gig.list');
Route::middleware(['auth:sanctum', 'verified'])->get('/gig/create', [GigController::class, 'create'])->name('gig.create.view');
Route::middleware(['auth:sanctum', 'verified'])->post('/gig/store', [GigController::class, 'store'])->name('gig.store');
Route::get('/gig/{id}', [GigController::class, 'show'])->name('gig.show');
Route::post('/searchresult', [GigController::class, 'search'])->name('gig.searchresult');
Route::get('/search', [GigController::class, 'search'])->name('gig.search');
Route::post('/searchresult/category', [GigController::class, 'categorySearch'])->name('category.searchresult');
Route::get('/search/category', [GigController::class, 'categorySearch'])->name('category.search');
Route::middleware(['auth:sanctum', 'verified'])->get('/gig/edit/{id}', [GigController::class, 'edit'])->name('gig.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/gig/update/{id}', [GigController::class, 'update'])->name('gig.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/gig/delete/{id}', [GigController::class, 'destroy'])->name('gig.delete');








Route::middleware(['auth:sanctum', 'verified'])->get('/order/list', [OrderController::class, 'index'])->name('order.list');
Route::middleware(['auth:sanctum', 'verified'])->get('/order/create/{id}', [OrderController::class, 'create'])->name('order.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/order/update/{id}', [OrderController::class, 'update'])->name('order.update');

Route::get('/user', [UserController::class, 'index'])->name('user.list');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/option/create/{id}', [OptionController::class, 'create'])->name('option.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/option/store', [OptionController::class, 'store'])->name('option.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/thumbnail/create/{id}', [ThumbnailController::class, 'create'])->name('thumbnail.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/thumbnail/store', [ThumbnailController::class, 'store'])->name('thumbnail.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/skill/create/{id}', [SkillController::class, 'create'])->name('skill.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/skill/store', [SkillController::class, 'store'])->name('skill.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/skill/show/{id}', [SkillController::class, 'show'])->name('skill.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/skill/update/{id}', [SkillController::class, 'update'])->name('skill.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/skill/destroy/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/skill/{id}/rate', [SkillRatingController::class, 'create'])->name('skill.rate');
Route::middleware(['auth:sanctum', 'verified'])->post('/skill/{id}/rate', [SkillRatingController::class, 'store'])->name('skill.rate.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/skill/{id}/rating/{ratingId}', [SkillRatingController::class, 'show'])->name('skill.rate.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/skill/{id}/rating/{ratingId}/edit', [SkillRatingController::class, 'edit'])->name('skill.rate.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/skill/{id}/rating/{ratingId}', [SkillRatingController::class, 'update'])->name('skill.rate.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/skill/{id}/rating/{ratingId}', [SkillRatingController::class, 'destroy'])->name('skill.rate.destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/certificates/show/{id}', [CertificatesController::class, 'show'])->name('certificates.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/certificates/edit/{id}', [CertificatesController::class, 'edit'])->name('certificates.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/certificates/update/{id}', [CertificatesController::class, 'update'])->name('certificates.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/certificates/destroy/{id}', [CertificatesController::class, 'destroy'])->name('certificates.destroy');
Route::middleware(['auth:sanctum', 'verified'])->get('/certificates/create/{skillId}', [CertificatesController::class, 'create'])->name('certificates.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/certificates', [CertificatesController::class, 'store'])->name('certificates.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/certificates', [CertificatesController::class, 'index'])->name('certificates.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/language/create/{id}', [LanguageController::class, 'create'])->name('language.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/language/store', [LanguageController::class, 'store'])->name('language.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/language/show/{id}', [LanguageController::class, 'show'])->name('language.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/language/update/{id}', [LanguageController::class, 'update'])->name('language.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/language/destroy/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/qualification/create/{id}', [QualificationController::class, 'create'])->name('qualification.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/qualification/store', [QualificationController::class, 'store'])->name('qualification.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/qualifications/edit/{id}', [QualificationController::class, 'edit'])->name('qualification.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/qualifications/{id}', [QualificationController::class, 'update'])->name('qualification.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/qualifications/{id}', [QualificationController::class, 'destroy'])->name('qualification.destroy');


Route::middleware(['auth:sanctum', 'verified'])->get('/employment/create/{id}', [EmploymentController::class, 'create'])->name('employment.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/employment/store', [EmploymentController::class, 'store'])->name('employment.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/employment/edit/{id}', [EmploymentController::class, 'edit'])->name('employment.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/employment/{id}', [EmploymentController::class, 'update'])->name('employment.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/employment/{id}', [EmploymentController::class, 'destroy'])->name('employment.destroy');

// Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::middleware(['auth:sanctum', 'verified'])->get('/admin', [CategoryController::class, 'index'])->name('dashboard');
    Route::middleware(['auth:sanctum', 'verified'])->post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::middleware(['auth:sanctum', 'verified'])->post('/sub_category/store', [SubCategoryController::class, 'store'])->name('sub_category.store');


//reclamation routes 

Route::get('/reclamations', [ReclamationController::class, 'listReclamations'])->name('reclamationsindex');
Route::get('/reclamations/create', [ReclamationController::class, 'create'])->name('reclamationscreate');
Route::middleware(['auth'])->post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::delete('/reclamations/{id}',  [ReclamationController::class, 'destroy'])->name('reclamation.destroy');
Route::get('/reclamations/{id}/edit', [ReclamationController::class, 'edit'])->name('reclamationsedit');
Route::put('/reclamations/{id}',  [ReclamationController::class, 'update'])->name('reclamations.update');
Route::get('admin/reclamations', [ReclamationController::class, 'toutelistReclamations'])->name('reclamationsindexall');
Route::delete('admin/reclamations/{id}',  [ReclamationController::class, 'Adestroy'])->name('reclamation.Adestroy');


//responces routes
Route::get('/{Reclamationid}/reponses/create', [ReclamationController::class, 'createR'])->name('responsescreate');
Route::post('/reclamations/{Reclamationid}/reponses', [ReclamationController::class, 'storeR'])->name('reponses.store');
Route::delete('/reponses/{idReponse}', [ReclamationController::class, 'destroyR'])->name('reponses.destroy');
Route::get('/reclamations/{Reclamationid}/reponses/{id}/edit', [ReclamationController::class, 'editR'])->name('reponsesedit');
Route::put('/reclamations/{Reclamationid}/reponses/{id}', [ReclamationController::class, 'updateR'])->name('reponses.update');

// Edit Subcategory
Route::middleware(['auth:sanctum', 'verified'])->get('/subcategories/{subcategory}/edit',[SubCategoryController::class, 'edit'])->name('subcategories.edit');

// Delete Subcategory
Route::middleware(['auth:sanctum', 'verified'])->delete('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');


Route::middleware(['auth:sanctum', 'verified'])->put('/sub_category/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');


// Edit a category
Route::middleware(['auth:sanctum', 'verified'])->get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Update a category
Route::middleware(['auth:sanctum', 'verified'])->put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

// Delete a category
Route::middleware(['auth:sanctum', 'verified'])->delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    
    Route::get('/email/send-test-email', [MailController::class ,'sendTestEmail']);
    // Routes pour les événements
Route::middleware(['auth:sanctum', 'verified'])->get('/events', [EventsController::class, 'index'])->name('events.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/events', [EventsController::class, 'store'])->name('events.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/events/{event}', [EventsController::class, 'show'])->name('events.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/events/{event}', [EventsController::class, 'update'])->name('events.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/events/{event}', [EventsController::class, 'destroy'])->name('events.destroy');



Route::middleware(['auth:sanctum', 'verified'])->get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/{task}', [TasksController::class, 'show'])->name('tasks.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/cardEvent', [EventsController::class, 'cardEvent'])->name('events.cardEvent');
Route::middleware(['auth:sanctum', 'verified'])->post('/events/{event}/reserve', [EventsController::class, 'reserveEvent'])->name('events.reserve');


Route::middleware(['auth:sanctum', 'verified'])->get('/events/showClient/{event}', [EventsController::class, 'showClient'])->name('events.showClient');

//Route::middleware(['auth:sanctum', 'verified'])->get('/events/filter', [EventsController::class, 'filter'])->name('events.filter');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/reservations', [EventsController::class, 'adminReservations'])->name('admin.reservations');
