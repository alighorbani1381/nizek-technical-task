<?php

namespace App\Services;

use Carbon\Carbon;

final class StockPriceHelper
{
    public static function calculateGrowPercentage($newStockPrice, $oldStockPrice): float
    {
        $changePercentage = ($newStockPrice / $oldStockPrice - 1) * 100;

        return round($changePercentage, 2);
    }

    public static function getDateByPeriodString($date, $period)
    {
        [$subDateMethod, $parameter] = match ($period) {
            '1D' => ['subDay', null],
            '1M' => ['subMonth', null],
            '3M' => ['subMonth', 3],
            '6M' => ['subMonth', 6],
            '1Y' => ['subYear', null],
            '3Y' => ['subYears', 3],
            '5Y' => ['subYears', 5],
            '10Y' => ['subYears', 10],
            default => throw new \Exception('invalid period passed!')
        };

        $date = Carbon::parse($date);

        return $parameter ? $date->$subDateMethod($parameter)->toDateString() : $date->$subDateMethod()->toDateString();
    }

    public static function getTextPeriodAsArray(): array
    {
        return ['1D', '1M', '3M', '6M', '1Y', '3Y', '5Y', '10Y', 'TYD', 'MAX'];
    }
}
