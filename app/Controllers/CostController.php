<?php

namespace App\Controllers;

use App\Models\CostModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;

class CostController extends BaseController
{
    protected $costModel;
    public function __construct()
    {
        $this->costModel = new CostModel();
    }
    public function index()
    {
        $dataCost = $this->costModel->findAll();
        $data = [
            'dataCost'     => $dataCost
        ];

        return view('finance/cost', $data);
    }
    public function printAllCost()
    {
        $dataCost = $this->costModel->findAll();
        $data = [
            'dataCost'  => $dataCost
        ];
        return view('finance/costFolder/costPrint', $data);
    }
    public function printFilterCost()
    {
        $dateStart = $this->request->getVar('start_date');
        $dateEnd = $this->request->getVar('end_date');

        $dataFilter = $this->costModel->getFilterCost($dateStart, $dateEnd)->getResultArray();
        $data = [
            'dataFilter'    => $dataFilter
        ];
        return view('finance/costFolder/printFilter', $data);
    }
    public function excelCost()
    {
        $dataCost = $this->costModel->findAll();
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Waktu')
            ->setCellValue('B1', 'Berita Acara')
            ->setCellValue('C1', 'Nominal');

        $column = 2;
        foreach ($dataCost as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $value['cost_time'])
                ->setCellValue('B' . $column, $value['berita_acara'])
                ->setCellValue('C' . $column, $value['nominal_cost']);

            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Cost';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function excelCostFilter()
    {
        $dateStart = $this->request->getVar('start_date');
        $dateEnd = $this->request->getVar('end_date');
        $dataCost = $this->costModel->getFilterLaba($dateStart, $dateEnd)->getResultArray();
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Waktu')
            ->setCellValue('B1', 'Berita Acara')
            ->setCellValue('C1', 'Nominal');

        $column = 2;
        foreach ($dataCost as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $value['cost_time'])
                ->setCellValue('B' . $column, $value['berita_acara'])
                ->setCellValue('C' . $column, $value['nominal_cost']);

            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Cost';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
