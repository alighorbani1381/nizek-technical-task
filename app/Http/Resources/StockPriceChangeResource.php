<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockPriceChangeResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'success' => true,
            'title' => $this->resource['title'],
            'result' => [
                'growPercentage' => $this->resource['growPercentage']
            ]
        ];
    }
}
