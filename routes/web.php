<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FaQController;

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

// Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/', [GeneralController::class, 'home'])->name('home');
Route::get('/authadmin', [LoginController::class, 'index'])->name('loginadmin');

Route::get('/enkripsi', [BelajarController::class, 'enkripsi'])->name('enkripsi');
Route::get('/enkripsi-detail/{params}', [BelajarController::class, 'enkripsi_detail'])->name('enkripsi-detail');

Route::get('/hashing', [BelajarController::class, 'hashing'])->name('hashing');

Route::get('locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');


//home

    Route::get('/creategame', [AdminController::class, 'creategame'])->name('creategame');

//endhome

// GeneralRoute
    Route::get('/home', [GeneralController::class, 'home'])->name('home');
    Route::get('/detailtour/{id}', [GeneralController::class, 'detailtour'])->name('detailtour');
    Route::get('/detailtourvalo', [GeneralController::class, 'detailtourvalo'])->name('detailtourvalo');
    Route::get('/detaildonation', [GeneralController::class, 'detaildonation'])->name('detaildonation');
    Route::get('/mainblog', [GeneralController::class, 'mainblog'])->name('mainblog');
    Route::get('/about', [GeneralController::class, 'about'])->name('about');
    Route::get('/blog/{id}', [GeneralController::class, 'blog'])->name('blog');
    Route::get('/contact', [GeneralController::class, 'contact'])->name('contact');
    Route::get('/tournament', [GeneralController::class, 'tournament'])->name('tournament');
    Route::post('/tournament/register', [TournamentController::class, 'registertim'])->name('tournamentregister');
    Route::post('/tour/storefe', [TournamentController::class, 'storetourfe'])->name('storetourfe');
    Route::get('/tour/createfe', [TournamentController::class, 'createtourfe'])->name('createtourfe');
    Route::get('/faq', [GeneralController::class, 'showFaq'])->name('faq');

    
// endGeneralRoute

// GuestRoute
    Route::group(['prefix' => 'guest', 'middleware' => ['isGuest'], 'as' => 'guest.'], function () {
        Route::get('/login', [GuestController::class, 'index'])->name('login');
        Route::post('/loginproses', [GuestController::class, 'loginproses'])->name('loginproses');

        Route::get('/forgotpassword', [GuestController::class,'forgotpassword'])->name('forgotpassword');
        Route::post('/forgotpasswordact', [GuestController::class, 'forgotpasswordact'])->name('forgotpasswordact');

        Route::get('/register', [GuestController::class,'register'])->name('register');
        Route::post('/registerproses', [GuestController::class,'registerproses'])->name('registerproses');

        Route::get('/validasiforgotpassword/{token}', [GuestController::class, 'validasiforgotpassword'])->name('validasiforgotpassword');
        Route::post('/validasiforgotpasswordact', [GuestController::class, 'validasiforgotpasswordact'])->name('validasiforgotpasswordact');

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/login', [LoginController::class, 'index'])->name('login');

            Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
            Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

            Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
            Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

            Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

            Route::get('/register', [LoginController::class, 'register'])->name('register');
            Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
        });
    });
// endGuestRoute

// UserOnlyRoute
    Route::group(['prefix' => 'pengguna_biasa', 'middleware' => ['isPengguna_Biasa'], 'as' => 'pengguna_biasa.'], function () {
        Route::get('/logout', [UserController::class,'logout'])->name('logout');

        Route::get('/createtour', [UserController::class, 'createtour'])->name('createtour');
        Route::get('/tour/createfe', [TournamentController::class, 'createtourfe'])->name('createtourfe');
        
        Route::get('/tour', [TournamentController::class, 'indextour'])->name('tour.index');
        Route::get('/tour/detail/{id}', [TournamentController::class, 'indexdetailtour'])->name('tour.detail');
        Route::get('/tour/create', [TournamentController::class, 'createtour'])->name('tour.create');
        Route::post('/tour/store', [TournamentController::class, 'storetour'])->name('tour.store');
        Route::get('/tour/edit/{id}', [TournamentController::class, 'edittour'])->name('tour.edit');
        Route::put('/tour/update/{id}', [TournamentController::class, 'updatetour'])->name('tour.update');
        Route::delete('/tour/delete/{id}', [TournamentController::class, 'deletetour'])->name('tour.delete');
        Route::get('/tour/createfe', [TournamentController::class, 'createtourfe'])->name('createtourfe');
        Route::post('/tour/storefe', [TournamentController::class, 'storetourfe'])->name('storetourfe');
        Route::post('/tournament/register/{id}', [TournamentController::class, 'register'])->name('tour.register');

        Route::post('/berita/{berita}/comments', [CommentController::class, 'store'])->name('comments.store');

        Route::get('/chat', [UserController::class,'chat'])->name('chat');

            //standing
        Route::get('/tournaments/{tournament}/standings', [StandingController::class, 'index'])->name('standing.index');
        Route::get('/tournaments/{tournament}/standings/{standing}/edit', [StandingController::class, 'edit'])->name('standing.edit');
        Route::put('/standings/{standing}', [StandingController::class, 'update'])->name('standing.update');
    });
// endUserOnlyRoute

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logoutuser', [LoginController::class, 'logoutuser'])->name('logoutuser');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/user', [AdminController::class, 'index'])->name('index');
    Route::get('/assets', [AdminController::class, 'assets'])->name('assets');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/komentar', [CommentController::class, 'indexkomentar'])->name('admin.komentar');
    Route::get('/komentar/rank', [CommentController::class, 'rank'])->name('admin.komentar.rank');

    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');

    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/detail/{id}', [AdminController::class, 'detail'])->name('admin.detail');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    Route::get('/berita', [BeritaController::class, 'indexberita'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'createberita'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'storeberita'])->name('berita.store');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'editberita'])->name('berita.edit');
    Route::put('/berita/update/{id}', [BeritaController::class, 'updateberita'])->name('berita.update');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'deleteberita'])->name('berita.delete');

    Route::get('game', [GameController::class, 'indexgame'])->name('game.index');
    Route::get('game/create', [GameController::class, 'creategame'])->name('game.create');
    Route::post('game/store', [GameController::class, 'storegame'])->name('game.store');
    Route::get('game/edit/{id}', [GameController::class, 'editgame'])->name('game.edit'); 
    Route::put('game/update/{id}', [GameController::class, 'updategame'])->name('game.update');
    Route::delete('game/delete/{id}', [GameController::class, 'deletegame'])->name('game.delete');   
    
    // faq
    Route::get('faq', [FaQController::class,'indexfaq'])->name('faq.index');
    Route::get('faq/create', [FaQController::class, 'createfaq'])->name('faq.create');
    Route::post('faq/store', [FaQController::class, 'storefaq'])->name('faq.store');
    Route::get('faq/edit/{id}', [FaQController::class, 'editfaq'])->name('faq.edit'); 
    Route::put('faq/update/{id}', [FaQController::class, 'updatefaq'])->name('faq.update');
    Route::delete('faq/delete/{id}', [FaQController::class, 'deletefaq'])->name('faq.delete'); 

    // tournamnent
    Route::get('/tour', [TournamentController::class, 'indextour'])->name('tour.index');
    Route::get('/tour/detail/{id}', [TournamentController::class, 'indexdetailtour'])->name('tour.detail');
    Route::get('/tour/create', [TournamentController::class, 'createtour'])->name('tour.create');
    Route::post('/tour/store', [TournamentController::class, 'storetour'])->name('tour.store');
    Route::get('/tour/edit/{id}', [TournamentController::class, 'edittour'])->name('tour.edit');
    Route::put('/tour/update/{id}', [TournamentController::class, 'updatetour'])->name('tour.update');

    Route::delete('/tour/delete/{id}', [TournamentController::class, 'deletetour'])->name('tour.delete');
    Route::get('/tour/createfe', [TournamentController::class, 'createtourfe'])->name('createtourfe');
    Route::post('/tour/storefe', [TournamentController::class, 'storetourfe'])->name('storetourfe');

        //standing
        Route::get('/tournaments/{tournament}/standings', [StandingController::class, 'index'])->name('standing.index');
        Route::get('/tournaments/{tournament}/standings/{standing}/edit', [StandingController::class, 'edit'])->name('standing.edit');
        Route::put('/standings/{standing}', [StandingController::class, 'update'])->name('standing.update');


    Route::group(['prefix' => 'belajar'], function () {
        Route::get('/cache', [BelajarController::class, 'cache'])->name('cache');
        Route::get('/import', [BelajarController::class, 'import'])->name('import');
        Route::post('/import-proses', [BelajarController::class, 'import_proses'])->name('import-proses');
    });
});
