<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\SatuanModel;

class SatuanController extends BaseController
{
    protected $satuanModel;
    public function __construct()
    {
        $this->satuanModel = new SatuanModel();
    }
    public function index()
    {
        session();
        $getActive = count($this->satuanModel->getActive()->getResultArray());
        $getInactive = count($this->satuanModel->getInactive()->getResultArray());
        $dataSatuan = $this->satuanModel->findAll();
        $data = [
            'dataSatuan'    => $dataSatuan,
            'getActive'     => $getActive,
            'getInactive'   => $getInactive,
            'validation'    => \Config\Services::validation()
        ];
        return view('master/satuan', $data);
    }
    public function saveSatuan()
    {
        if (!$this->validate([
            'satuan'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Satuan tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('satuan')->withInput();
        }
        $this->satuanModel->save([
            'satuan'        => $this->request->getVar('satuan'),
            'status'               => $this->request->getVar('status')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('satuan');
    }
    public function updateSatuan($id)
    {
        if (!$this->validate([
            'satuan'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Satuan tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('satuan')->withInput();
        }
        $this->satuanModel->save([
            'id'                   => $id,
            'satuan'        => $this->request->getVar('satuan'),
            'status'               => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('satuan');
    }
    public function deleteSatuan($id)
    {
        $this->satuanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('satuan');
    }
}
