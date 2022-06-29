<?php

namespace App\Controllers;

use App\Models\CostModel;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $modelCost;
    public function __construct()
    {
        $this->modelCost = new CostModel();
    }
    public function index()
    {

        return view('dashboard/index');
    }
    public function getDataReport()
    {
        $year = '2022';
        $totaldata = $this->modelCost->db->query("SELECT
                SUM(CASE When MONTH(cost_time)='1' Then nominal_cost Else 0 End ) as jan,
                SUM(CASE When MONTH(cost_time)='2' Then nominal_cost Else 0 End ) as feb,
                SUM(CASE When MONTH(cost_time)='6' Then nominal_cost Else 0 End ) as jun
                FROM cost where YEAR(cost_time)='$year' ")->getRow();

        $data_arr = array(
            'label' => ['Jan ', 'Feb ', 'Maret ', 'April ', 'Mei ', 'Juni ', 'Juli ', 'Agust ', 'Sept ', 'Okt ', 'Nov ', 'Des '],
            'penjualan' => [$totaldata->jan, $totaldata->feb, 414, 671, 227, $totaldata->jun, 201, 352, 752, 320, 257, 160],
            'tahun' => '2020',
            'totaldata' => $totaldata
        );
        echo json_encode($data_arr);
    }
}
