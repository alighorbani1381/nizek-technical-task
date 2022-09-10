<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Services\ReadXlsxFile;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Repositories\StockPriceRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StockImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const FIRST_SHEET_INDEX = 0;
    const DATE_INDEX = 0;
    const STOCK_PRICE_INDEX = 1;
    const CONNECT_DB_THEN_INSERT_COUNT = 1000;

    private string $filePath;
    private string $range;

    public function __construct($filePath, $coordinateOfRange)
    {
        $this->filePath = $filePath;
        $this->range = $coordinateOfRange;
    }

    public function handle()
    {
        // we can use the coordinate in Excel file to fetch data
        $dateRows = ReadXlsxFile::getDataByRange($this->filePath, self::FIRST_SHEET_INDEX, $this->range);

        $stockPrices = [];
        $captureItemCounts = 0;

        foreach ($dateRows as $dataRow) {

            $date = date('Y-m-d', Date::excelToTimestamp($dataRow[self::DATE_INDEX]));
            $stockPrice = $dataRow[self::STOCK_PRICE_INDEX];
            $stockPrices[] = ['date' => $date, 'price' => $stockPrice];

            $captureItemCounts++;

            // inserting in an optimized way into database each connection database insert 1000 of record
            // sql has a limitation for insert, that's limited by some config,
            // but we don't know how much powerful, for this reason we insert data chunk by chunk (first 1000, second 1000)
            // we use the bulk write (several insert with one command/query)
            if ($captureItemCounts != self::CONNECT_DB_THEN_INSERT_COUNT) {
                continue;
            }

            StockPriceRepository::createStockPrice($stockPrices);
            $stockPrices = [];
            $captureItemCounts = 0;
        }

        // check if exists some items less than 1000 insert with last insert command
        if (count($stockPrices) != 0)
            StockPriceRepository::createStockPrice($stockPrices);

        // remove file and free storage
        if (env('APP_ENV') != 'testing')
            unlink($this->filePath);
    }
}
