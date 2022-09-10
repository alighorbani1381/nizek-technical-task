<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\StockPrice;
use App\Services\StockPriceHelper;

class StockPriceRepository
{
    public static function createStockPrice($stockPrices)
    {
        return StockPrice::query()->insert($stockPrices);
    }

    public function getGrowPercentageByCustomPeriod($period): float|int
    {
        $newStock = $this->getNewestStock();
        $oldStock = $this->getOldStockByPeriod($period, $newStock->date);
        return StockPriceHelper::calculateGrowPercentage($newStock->price, $oldStock->price);
    }

    public function getGrowPercentageByRange($from, $to): float|int
    {
        $oldStock = $this->getStockPriceByDate($from);
        $newStock = $this->getStockPriceByDate($to);
        return StockPriceHelper::calculateGrowPercentage($newStock->price, $oldStock->price);
    }

    private function getStockPriceByDate($date)
    {
        return StockPrice::query()->where('date', $date)->first();
    }

    private function getOldStockByPeriod($period, $newStockDate)
    {
        if ($period == 'MAX')
            return $this->getOldestStock();

        if ($period == 'TYD')
            return $this->getOldestStockInYearByDate($newStockDate);

        return $this->getStockByFrequentlyPeriod($newStockDate, $period);
    }

    private function getNewestStock()
    {
        return StockPrice::query()->orderBy('date', 'desc')->first();
    }

    public function getOldestStock()
    {
        return StockPrice::query()->orderBy('date')->first();
    }

    private function getOldestStockInYearByDate($newStockDate)
    {
        return StockPrice::query()
            ->whereYear('date', Carbon::parse($newStockDate)->year)
            ->orderBy('date')
            ->first();
    }

    private function getStockByFrequentlyPeriod($newStockDate, $period)
    {
        $targetDate = StockPriceHelper::getDateByPeriodString($newStockDate, $period);

        $oldStock = $this->getStockPriceByDate($targetDate);

        // sure old stock founded in the specific period!
        // if not found try to find the nearest date before the period that we want
        if (is_null($oldStock)) {
            $oldStock = StockPrice::query()->where('date', '<', $targetDate)->orderBy('date', 'desc')->first();
        }

        return $oldStock;
    }

    public static function getStockPriceCounts()
    {
        return StockPrice::query()->count();
    }
}
