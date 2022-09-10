<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ReadXlsxFile
{
    public static function getDataByRange($filePath, $sheetNumber, $range)
    {
        $reader = new Xlsx();
        $workbook = $reader->load($filePath);

        return $workbook->getSheet($sheetNumber)
            ->rangeToArray($range, null, false, false);
    }
}
