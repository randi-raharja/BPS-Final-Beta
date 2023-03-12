<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MitigasiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\VerificationController;
use App\Models\Faq;
use App\Models\Identity;
use Illuminate\Support\Facades\Route;

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
    return view('welcome', [
        $faq = Faq::all(),
        'faq' => $faq,
        $tittle = 'Home',
        'tittle' => $tittle,
        $identity = Identity::all(),
        'identity' => $identity,
    ]);
});

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('login');

    // Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

// Email Verification
Route::get('/verify', [VerificationController::class, 'verify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'emailverif'])->middleware(['auth', 'signed'])->middleware('auth')->name('verification.verify');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Dashboard');
    })->name('dashboard');
    // Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->name('users.')->prefix('users')->group(function () {
    // Role
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    // User
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
});

// Pengaduan
Route::middleware('auth')->name('pengaduan.')->prefix('pengaduan')->group(function () {
    Route::get('/', [PengaduanController::class, 'index'])->name('index');
    Route::get('/create', [PengaduanController::class, 'create'])->name('create');
    Route::post('/create', [PengaduanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PengaduanController::class, 'edit'])->name('edit');
    Route::post('/{id}', [PengaduanController::class, 'answer'])->name('answer');
    Route::get('{id}/view', [PengaduanController::class, 'view'])->name('view');
});

// Mitigasi
Route::middleware('auth')->name('mitigasi.')->prefix('mitigasi')->group(function () {
    Route::get('/', [MitigasiController::class, 'index'])->name('index');
    Route::get('/create', [MitigasiController::class, 'create'])->name('create');
    Route::post('/create', [MitigasiController::class, 'store'])->name('store');
    Route::delete('/{id}', [MitigasiController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [MitigasiController::class, 'edit'])->name('edit');
    Route::post('/{id}', [MitigasiController::class, 'update'])->name('update');
    Route::get('/verifikasi', [MitigasiController::class, 'verif_index'])->name('verif_index');
    Route::post('/verifikasi/{id}', [MitigasiController::class, 'verif'])->name('verif');
    Route::get('/{id}/print', [MitigasiController::class, 'print'])->name('print');
    Route::get('/{id}/view', [MitigasiController::class, 'view'])->name('view');
});

// IKM
Route::name('feedback.')->prefix('feedback')->group(function () {
    Route::get('/data', [FeedbackController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/', [FeedbackController::class, 'form'])->name('form');
    Route::post('/', [FeedbackController::class, 'store'])->name('store');
    Route::get('/data/export', [FeedbackController::class, 'export'])->name('export');
});

Route::get('/image/ttd/{id}', [ImageController::class, 'userttd'])->name('userttd');

Route::middleware('auth')->name('profile.')->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/{id}/update', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProfileController::class, 'update'])->name('update');
});
