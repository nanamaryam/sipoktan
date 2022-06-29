<?php

namespace App\Controllers;

use App\Models\LabaModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;

class LabaController extends BaseController
{
    protected $labaModel;
    public function __construct()
    {
        $this->labaModel = new LabaModel();
    }
    public function index()
    {
        $dataLaba = $this->labaModel->findAll();
        $data = [
            'dataLaba'  => $dataLaba
        ];
        return view('finance/laba', $data);
    }
    public function printAllLaba()
    {
        $dataLaba = $this->labaModel->findAll();
        $data = [
            'dataLaba'  => $dataLaba
        ];
        return view('finance/labaFolder/labaPrint', $data);
    }
    public function printFilterLaba()
    {
        $dateStart = $this->request->getVar('start_date');
        $dateEnd = $this->request->getVar('end_date');

        $dataFilter = $this->labaModel->getFilterLaba($dateStart, $dateEnd)->getResultArray();
        $data = [
            'dataFilter'    => $dataFilter
        ];
        return view('finance/labaFolder/printFilter', $data);
    }
    public function excelLaba()
    {
        $dataLaba = $this->labaModel->findAll();
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Waktu')
            ->setCellValue('B1', 'Berita Acara')
            ->setCellValue('C1', 'Nominal');

        $column = 2;
        foreach ($dataLaba as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $value['laba_time'])
                ->setCellValue('B' . $column, $value['acara_berita'])
                ->setCellValue('C' . $column, $value['nominal']);

            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Laba';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function excelLabaFilter()
    {
        $dateStart = $this->request->getVar('start_date');
        $dateEnd = $this->request->getVar('end_date');
        $dataLaba = $this->labaModel->getFilterLaba($dateStart, $dateEnd)->getResultArray();
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Waktu')
            ->setCellValue('B1', 'Berita Acara')
            ->setCellValue('C1', 'Nominal');

        $column = 2;
        foreach ($dataLaba as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $value['laba_time'])
                ->setCellValue('B' . $column, $value['acara_berita'])
                ->setCellValue('C' . $column, $value['nominal']);

            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Laba';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
