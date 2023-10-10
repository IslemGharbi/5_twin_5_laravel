<?php

use Illuminate\Support\Facades\Route;

//Controllers
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

Route::middleware(['auth:sanctum', 'verified'])->get('/checkout/{id}txn{amount}', [CheckoutController::class, 'checkout'])->name('checkout.new');
Route::middleware(['auth:sanctum', 'verified'])->post('/checkout/', [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');


// Route::get('/pay', function () {
//     return view('order.payment');
// });

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
Route::middleware(['auth:sanctum', 'verified'])->get('/gig/delete/{id}', [GigController::class, 'destroy'])->name('gig.delete');

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

Route::middleware(['auth:sanctum', 'verified'])->get('/language/create/{id}', [LanguageController::class, 'create'])->name('language.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/language/store', [LanguageController::class, 'store'])->name('language.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/qualification/create/{id}', [QualificationController::class, 'create'])->name('qualification.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/qualification/store', [QualificationController::class, 'store'])->name('qualification.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/employment/create/{id}', [EmploymentController::class, 'create'])->name('employment.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/employment/store', [EmploymentController::class, 'store'])->name('employment.store');

// Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::middleware(['auth:sanctum', 'verified'])->get('/admin', [CategoryController::class, 'index'])->name('dashboard');
    Route::middleware(['auth:sanctum', 'verified'])->post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::middleware(['auth:sanctum', 'verified'])->post('/sub_category/store', [SubCategoryController::class, 'store'])->name('sub_category.store');
