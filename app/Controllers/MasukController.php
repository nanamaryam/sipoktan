<?php

namespace App\Controllers;

use App\Models\MasukModel;

use App\Models\AsetModel;

use App\Models\CostModel;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\Request;

class MasukController extends BaseController
{
    protected $masukModel;
    protected $asetModel;
    protected $costModel;
    public function __construct()
    {
        $this->masukModel = new MasukModel();
        $this->asetModel = new AsetModel();
        $this->costModel = new CostModel();
    }
    public function index()
    {
        session();
        $dataMasuk = $this->masukModel->getAllMasuk()->getResultArray();
        $data = [
            'dataMasuk'     => $dataMasuk,
            'validation'    => \Config\Services::validation()
        ];
        return view('track/masuk', $data);
    }
    public function simpanMasuk()
    {
        session();
        $dataAset = $this->asetModel->getAllAset()->getResultArray();
        $data = [
            'dataAset'      => $dataAset,
            'validation'    => \Config\Services::validation()
        ];
        return view('track/trackMasuk/addMasuk', $data);
    }
    public function storeMasuk()
    {
        if (!$this->validate([
            'jumlah_masuk'          => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => "Jumlah tidak boleh kosong"
                ]
            ]
        ])) {
            return redirect()->to('track/trackMasuk/addMasuk')->withInput();
        }

        $d = count($this->request->getVar('id_aset'));
        for ($i = 0; $i < $d; $i++) {
            $this->masukModel->save([
                'id_aset'           => $this->request->getVar('id_aset')[$i],
                'jumlah_masuk'      => $this->request->getVar('jumlah_masuk')[$i],
                'harga_masuk'       => $this->request->getVar('harga_masuk')[$i],
                'ket'               => $this->request->getVar('ket')[$i],
            ]);
        }

        for ($i = 0; $i < $d; $i++) {
            $this->asetModel->save([
                'id'          => $this->request->getVar('id_aset')[$i],
                'jumlah'      => $this->request->getVar('jumlah_masuk')[$i] + $this->request->getVar('jumlah')[$i],
            ]);
        }

        for ($i = 0; $i < $d; $i++) {
            $this->costModel->save([
                'cost_time'     => date('Y-m-d'),
                'berita_acara'  => $this->request->getVar('berita_acara')[$i],
                'nominal_cost'  => $this->request->getVar('harga_masuk')[$i],
            ]);
        }


        session()->setFlashdata('pesan', 'Data masuk berhasil ditambahkan');
        return redirect()->to('masuk');
    }
    public function deleteMasuk($id)
    {
        $this->masukModel->delete($id);
        $this->asetModel->save([
            'id'          => $this->request->getVar('id_aset'),
            'jumlah'      => $this->request->getVar('jumlah') - $this->request->getVar('jumlah_masuk'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('masuk');
    }
}
