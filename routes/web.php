<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataImportController;

Route::get('/', function () {
    return view('welcome');
});

# Upload Routes
Route::group(['prefix' => 'stockPrice/upload'], function () {
    Route::post('file', [DataImportController::class, 'importDataByExcel'])->name('import.excelFile');
    Route::get('/', [DataImportController::class, 'showUploadDataPage'])->name('upload.page');
});
