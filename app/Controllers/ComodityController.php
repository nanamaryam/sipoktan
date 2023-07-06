<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ComodityModel;

class ComodityController extends BaseController
{
    protected $comodityModel;
    public function __construct()
    {
        $this->comodityModel = new ComodityModel();
    }
    public function index()
    {
        session();
        $getActive = count($this->comodityModel->countActive()->getResultArray());
        $getInactive = count($this->comodityModel->countInactive()->getResultArray());
        $dataComodity = $this->comodityModel->findAll();
        $data = [
            'dataComodity'  => $dataComodity,
            'getActive'     => $getActive,
            'getInactive'   => $getInactive,
            'validation'    => \Config\Services::validation()
        ];
        return view('master/comodity', $data);
    }
    public function saveComodity()
    {
        if (!$this->validate([
            'nama_comodity'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Comodity tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('comodity')->withInput();
        }
        $this->comodityModel->save([
            'comodity'        => $this->request->getVar('nama_comodity'),
            'status'               => $this->request->getVar('status')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('comodity');
    }
    public function updateComodity($id)
    {
        if (!$this->validate([
            'nama_comodity'     => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Comodity tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('comodity')->withInput();
        }
        $this->comodityModel->save([
            'id'                   => $id,
            'comodity'        => $this->request->getVar('nama_comodity'),
            'status'               => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('comodity');
    }
    public function deleteComodity($id)
    {
        $this->comodityModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('comodity');
    }
}