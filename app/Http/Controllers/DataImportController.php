<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\StockImportJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Repositories\StockPriceRepository;
use App\Http\Requests\UploadExcelFileRequest;

class DataImportController
{
    public function showUploadDataPage()
    {
        $stockPriceCounts = StockPriceRepository::getStockPriceCounts();

        return view('upload-data', compact('stockPriceCounts'));
    }

    public function importDataByExcel(UploadExcelFileRequest $request): RedirectResponse
    {
        $filePath = $this->uploadFileIntoStorage($request);

        // it will be got from request and or calculate automatically but for this test scenario I hard coded here!
        $rangeCoordinate = 'A10:B3513';

        StockImportJob::dispatch($filePath, $rangeCoordinate);

        Session::flash('file-uploaded');
        return back();
    }

    private function uploadFileIntoStorage(Request $request): string
    {
        $uploadedFile = $request->file('file');
        $filename = Str::random() . time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(storage_path('app/files/'), $filename);
        return storage_path('app/files/' . $filename);
    }
}
