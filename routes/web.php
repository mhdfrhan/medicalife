<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', "HomeController@index")->name('home');
Route::get('/product/{slug}', 'HomeController@detailProduct')->name('detail.product');
Route::get('/products', 'HomeController@allProducts')->name('all.products');
Route::get('/articles', 'ArticleController@index')->name('articles');
Route::get('/article/{slug}', 'ArticleController@show')->name('article.show');

Route::get('/clear-cache', function () {
	$exitCodeView = Artisan::call('view:clear');
	$exitCodeRoute = Artisan::call('route:clear');
	$exitCodeConfig = Artisan::call('config:clear');
	$exitCodeCache = Artisan::call('cache:clear');

	return redirect()->back();
});


Route::middleware('auth')->group(function () {

	Route::get('/cart', 'CartController@index')->name('cart');
	Route::get('/confirmation', 'CartController@confirmation')->name('confirmation');
	Route::get('/user/dashboard', 'UserController@dashboard')->name('user.dashboard');
	Route::get('/user/dashboard/transaction', 'UserController@transaction')->name('user.transaction');
	Route::get('/user/dashboard/transaction/order/{invoice}/review', 'UserController@review')->name('user.review');
	Route::get('/user/dashboard/reviews', 'UserController@userReviews')->name('user.reviews');
	Route::get('/user/dashboard/account/security', 'UserController@security')->name('user.security');

	// khusus admin
	Route::middleware('admin')->group(function () {
		Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
		Route::get('/dashboard/messages', 'DashboardController@message')->name('message');

		// products
		Route::get('/dashboard/e-commerce/semua-produk', 'DashboardController@allProducts')->name('dashboard.products');
		Route::get('/dashboard/e-commerce/tambah-produk', 'DashboardController@addProducts')->name('tambah.products');
		Route::get('/dashboard/e-commerce/{slug}/edit', 'DashboardController@editProducts')->name('edit.products');
		Route::get('/dashboard/e-commerce/orders', 'DashboardController@order')->name('dashboard.orders');
		Route::get('/dashboard/e-commerce/detail-order/{invoice}', 'DashboardController@detailOrder')->name('detail.order');

		// article
		Route::get('/dashboard/article/all', 'DashboardController@article')->name('dashboard.article');
		Route::get('/dashboard/article/add', 'DashboardController@addArticle')->name('tambah.article');
		Route::get('/dashboard/article/{slug}/edit', 'DashboardController@editArticle')->name('edit.article');

		// users
		Route::get('/dashboard/users/semua-user', 'DashboardController@allUsers')->name('all.users');
		Route::get('/dashboard/users/tambah-user', 'DashboardController@addUser')->name('tambah.user');
		Route::get('/dashboard/users/edit/{id}', 'DashboardController@editUser')->name('edit.user');
		Route::get('/dashboard/users/detail/{id}', 'DashboardController@detailUser')->name('detail.user');

		// admin
		Route::get('/dashboard/admin/semua-admin', 'DashboardController@allAdmins')->name('all.admin');
		Route::get('/dashboard/admin/tambah-admin', 'DashboardController@addAdmin')->name('tambah.admin');

		Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	});
});

require __DIR__ . '/auth.php';
