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
    protected $generateId;
    public function __construct()
    {
        $this->generateId = date('mdHis');
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
        $dataSatuan = $this->satuanModel->getActivePanen()->getResultArray();
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
        $this->panenModel->insert([
            'id'                => $this->generateId,
            'id_user'           => user_id(),
            'time_today'        => date('Y-m-d'),
            'harga_perkilo'     => $this->request->getVar('harga_perkilo'),
            'berat'             => $this->request->getVar('berat'),
            'id_satuan'         => $this->request->getVar('id_satuan'),
            'pendapatan'        => $hargaKilo*$totalHarga,
            'ket_panen'         => $this->request->getVar('ket_panen')
        ]);
        $this->labaModel->insert([
            'id'                => $this->generateId,
            'laba_time'         => date('Y-m-d'),
            'acara_berita'      => 'Panen ' . user()->username,
            'ket_panen'         => $this->request->getVar('ket_panen'),
            'berat_kg'          => $this->request->getVar('berat'),
            'nominal'           => $hargaKilo*$totalHarga,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('panen');
    }
    public function updatePanen($id)
    {
        $hargaKilo = $this->request->getVar('harga_perkilo');
        $totalHarga = $this->request->getVar('berat');
        $this->panenModel->save([
            'id'                => $id,
            'id_user'           => user_id(),
            'harga_perkilo'     => $this->request->getVar('harga_perkilo'),
            'berat'             => $this->request->getVar('berat'),
            'pendapatan'        => $hargaKilo*$totalHarga,
            'ket_panen'         => $this->request->getVar('ket_panen')
        ]);
        $this->labaModel->save([
            'id'                => $id,
            'laba_time'         => date('Y-m-d'),
            'acara_berita'      => 'Panen ' . user()->username,
            'ket_panen'         => $this->request->getVar('ket_panen'),
            'berat_kg'          => $this->request->getVar('berat'),
            'nominal'           => $hargaKilo*$totalHarga,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('panen');
    }
    public function deletePanen($id)
    {
        $this->panenModel->delete($id);
        $this->labaModel->delete($id);
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