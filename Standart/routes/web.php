<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{

    LoginController,
    DashboardController,
    WargaController,
    AuthController,
    PendaftarController,
    ProfileController,
    SantriController,
};
use App\Models\Pendaftar;
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
// Test database connection
// try {
//     DB::connection()->getDatabaseName();
//     die("Iso");
// } catch (\Exception $e) {
//     die("Could not connect to the database.  Please check your configuration. error:" . $e );
// }

Route::get('/', function () {
    // return view('welcome');
    return view('login.login');
})->name('login');
Route::get('/login', function () {
    // return view('welcome');
    return view('login.login');
})->name('halaman.login');

Route::get('/change_password', [AuthController::class, 'change_password']);
Route::post('/change_password', [AuthController::class, 'proses_change_password']);
Route::get('/lupa_password', [AuthController::class, 'lupa_password']);
Route::post('/lupa_password', [AuthController::class, 'proses_lupa_password']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'proses_register']);
Route::post('/login', [AuthController::class, 'proses_login']);
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/qonun', [DashboardController::class, 'qonun']);
        Route::get('/formulir', [DashboardController::class, 'formulir']);
        Route::get('/formulir_kedua', [DashboardController::class, 'formulir_kedua']);
        Route::post('/formulir', [PendaftarController::class, 'proses_update']);
        Route::post('/formulir_kedua', [PendaftarController::class, 'proses_update_kedua']);
        Route::get('/download', [DashboardController::class, 'download']);
        Route::get('/downloadberkas', [DashboardController::class, 'downloadberkas']);
        Route::get('/kabupaten/{id}', [DashboardController::class, 'getKabupaten']);
        Route::get('/kecamatan/{id}', [DashboardController::class, 'getKecamatan']);
        Route::get('/kelurahan/{id}', [DashboardController::class, 'getKelurahan']);
    });

    Route::group(['prefix' => 'santri'], function () {
        Route::get('/', [SantriController::class, 'index']);
        // Route::get('/tidak_aktif', [SantriController::class, 'tidak_aktif']);
        // Route::get('/{id}/detail', [SantriController::class, 'detail']);
        // Route::get('/{id}/ubah_status', [SantriController::class, 'ubah_status']);
        // Route::get('/downloadexcel', [SantriController::class, 'downloadexcel']);
    });
    Route::group(['prefix' => 'pendaftar'], function () {
        Route::get('/', [PendaftarController::class, 'index']);
        Route::get('/tambah', [PendaftarController::class, 'tambah']);
        Route::get('/downloadexcel', [PendaftarController::class, 'downloadexcel']);
        Route::get('/{id}/proses_setelah_sowan', [PendaftarController::class, 'proses_setelah_sowan']);
        Route::post('/tambah', [PendaftarController::class, 'store']);
        Route::get('/{id}/delete', [PendaftarController::class, 'delete'])->name('pendaftar.delete');
        Route::get('/{id}/edit', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
        Route::post('/{id}/edit', [PendaftarController::class, 'proses_update'])->name('pendaftar.update');
        Route::get('/{id}/detail', [PendaftarController::class, 'detail']);
    });
    Route::group(['prefix' => 'asrama'], function () {
        Route::get('/', [AsramaController::class, 'index'])->name('asrama.list');
        Route::get('/tambah', [AsramaController::class, 'tambah'])->name('asrama.tambah');
        Route::post('/', [AsramaController::class, 'store'])->name('asrama.store');
        Route::get('/{id}/delete', [AsramaController::class, 'delete'])->name('asrama.delete');
        Route::get('/{id}/edit', [AsramaController::class, 'edit'])->name('asrama.edit');
        Route::post('/{id}/edit', [AsramaController::class, 'proses_update'])->name('asrama.update');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.list');
        Route::get('/data', [ProfileController::class, 'data'])->name('profile.data');
        Route::post('/ubah_password', [ProfileController::class, 'ubah_password'])->name('profile.ubah_password');
        Route::post('/edit_profile', [ProfileController::class, 'edit_profile'])->name('profile.edit_profile');
    });
});
