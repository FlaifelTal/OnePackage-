<!-- {{-- creare three tables through migrations one by one make like three of the same coloumns and one different  --}}
 arabic english for database preferably one table look there is a better way to do it look for it  
{{-- for the most used stuff there is like an already made plugin in laravel research  
{{-- news for testing ar en  
 a form but for inserting new news 
 table one -> news
 title desc publish data img 
 , projects
 title desc img 
 , events 
 title desc date 
  
 img 
---------------------------------------
 -->
<!-- 
 validate formtype //
 before users look for middle ware  // 
 u can leave mixing the edit and update till after the user  // 
 finally log in sign in sign up /create profile  -->
<!-- add new  -->


<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArabicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\formController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// route::get('home', function(){
//     return view('main');
// });
// Route::get('/home', [ProductController::class, 'main']);


// Route::get('/view/{viewName}', [ProductController::class, 'index'])->name('products.renderView');

//main route 
route::get('/', [ProductController::class, 'index'])->name('main');
//get view
route::get('/form', [formController::class, 'index'])->name('form');
//post req
route::post('/form', [formController::class, 'submit'])->name('form.submit');

route::get('/gallery', [galleryController::class, 'index'])->name('gallery');
Route::delete('/gallery/{id}/forceDelete', [galleryController::class, 'forceDelete'])
    ->where('id', '[0-9]+')
    ->name('gallery.forceDelete');
Route::get('/gallery/{id}/edit', [galleryController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('gallery.edit');
Route::post('/gallery/{id}', [galleryController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('gallery.update');
Route::get('/ar', [ArabicController::class, 'index'])->name('ArabicMain');


// route::get('/ar/{viewName}',[ProductController::class,'index'])->name('ArabicMain.index');
// Route::get('/form/{formType}', [FormsController::class, 'index'])->name('form.index');
Route::get('/form/{formType}', [FormsController::class, 'showForm'])
    ->where('formType', '[a-zA-Z0-9]+')
    ->name('show');
// ->where('formType', '[a-zA-Z]+|[0-9]+')->name('show');
Route::post('/form-submit/{formType}', [FormsController::class, 'submitForm'])
    ->where('formType', '[a-zA-Z0-9]+')
    ->name('form1.submit');

Route::get('/{lang}/form/{formType}', [FormsController::class, 'index'])
    ->where('formType', '[a-zA-Z0-9]+')
    ->where('lang', 'en|ar')
    ->name('form.index');


//  put edit and update in a single fun // route 
// ______________________________________________________________________________________________________________

//we can do this 
// Route::get('/{lang}/form/{formType}', [FormsController::class, 'edit'])->name('form.edit');
// Route::get('/{lang}/form/{formType}/edit/{id}', [FormsController::class, 'edit'])
// ->where('formType', '[a-zA-Z0-9]+')
// ->where('id', '[0-9]+')
// ->where('lang', 'en|ar')
// ->name('form.edit');


// Route::post('/{lang}/form/{formType}/update/{id}', [FormsController::class, 'edit'])
// ->where('formType', '[a-zA-Z0-9]+')
// ->where('id', '[0-9]+')
// ->where('lang', 'en|ar')
// ->name('form.edit');

//or this // based on the request 
Route::match(['get', 'post'], '/{lang}/form/{formType}/edit/{id}', [FormsController::class, 'edit'])
    ->where('formType', '[a-zA-Z0-9]+')
    ->where('id', '[0-9]+')
    ->where('lang', 'en|ar')
    ->name('form.edit');


// Route::post('/{lang}/form/{formType}/update/{id}', [FormsController::class, 'update'])
// ->where('formType', '[a-zA-Z0-9]+')
// ->where('id', '[0-9]+')
// ->where('lang', 'en|ar')
// ->name('form.update');



// ______________________________________________________________________________________________________________
// put the get and post as the same route / and find how to handle the function/same fun
Route::delete('/{lang}/form/{formType}/delete/{id}', [FormsController::class, 'delete'])
    ->where('formType', '[a-zA-Z0-9]+')
    ->where('id', '[0-9]+')
    ->where('lang', 'en|ar')
    ->name('form.delete');
// ______________________________________________________________________________________________________________



//no roles 
//ensure authenticated admin can access these pages
Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/categories/create', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/admin/categories', [CategoryController::class, 'create'])->name('categories.create');

    Route::get('/admin/categories/list', [CategoryController::class, 'showCategoriesList'])->name('categories.list');
    Route::get('/admin/categories/{id}/children', [CategoryController::class, 'showChildren'])->name('categories.children');
});

route::fallback(function () {
    return "<h1>Page Does Not Exist</h1>";
});



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//ensure authenticated users can access these pages
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registration and login routes
Route::get('/register-c', [CustomAuthController::class, 'showRegisterForm'])->name('custom.register');
Route::post('/register-c', [CustomAuthController::class, 'register'])->name('custom.register.submit');

Route::get('/login-c', [CustomAuthController::class, 'showLoginForm'])->name('custom.login');
Route::post('/login-c', [CustomAuthController::class, 'login'])->name('custom.login.submit');
Route::post('/logout-c', [CustomAuthController::class, 'logout'])->name('custom.logout');

// Profile management routes
// Route::middleware('auth')->group(function () {
    Route::get('/profile-c', [CustomAuthController::class, 'profile'])->name('custom.profile');
    Route::post('/profile-c/update', [CustomAuthController::class, 'updateProfile'])->name('custom.profile.update');
    Route::post('/profile-c/delete', [CustomAuthController::class, 'deleteAccount'])->name('custom.profile.delete');
// }); 


require __DIR__ . '/auth.php';




