<?php

use Illuminate\Support\Facades\Route;

// Admin Controller
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;




// Peserta Controller
use App\Http\Controllers\Peserta\DashboardController as PesertaDashboardController;
use App\Http\Controllers\PesertaAuthController;
use App\Http\Controllers\PendaftaranController;

// Manajer Controller
use App\Http\Controllers\Manajer\DashboardController as ManajerDashboardController;
//login
use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\Admin\DepartemenController;

use App\Http\Controllers\Manajer\AuthController as ManajerAuthController;





Route::get('/', function () {
    return view('welcome');
});


// ================= ADMIN =================

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

});

Route::post(
    '/admin/pendaftar/tolak/{id}',
    [AdminDashboardController::class, 'tolak']
);
Route::post(
    '/admin/pendaftar/terima/{id}',
    [AdminDashboardController::class, 'terima']
);
Route::get(
    '/admin/pendaftar/detail/{id}',
    [AdminDashboardController::class, 'detailPendaftar']
);
Route::post(
    '/admin/pendaftar/hapus/{id}',
    [AdminDashboardController::class, 'hapus']
);
Route::get(
    '/admin/pendaftar/terima/{id}',
    [AdminDashboardController::class, 'showTerima']
);

Route::post(
    '/admin/pendaftar/terima/{id}',
    [AdminDashboardController::class, 'prosesTerima']
);
Route::get(
    '/admin/peserta',
    [AdminDashboardController::class, 'peserta']
);

Route::get(
    '/admin/peserta/edit/{id}',
    [AdminDashboardController::class, 'editPeserta']
);

Route::post(
    '/admin/peserta/update/{id}',
    [AdminDashboardController::class, 'updatePeserta']
);
Route::post(
    '/admin/peserta/selesai/{id}',
    [AdminDashboardController::class, 'selesaiMagang']
);
Route::get(
    '/admin/histori-peserta',
    [AdminDashboardController::class, 'historiPeserta']
);
Route::get(
    '/admin/histori-peserta',
    [AdminDashboardController::class, 'historiPeserta']
);
Route::get(
    '/admin/histori-pendaftar',
    [AdminDashboardController::class, 'historiPendaftar']
);
Route::post(
    '/admin/peserta/tolak/{id}',
    [AdminDashboardController::class, 'tolakPeserta']
);  

// ================= PESERTA =================

Route::prefix('peserta')->group(function () {

    Route::get('/dashboard', [PesertaDashboardController::class, 'index']);

});



// ================= MANAJER =================

Route::prefix('manajer')->group(function () {

    Route::get('/dashboard', [ManajerDashboardController::class, 'index']);

});

                    //LOGIN//

Route::get('/admin/login', [AuthController::class, 'showLogin']);
Route::post('/admin/login', [AuthController::class, 'login']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::prefix('peserta')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('peserta.login');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('peserta.register');

});
Route::get('/peserta/home', function () {
    return view('peserta.home');
});
Route::get('/peserta/departemen', function () {
    return view('peserta.departemen');
});
Route::get('/peserta/pendaftaran', function () {
    return view('peserta.pendaftaran');
});


Route::get('/admin/departemen', [DepartemenController::class, 'index']);



Route::get('/manajer/login', [ManajerAuthController::class, 'showLogin']);

Route::post('/manajer/login', [ManajerAuthController::class, 'login']);

Route::get('/manajer/dashboard', function () {
    return view('manajer.dashboard');
});

Route::get('/manajer/penilaian', function () {
    return view('manajer.penilaian');
});
Route::get('/manajer/accounting', function () {
    return view('manajer.accounting');
});
Route::get('/manajer/fbp', function () {
    return view('manajer.fbp');
});
Route::get('/manajer/engineering', function () {
    return view('manajer.engineering');
});
Route::get('/manajer/fbs', function () {
    return view('manajer.fbs');
});
Route::get('/manajer/fo', function () {
    return view('manajer.fo');
});
Route::get('/manajer/hk', function () {
    return view('manajer.hk');
});
Route::get('/manajer/sm', function () {
    return view('manajer.sm');
});

Route::get('/admin/departemen', [DepartemenController::class, 'index']);

// Admin
Route::get('/admin/departemen', [DepartemenController::class, 'index']);
Route::get(
    '/admin/pendaftar',
    [AdminDashboardController::class, 'pendaftar']
);

Route::post('/peserta/pendaftaran', [PendaftaranController::class, 'store']);   

// Peserta
Route::get('/peserta/departemen', [DepartemenController::class, 'pesertaDepartemen']);
Route::get('/admin/departemen', [DepartemenController::class, 'index']);

Route::post('/admin/departemen/update/{id}', [DepartemenController::class, 'update']);

Route::get('/peserta/departemen', [DepartemenController::class, 'pesertaDepartemen']);

//login peserta//
Route::get('/peserta/login', [PesertaAuthController::class, 'showLogin']);
Route::post('/peserta/login', [PesertaAuthController::class, 'login']);

Route::get('/peserta/signup', [PesertaAuthController::class, 'showSignup'])
    ->name('peserta.signup');

Route::post('/peserta/signup', [PesertaAuthController::class, 'signup']);

Route::get('/peserta/fp', [PesertaAuthController::class, 'showFp'])
    ->name('peserta.fp');

Route::get('/peserta/logout', [PesertaAuthController::class, 'logout']);

Route::get('/peserta/profile', [PesertaAuthController::class, 'profile']);
Route::post(
    '/peserta/pendaftaran',
    [PendaftaranController::class, 'store']
);
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store']);

