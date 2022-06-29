<?php

namespace App\Controllers;

use App\Models\AbsensiModel;

use App\Controllers\BaseController;

use function PHPUnit\Framework\returnSelf;

class AbsensiController extends BaseController
{
    protected $absensiModel;
    public function __construct()
    {
        $this->absensiModel = new AbsensiModel();
    }
    public function index()
    {
        session();
        $dataAbsensi = $this->absensiModel->getAllAbsensi()->getResultArray();
        $dataViewToday = $this->absensiModel->getCountToday()->getResultArray();
        $dataCountAbsensi = count($this->absensiModel->getCountToday()->getResultArray());
        $data = [
            'dataAbsensi'       => $dataAbsensi,
            'dataCountAbsensi'  => $dataCountAbsensi,
            'dataViewToday'     => $dataViewToday,
        ];
        return view('hris/absensi', $data);
    }
    public function simpanAbsensi()
    {
        $this->absensiModel->save([
            'user_login'       => $this->request->getVar('user_login'),
            'time_sign'         => $this->request->getVar('time_sign'),
            'date_time'         => $this->request->getVar('date_time'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ]);
        session()->setFlashdata('pesan', 'Absen berhasil dibuat');
        return redirect()->to('absensi');
    }
}
