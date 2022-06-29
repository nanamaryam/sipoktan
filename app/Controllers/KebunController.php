<?php

namespace App\Controllers;

use App\Models\KebunModel;

use App\Models\SatuanModel;

use App\Controllers\BaseController;

use App\Database\Migrations\Kebun;

class KebunController extends BaseController
{
    protected $kebunModel;
    protected $satuanModel;
    public function __construct()
    {
        $this->kebunModel = new KebunModel();
        $this->satuanModel = new SatuanModel();
    }
    public function index()
    {
        session();
        $dataKebun = $this->kebunModel->dataKebun()->getResultArray();
        $dataSatuan = $this->satuanModel->getActive()->getResultArray();
        $data = [
            'dataKebun'     => $dataKebun,
            'dataSatuan'    => $dataSatuan,
            'validation'    => \Config\Services::validation()
        ];
        return view('master/kebun', $data);
    }
    public function saveKebun()
    {
        if (!$this->validate([
            'lokasi'            => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Lokasi tidak boleh kosong'
                ]
            ],
            'luas'              => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Luas tidak boleh kosong'
                ]
            ],
            'tahun'             => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Tahun tidak boleh kosong'
                ]
            ],
            'jenis_tanaman'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Lokasi tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('kebun')->withInput();
        }

        $this->kebunModel->save([
            'lokasi'        => $this->request->getVar('lokasi'),
            'luas'          => $this->request->getVar('luas'),
            'tahun'         => $this->request->getVar('tahun'),
            'id_satuan'     => $this->request->getVar('id_satuan'),
            'jenis_tanaman' => $this->request->getVar('jenis_tanaman')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('kebun');
    }
    public function updateKebun($id)
    {
        if (!$this->validate([
            'lokasi'            => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Lokasi tidak boleh kosong'
                ]
            ],
            'luas'              => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Luas tidak boleh kosong'
                ]
            ],
            'tahun'             => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Tahun tidak boleh kosong'
                ]
            ],
            'id_satuan'         => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Satuan tidak boleh kosong'
                ]
            ],
            'jenis_tanaman'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Lokasi tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('kebun')->withInput();
        }
        $this->kebunModel->save([
            'id'            => $id,
            'lokasi'        => $this->request->getVar('lokasi'),
            'luas'          => $this->request->getVar('luas'),
            'tahun'         => $this->request->getVar('tahun'),
            'id_satuan'     => $this->request->getVar('id_satuan'),
            'jenis_tanaman' => $this->request->getVar('jenis_tanaman')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('kebun');
    }
    public function deleteKebun($id)
    {
        $this->kebunModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('kebun');
    }
}
