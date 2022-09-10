<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\StockPriceStatisticController;

# Statistic Routes
Route::group(['prefix' => 'stockPrice/statistic'], function () {
    Route::get('period', [StockPriceStatisticController::class, 'getStatisticByTimePeriod'])->name('statistic.period');
    Route::get('range', [StockPriceStatisticController::class, 'getStatisticByCustomRange'])->name('statistic.customRange');
});
