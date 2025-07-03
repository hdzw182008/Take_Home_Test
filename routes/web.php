<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MixedController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CertainController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrescriptionController;
use App\Models\MixedMedicine;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/proses', [LoginController::class,'login_proses'])->name('loginProses');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', [PrescriptionController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('/pasien',PatientController::class);
    Route::resource('/dokter',DoctorController::class);
    Route::resource('/obat',MedicineController::class);
    Route::resource('/obatRacik',MixedController::class);
    Route::resource('/certain',CertainController::class);
    Route::delete('/obatRacik/{id}/hapus',[MixedController::class,'hapus']);
    Route::post('/obatRacik/create/edit',[MixedController::class,'addEdit']);
    
    Route::resource('/resep', PrescriptionController::class);
    Route::get('/racikanBaru', [PrescriptionController::class,'racikanBaru']);
    Route::post('/racikanBaru/create', [PrescriptionController::class,'racikanBaruSimpan']);
    Route::post('/obatBaru', [PrescriptionController::class, 'obatBaru']);
    
    Route::post('/certainObat/create', [PrescriptionController::class, 'addCertain']);
    
    Route::post('/prescription/create', [PrescriptionController::class, 'addMedic']);
    Route::post('/prescriptionMix/create', [PrescriptionController::class, 'addMedicMix']);

    Route::get('/cetak', [MixedController::class, 'cetak']);
});