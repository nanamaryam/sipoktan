<?php

namespace App\Controllers;

use App\Models\PanenModel;

use App\Models\SatuanModel;

use App\Models\LabaModel;

use App\Controllers\BaseController;

class PanenController extends BaseController
{
    protected $panenModel;
    protected $satuanModel;
    protected $labaModel;
    public function __construct()
    {
        $this->panenModel = new PanenModel();
        $this->satuanModel = new SatuanModel();
        $this->labaModel = new LabaModel();
    }
    public function index()
    {
        session();
        if (in_groups('user') == true) {
            $dataPanen = $this->panenModel->getAllPanen()->getResultArray();
        } elseif (in_groups('admin') == true) {
            $dataPanen = $this->panenModel->getNoUser()->getResultArray();
        }
        $dataSatuan = $this->satuanModel->getActive()->getResultArray();
        $data = [
            'dataPanen'     => $dataPanen,
            'dataSatuan'    => $dataSatuan
        ];
        return view('hris/panen', $data);
    }
    public $hargaKilo;
    public $totalHarga;
    public function simpanPanen()
    {
        $hargaKilo = $this->request->getVar('harga_perkilo');
        $totalHarga = $this->request->getVar('berat');
        $this->panenModel->save([
            'id_user'           => user_id(),
            'time_today'        => date('Y-m-d'),
            'harga_perkilo'     => $this->request->getVar('harga_perkilo'),
            'berat'             => $this->request->getVar('berat'),
            'id_satuan'         => $this->request->getVar('id_satuan'),
            'pendapatan'        => $hargaKilo*$totalHarga,
            'ket_panen'         => $this->request->getVar('ket_panen')
        ]);
        $this->labaModel->save([
            'laba_time'         => date('Y-m-d'),
            'acara_berita'      => 'Panen ' . user()->username,
            'nominal'           => $hargaKilo*$totalHarga,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('panen');
    }
    public function updatePanen($id)
    {
        $this->panenModel->save([
            'id'                => $id,
            'id_user'           => user_id(),
            'harga_perkilo'     => $this->request->getVar('harga_perkilo'),
            'berat'             => $this->request->getVar('berat'),
            'pendapatan'        => $hargaKilo*$totalHarga,
            'ket_panen'         => $this->request->getVar('ket_panen')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('panen');
    }
    public function deletePanen($id)
    {
        $this->panenModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('panen');
    }
    public function dataPanen()
    {
        $dataPanen = $this->panenModel->getForAdmin()->getResultArray();
        $data = [
            'dataPanen'       => $dataPanen,
        ];
        return view('hris/panenData', $data);
    }
    public function dataPanenDetail()
    {
        $loginId = $this->request->getVar('user_id');
        $dataPanen = $this->panenModel->getForDetail($loginId)->getResultArray();
        $data = [
            'dataPanen'       => $dataPanen,
        ];
        return view('hris/modalPanen/detailPanen', $data);
    }
}
