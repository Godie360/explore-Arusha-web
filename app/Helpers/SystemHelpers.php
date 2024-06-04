<?php

use App\Enums\CalculationTypeEnum;
use App\Enums\RiskTypeEnum;
use App\Models\ClaimNotification;
use App\Models\Quotation;
use App\Models\SubjectMatter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Carbon\Carbon;

if (!function_exists('dateFormat')) {
    function dateFormat($date, $f = 'd/m/Y')
    {
        return (new Carbon($date))->format($f);
    }
}
if (!function_exists('formatMoney')) {
    function formatMoney($amount, $currencySymbol = 'TZS')
    {
        $formattedAmount = number_format($amount, 2, '.', ',');

        return $currencySymbol . ' ' . $formattedAmount;
    }
}
if (!function_exists('generateRandomUniqueNumber')) {
    function generateRandomUniqueNumber($modelClass, $columnName)
    {
        do {
            // Generate a random unique number
            $random1 = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $random2 = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $random = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $randomUniqueNumber =  $random  . '-' .  $random1  . '-' .  $random2;
            // Check if the generated number already exists in the database
            $exists = $modelClass::where($columnName, $randomUniqueNumber)->exists();
        } while ($exists);
        return $randomUniqueNumber;
    }
}

if (!function_exists('remove_special_characters')) {
    function  remove_special_characters($string)
    {
        return strtoupper(preg_replace('/[^A-Za-z0-9]/', '', trim($string)));
    }
}

if (!function_exists('random_color')) {
    function random_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
if (!function_exists('region_excel_to_array')) {
    function region_excel_to_array($filePath)
    {
        $objReader = IOFactory::createReaderForFile($filePath);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filePath);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();

        $data = [];
        $currentRegionCode = '';
        $currentRegionName = '';
        $currentDistricts = [];

        for ($row = 2; $row <= $highestRow; $row++) {
            $regionCode = $objWorksheet->getCell('A' . $row)->getValue();
            $regionName = $objWorksheet->getCell('B' . $row)->getValue();
            $districtCode = $objWorksheet->getCell('C' . $row)->getValue();
            $districtName = $objWorksheet->getCell('D' . $row)->getValue();

            // Check if the region code cell is empty
            if ($regionCode != '') {
                // If not empty, update current region and add previous data to result array
                if (!empty($currentRegionCode)) {
                    $data[] = [
                        'region_code' => $currentRegionCode,
                        'region_name' => $currentRegionName,
                        'districts' => $currentDistricts,
                    ];
                }
                // Update current region code and region name, and reset current districts
                $currentRegionCode = $regionCode;
                $currentRegionName = $regionName;
                $currentDistricts = [];
            }

            // Add district and district2 to current districts
            $currentDistricts[] = [
                'district_code' => $districtCode,
                'district_name' => $districtName,
            ];
        }

        // Add last region to result array
        if (!empty($currentRegionCode)) {
            $data[] = [
                'region_code' => $currentRegionCode,
                'region_name' => $currentRegionName,
                'districts' => $currentDistricts,
            ];
        }

        return $data;
    }
}

if (!function_exists('excel_to_array')) {
    function excel_to_array($filePath, $header = true)
    {
        $objReader = IOFactory::createReaderForFile($filePath);

        // Set read type to read cell data only
        $objReader->setReadDataOnly(true);

        // Load $inputFileName to a PHPExcel Object
        $objPHPExcel = $objReader->load($filePath);

        // Get worksheet and build array with first row as header
        $objWorksheet = $objPHPExcel->getActiveSheet();

        // Excel with first row header, use header as key
        if ($header) {
            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
            $headingsArray = $headingsArray[1];

            $namedDataArray = [];
            for ($row = 2; $row <= $highestRow; ++$row) {
                $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                if (isset($dataRow[$row]['A']) && $dataRow[$row]['A'] > '') {
                    $rowData = [];
                    foreach ($headingsArray as $columnKey => $columnHeading) {
                        $rowData[$columnHeading] = $dataRow[$row][$columnKey];
                    }
                    $namedDataArray[] = $rowData;
                }
            }
        } else {
            // Excel sheet with no header
            $namedDataArray = $objWorksheet->toArray(null, true, true, true);
        }

        return $namedDataArray;
    }
}
if (!function_exists('clear')) {
    function  clear($string)
    {
        return strtoupper(preg_replace('/[^A-Za-z0-9]/', '', trim($string)));
    }
}
if (!function_exists('isMergedCell')) {
    function  isMergedCell($worksheet, $column, $row)
    {
        $mergedCells = $worksheet->getMergeCells();
        foreach ($mergedCells as $mergedCell) {
            if ($worksheet->isRangePartOfMerge($mergedCell, $column . $row)) {
                return true;
            }
        }
        return false;
    }

}
