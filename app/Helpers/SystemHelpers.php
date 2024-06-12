<?php

use App\Enums\CalculationTypeEnum;
use App\Enums\RiskTypeEnum;
use App\Models\ClaimNotification;
use App\Models\Quotation;
use App\Models\Setting\FileModel;
use App\Models\SubjectMatter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
if (!function_exists('remove_space')) {
    function  remove_space($string)
    {
        return str_replace(' ', '', $string);
    }
}
if (!function_exists('isLocalhost')) {
    function  isLocalhost()
    {
        $whitelist = array('127.0.0.1', "::1");
        if (!in_array($_SERVER['REMOTE_ADDR'] ?? "::1", $whitelist)) {
            return false;
        } else {
            return true;
        }
    }
}
if (!function_exists('fitSizes')) {
    function fitSizes($fit, $width = null)
    {
        list($ratio, $size) = explode(":", $fit);
        list($w, $h) = explode("*", $ratio);
        $width = is_numeric($size) ? $size : $width;
        $width = is_numeric($width) ? $width : 200;
        $w = is_numeric($w) ? $w : 1;
        $h = is_numeric($h) ? $h : 1;
        $height = intval(ceil(($h / $w) * $width));
        return [$width, $height];
    }
}
if (!function_exists('arraySizes')) {
    function  arraySizes($imgFile)
    {
        $height = $imgFile->height();
        $width = $imgFile->width();
        if ($height <= 800) {
            $resize_height = $height * 0.9;
            $resize_width = $width * 0.9;
        } elseif ($height > 800 && $height <= 1200) {
            $resize_height = $height * 0.8;
            $resize_width = $width * 0.8;
        } elseif ($height > 1200 && $height <= 1800) {
            $resize_height = $height * 0.5;
            $resize_width = $width * 0.5;
        } elseif ($height > 1800 && $height <= 2400) {
            $resize_height = $height * 0.4;
            $resize_width = $width * 0.4;
        } elseif ($height > 2400 && $height <= 2800) {
            $resize_height = $height * 0.35;
            $resize_width = $width * 0.35;
        } elseif ($height > 2800 && $height <= 4800) {
            $resize_height = $height * 0.25;
            $resize_width = $width * 0.25;
        } else {
            $resize_height = $height * 0.25;
            $resize_width = $width * 0.25;
        }
        return [$resize_height, $resize_width];
    }
}

if (!function_exists('upload_file')) {
    function  upload_file($file, $path = "images", $water = false, $fit = false)
    {
        if (isLocalhost()) {
            $path =   "local/" .  Str::slug(config('app.name')) . '/'  . $path;
        } else {
            $path  = Str::slug(config('app.name')) . '/'  . $path;
        }


        if (request()->has("base64")) {
            if (request()->has($file)) {
                $files = request()->input($file);
                $i = 0;
                $fileName = [];
                if (is_array($files)) {
                    foreach ($files as $file) {
                        $file_ = remove_space(time() . $i . ".webp");
                        $imgFile = Image::make($file);
                        list($resize_height, $resize_width) = arraySizes($imgFile);

                        $aws =  $imgFile->resize($resize_width, $resize_height, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path($path . "/" . $file_));
                        if ($water) {
                            $watermarksSrc =  Image::make(public_path('front_end/images/watermark.png'));
                            $watermarksWidth = round(30 * $resize_width / 100);
                            $watermarksSrc->resize($watermarksWidth, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $aws->insert($watermarksSrc, 'center', 0, 0);
                        }
                        Storage::disk('s3')->put($path . "/" . $file_, $aws->stream(), 'public');
                        $aws = $path . "/" . $file_;
                        File::delete($aws);
                        $fileName[] = Storage::disk('s3')->url($aws);
                        $i++;
                        // }
                    }
                } else {
                    $file_ = remove_space(time() . $i . ".webp");
                    try {
                        $imgFile = Image::make($files);
                        list($resize_height, $resize_width) = arraySizes($imgFile);
                        $aws =  $imgFile->resize($resize_width, $resize_height, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path($path . "/" . $file_));
                        if ($water) {
                            $watermarksSrc =  Image::make(public_path('front_end/images/watermark.png'));
                            $watermarksWidth = round(30 * $resize_width / 100);
                            $watermarksSrc->resize($watermarksWidth, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $aws->insert($watermarksSrc, 'center', 0, 0);
                        }
                        Storage::disk('s3')->put($path . "/" . $file_, $aws->stream(), 'public');
                        $aws = $path . "/" . $file_;
                        File::delete($aws);
                        $fileName = Storage::disk('s3')->url($aws);
                    } catch (Exception $e) {
                        $fileName = null;
                    }
                }
                return $fileName;
            }
            return null;
        }
        if (request()->file($file)) {
            if (is_array(request()->file($file))) {
                $i = 0;
                $fileName = [];
                foreach (request()->file($file) as $singleFile) {
                    $originalFileName = $singleFile->getClientOriginalName();
                    $originalFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . ".webp";
                    $file_ = remove_space(time() . $i . '_' . $originalFileName);
                    if ($water) {
                        $imgFile = Image::make($singleFile->getRealPath());
                        list($resize_height, $resize_width) = arraySizes($imgFile);

                        $aws =  $imgFile->resize($resize_width, $resize_height, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path($path . "/" . $file_));
                        if ($water) {
                            $watermarksSrc =  Image::make(public_path('front_end/images/watermark.png'));
                            $watermarksWidth = round(30 * $resize_width / 100);
                            $watermarksSrc->resize($watermarksWidth, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $aws->insert($watermarksSrc, 'center', 0, 0);
                        }
                        Storage::disk('s3')->put($path . "/" . $file_, $aws->stream(), 'public');
                        $aws = $path . "/" . $file_;
                        File::delete($aws);
                    } else {
                        $aws =  $singleFile->storeAs($path, $file_, 's3');
                        Storage::disk('s3')->setVisibility($aws, 'public');
                    }
                    $fileName[] = Storage::disk('s3')->url($aws);
                    $i++;
                }
                return $fileName;
            } else {
                $originalFileName = request()->file($file)->getClientOriginalName();
                $originalFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . ".webp";
                $file_ = remove_space(time() . '_' . $originalFileName);
                $imgFile = Image::make(request()->file($file)->getRealPath());


                list($resize_height, $resize_width) = arraySizes($imgFile);
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0755, true);
                }
                $aws =  $imgFile->resize($resize_width, $resize_height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($path . "/" . $file_));

                if ($fit) {
                    list($width, $height) = fitSizes($fit, $resize_width);
                    $aws->fit($width, $height);
                }


                Storage::disk('s3')->put($path . "/" . $file_, $aws->stream(), 'public');
                $aws = $path . "/" . $file_;
                File::delete($aws);
                return Storage::disk('s3')->url($aws);
            }
        }
        return null;

        // list($a, $b, $c) = $my_array;
    }
}

if (!function_exists('patchFile')) {
    function  patchFile($collection, $collectionType, $id = "id", $update = false, $inputName = "attachment", $water = false)
    {

        if ($collection) {
            $files = upload_file($inputName, 'images', $water);
            if ($update && count($files ?? [])) {
                FileModel::where([
                    'filed_type' => $collectionType,
                    'filed_id' => $collection->$id ?? null,
                ])->delete();
            }
            foreach ($files ?? [] as $file) {
                if ($file) {
                    FileModel::create([
                        'filable_type' => $collectionType,
                        'filable_id' => $collection->$id ?? null,
                        'file' => $file,
                        "user_id" => auth()->id()
                    ]);
                }
            }
        }
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
