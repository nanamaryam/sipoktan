<?php

namespace App\Controllers;

use App\Models\KebunModel;

use App\Models\SatuanModel;

use App\Models\ComodityModel;

use App\Controllers\BaseController;

use App\Database\Migrations\Kebun;


class KebunController extends BaseController
{
    protected $kebunModel;
    protected $satuanModel;
    protected $comodityModel;
    protected $idUser;
    public function __construct()
    {
        $this->kebunModel = new KebunModel();
        $this->satuanModel = new SatuanModel();
        $this->comodityModel = new ComodityModel();
        $this->idUser = user()->id;
    }
    public function index()
    {
        session();
        $dataComodity = $this->comodityModel->countKebun()->getResultArray();
        $data = [
            'dataComodity'  => $dataComodity,
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
            return redirect()->to('kebun/detail')->withInput();
        }

        $this->kebunModel->save([
            'lokasi'        => $this->request->getVar('lokasi'),
            'luas'          => $this->request->getVar('luas'),
            'id_comodity'   => $this->request->getVar('id_comodity'),
            'tahun'         => $this->request->getVar('tahun'),
            'id_user'       => $this->idUser,
            'id_satuan'     => $this->request->getVar('id_satuan'),
            'jenis_tanaman' => $this->request->getVar('jenis_tanaman')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('kebun/detail');
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
            return redirect()->to('kebun/detail')->withInput();
        }
        $this->kebunModel->save([
            'id'            => $id,
            'lokasi'        => $this->request->getVar('lokasi'),
            'luas'          => $this->request->getVar('luas'),
            'tahun'         => $this->request->getVar('tahun'),
            'id_comodity'   => $this->request->getVar('id_comodity'),
            'id_satuan'     => $this->request->getVar('id_satuan'),
            'id_user'       => $this->idUser,
            'jenis_tanaman' => $this->request->getVar('jenis_tanaman')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('kebun/detail');
    }
    public function deleteKebun($id)
    {
        $this->kebunModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('kebun/detail');
    }
    public function printKebun()
    {
        $dataKebun = $this->kebunModel->dataKebun_all()->getResultArray();
        $data = [
            'dataKebun'  => $dataKebun,
        ];
        return view('master/modalKebun/printKebun', $data);
    }
    public function detailKebun() {
        $id_comodity = $this->request->getVar('id_comodity');
        if (in_groups('user') == true) {
            $dataKebun = $this->kebunModel->dataKebun_user()->getResultArray();
            } else {
            $dataKebun = $this->kebunModel->dataKebun($id_comodity)->getResultArray();
        }
        $dataSatuan = $this->satuanModel->getActive()->getResultArray();
        $dataComodity = $this->comodityModel->countActive()->getResultArray();
        $data = [
            'dataKebun' => $dataKebun,
            'dataSatuan' => $dataSatuan,
            'dataComodity' => $dataComodity,
            'validation' => \Config\Services::validation()
        ];
        return view('master/detailKebun', $data);
    }
}