<?php

namespace App\Http\Controllers;

use App\Repositories\StockPriceRepository;
use App\Http\Resources\StockPriceChangeResource;
use App\Http\Requests\GetStockPriceGrowByRangeRequest;
use App\Http\Requests\GetStatisticByCustomPeriodRequest;

class StockPriceStatisticController
{
    private StockPriceRepository $stockPriceRepo;

    public function __construct(StockPriceRepository $stockPriceRepo)
    {
        $this->stockPriceRepo = $stockPriceRepo;
    }

    public function getStatisticByTimePeriod(GetStatisticByCustomPeriodRequest $request): StockPriceChangeResource
    {
        $growPercentage = $this->stockPriceRepo->getGrowPercentageByCustomPeriod($request->period);

        $titleResponse = sprintf("Grow Percentage of %s Period Calculated Successfully!", $request->period);

        return $this->sendGrowPercentageResponse($titleResponse, $growPercentage);
    }

    public function getStatisticByCustomRange(GetStockPriceGrowByRangeRequest $request): StockPriceChangeResource
    {
        $growPercentage = $this->stockPriceRepo->getGrowPercentageByRange($request->from, $request->to);

        $titleResponse = 'Grow Percentage of Range Calculated Successfully!';

        return $this->sendGrowPercentageResponse($titleResponse, $growPercentage);
    }

    private function sendGrowPercentageResponse(string $titleResponse, float|int $growPercentage): StockPriceChangeResource
    {
        return new StockPriceChangeResource([
            'title' => $titleResponse,
            'growPercentage' => $growPercentage
        ]);
    }
}
