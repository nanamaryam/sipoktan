<?php

namespace App\Controllers;

use App\Models\AsetModel;

use App\Models\KeluarModel;

use App\Controllers\BaseController;

class KeluarController extends BaseController
{
    protected $asetModel;
    protected $keluarModel;
    public function __construct()
    {
        $this->asetModel = new AsetModel();
        $this->keluarModel = new KeluarModel();
    }
    public function index()
    {
        session();
        $dataKeluar = $this->keluarModel->getAllKeluar()->getResultArray();
        $data = [
            'dataKeluar'        => $dataKeluar,
            'validation'        => \Config\Services::validation(),
        ];

        return view('track/keluar', $data);
    }
    public function simpanKeluar()
    {
        session();
        $dataAset = $this->asetModel->getAllAset()->getResultArray();
        $data = [
            'dataAset'      => $dataAset,
            'validation'    => \Config\Services::validation()
        ];
        return view('track/trackKeluar/addKeluar', $data);
    }
    public function storeKeluar()
    {
        if (!$this->validate([
            'jumlah_keluar'          => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => "Jumlah tidak boleh kosong"
                ]
            ]
        ])) {
            return redirect()->to('track/trackKeluar/addKeluar')->withInput();
        }

        $d = count($this->request->getVar('id_aset'));
        for ($i = 0; $i < $d; $i++) {
            $this->keluarModel->save([
                'id_aset'            => $this->request->getVar('id_aset')[$i],
                'jumlah_keluar'      => $this->request->getVar('jumlah_keluar')[$i],
                'harga_keluar'       => $this->request->getVar('harga_keluar')[$i],
                'ket_keluar'         => $this->request->getVar('ket_keluar')[$i],
            ]);
        }

        for ($i = 0; $i < $d; $i++) {
            $this->asetModel->save([
                'id'          => $this->request->getVar('id_aset')[$i],
                'jumlah'      => $this->request->getVar('jumlah')[$i] - $this->request->getVar('jumlah_keluar')[$i],
            ]);
        }

        session()->setFlashdata('pesan', 'Data keluar berhasil ditambahkan');
        return redirect()->to('keluar');
    }
    public function deleteKeluar($id)
    {
        $this->keluarModel->delete($id);
        $this->asetModel->save([
            'id'          => $this->request->getVar('id_aset'),
            'jumlah'      => $this->request->getVar('jumlah') + $this->request->getVar('jumlah_keluar'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('keluar');
    }
}
