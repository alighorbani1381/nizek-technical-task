<?php

namespace App\Http\Requests;

use App\Repositories\StockPriceRepository;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $from
 * @property mixed $to
 */
class GetStockPriceGrowByRangeRequest extends FormRequest
{
    private string $oldestStockDate;

    public function prepareForValidation()
    {
        $stockPriceRepo = resolve(StockPriceRepository::class);

        $this->oldestStockDate = $stockPriceRepo->getOldestStock()->date;
    }

    public function rules()
    {
        return [
            'from' => ['required', 'date_format:Y-m-d', 'after_or_equal:' . $this->oldestStockDate, 'exists:stock_prices,date'],
            'to' => ['required', 'date_format:Y-m-d', 'after:from', 'before_or_equal:now', 'exists:stock_prices,date']
        ];
    }
}
