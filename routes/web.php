<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PorfolioController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeAboutController;
use App\Models\User;
use App\Models\Multipic;
use App\Models\PorfolioCard;
use App\Models\PorfolioWeb;
use Illuminate\Support\Facades\DB;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->latest()->first();
    $multipic = Multipic::all();
    $cards = PorfolioCard::all();
    $webs = PorfolioWeb::all();
    return view('home', compact('brands', 'abouts', 'multipic', 'cards', 'webs'));
});
Route::get('/home', function () {
    echo "this is home page";
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contactdadadas', [ContactController::class, 'index'])->name('contact');

// all categories
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/category/trash/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/category/pdelete/{id}', [CategoryController::class, 'Pdelete']);

// all brand
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);



// multi image route.. PORFOLIO - App
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImage'])->name('store.image');
Route::get('/multipic/delete/{id}', [BrandController::class, 'MultipicDelete']);

// multi image route.. PORFOLIO - Card
Route::get('/porfoliocard/image', [PorfolioController::class, 'PorfolioCard'])->name('porfoliocard.image');
Route::post('/porfoliocard/add', [PorfolioController::class, 'PorfolioCardAdd'])->name('porfoliocard-add.image');
Route::get('porfoliocard/delete/{id}', [PorfolioController::class, 'PorfolioCardDelete']);

// multi image route.. PORFOLIO - Web
Route::get('/porfolioweb/image', [PorfolioController::class, 'PorfolioWeb'])->name('porfolioweb.image');
Route::post('/porfolioweb/add', [PorfolioController::class, 'PorfolioWebAdd'])->name('porfolioweb-add.image');
Route::get('porfolioweb/delete/{id}', [PorfolioController::class, 'PorfoliowebDelete']);


// All ADMIN ROUTES
Route::get('/home/slider', [SliderController::class, 'HomeSlider'])->name('home.slider');
Route::get('/slider/add', [SliderController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [SliderController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [SliderController::class, 'Edit']);
Route::post('/slider/update/{id}', [SliderController::class, 'Update']);
Route::get('/slider/delete/{id}', [SliderController::class, 'Delete']);

// Home About All Routes
Route::get('/home/about', [HomeAboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/about/add', [HomeAboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [HomeAboutController::class, 'StoreAbout'])->name('store.about');
Route::get('about/edit/{id}', [HomeAboutController::class, 'EditAbout']);
Route::post('about/update/{id}', [HomeAboutController::class, 'UpdateAbout']);
Route::get('about/delete/{id}', [HomeAboutController::class, 'DeleteAbout']);

// PORTFOLIO routes
Route::get('portfolio', [HomeAboutController::class, 'Portfolio'])->name('portfolio');


// Admin CONTACT routes
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');

Route::get('/admin/contact/message', [ContactController::class, 'AdminContactMessage'])->name('admin.contact.message');
Route::get('contact-form-message/delete/{id}', [ContactController::class, 'DeleteContactFormMessage']);


//Home CONTACT routes
Route::get('contact', [ContactController::class, 'Contact'])->name('contact');
Route::get('contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('contact/update/{id}', [ContactController::class, 'UpdateContact']);
Route::get('contact/delete/{id}', [ContactController::class, 'DeleteContact']);


Route::post('contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

// user logout
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

