<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        session();
        $getActive = count($this->kategoriModel->countActive()->getResultArray());
        $getInactive = count($this->kategoriModel->countInactive()->getResultArray());
        $dataKategori = $this->kategoriModel->findAll();
        $data = [
            'dataKategori'  => $dataKategori,
            'getActive'     => $getActive,
            'getInactive'   => $getInactive,
            'validation'    => \Config\Services::validation()
        ];
        return view('master/kategori', $data);
    }
    public function saveKategori()
    {
        if (!$this->validate([
            'nama_kategori'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Kategori tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('kategori')->withInput();
        }
        $this->kategoriModel->save([
            'nama_kategori'        => $this->request->getVar('nama_kategori'),
            'status'               => $this->request->getVar('status')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('kategori');
    }
    public function updateKategori($id)
    {
        if (!$this->validate([
            'nama_kategori'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Kategori tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('kategori')->withInput();
        }
        $this->kategoriModel->save([
            'id'                   => $id,
            'nama_kategori'        => $this->request->getVar('nama_kategori'),
            'status'               => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('kategori');
    }
    public function deleteKategori($id)
    {
        $this->kategoriModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('kategori');
    }
}
