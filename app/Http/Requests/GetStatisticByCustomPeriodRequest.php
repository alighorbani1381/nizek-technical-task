<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Services\StockPriceHelper;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $period
 */
class GetStatisticByCustomPeriodRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'period' => strtoupper($this->period ?? '')
        ]);
    }

    public function rules()
    {
        return [
            'period' => ['required', Rule::in(StockPriceHelper::getTextPeriodAsArray())]
        ];
    }
}
