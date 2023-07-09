<?php

namespace App\Controllers;

use App\Models\CostModel;

use App\Models\LabaModel;

use App\Models\PanenModel;

use App\Models\MasukModel;

use App\Models\PenggunaModel;

use App\Models\KeluarModel;

use App\Models\SalaryModel;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $modelCost;
    protected $modelLaba;
    protected $modelPanen;
    protected $modelMasuk;
    protected $modelKeluar;
    protected $penggunaModel;
    protected $salaryModel;
    public function __construct()
    {
        $this->modelCost = new CostModel();
        $this->modelLaba = new LabaModel();
        $this->modelPanen = new PanenModel();
        $this->modelMasuk = new MasukModel();
        $this->modelKeluar = new KeluarModel();
        $this->penggunaModel = new PenggunaModel();
        $this->salaryModel = new SalaryModel();
    }
    public function index()
    {
        $totalMasuk = $this->modelMasuk->getCountDashboard()->nominal;
        $totalUnitKeluar = $this->modelKeluar->getCountDashboard()->unit;
        $totalLaba = $this->modelLaba->getCountDashboard()->nominal;
        $totalBerat = $this->modelLaba->getCountDashboard()->total_berat;
        $totalBerat_user = $this->modelPanen->getAllPanen()->getResult()[0]->total_panen;
        $totalSalary = $this->salaryModel->getCountNominal()->nominal;
        $totalCost = $this->modelCost->getCountDashboard()->nominal + $totalSalary;



        $data = [
            'totalMasuk'        => $totalMasuk,
            'totalUnitKeluar'   => $totalUnitKeluar,
            'totalLaba'         => $totalLaba,
            'totalCost'         => $totalCost,
            'totalBerat'        => $totalBerat,
            'totalBerat_user'   => $totalBerat_user
        ];
        return view('dashboard/index', $data);
    }
    public function getDataReport()
    {
        $year = date('Y');
        $totaldata = $this->modelPanen->toDashboard($year);

        $data_arr = array(
            'label' => ['Jan ', 'Feb ', 'Maret ', 'April ', 'Mei ', 'Juni ', 'Juli ', 'Agust ', 'Sept ', 'Okt ', 'Nov ', 'Des '],
            'panen' => [$totaldata->jan, $totaldata->feb, $totaldata->mar, $totaldata->apr, $totaldata->mei, $totaldata->jun, $totaldata->jul, $totaldata->agust, $totaldata->sept, $totaldata->okt, $totaldata->nov, $totaldata->dse],

            'totaldata' => $totaldata
        );
        echo json_encode($data_arr);
    }
    public function userView()
    {
        return view('dashboard/user');
    }
    public function updateFullname()
    {
        $this->penggunaModel->save([
            'id'            => user()->id,
            'fullname'      => $this->request->getVar('fullname')
        ]);

        session()->setFlashdata('pesan', 'Fullname berhasil diupdate');
        return redirect()->to('user');
    }
    public function updateImage()
    {
        $idPengguna = $this->request->getVar('id');
        $imageName = $this->request->getVar('nama_foto');
        $fotoUser = $this->request->getFile('image_user');
        $old_image = $imageName;
        if ($fotoUser->isValid() && !$fotoUser->hasMoved()) {
            if ($old_image == 'user.png') {
            } else {
                unlink("assets/images/user/" . $old_image);
            }
            $namaFoto = $fotoUser->getName();
            $fotoUser->move('assets/images/user/');
        } else {
            $namaFoto = $old_image;
        }
        $this->penggunaModel->save([
            'id'            => $idPengguna,
            'image_user'    => $namaFoto,
        ]);
        session()->setFlashdata('pesan', 'Image berhasil diupdate');
        return redirect()->to('user');
    }
}