<?php

namespace App\Controllers;

use App\Models\AsetModel;

use App\Models\KategoriModel;

use App\Models\SatuanModel;

use App\Controllers\BaseController;

use function PHPUnit\Framework\returnSelf;

use Myth\Auth\Authentication\Passwords\ValidationRules;

class AsetController extends BaseController
{
    protected $asetModel;
    protected $satuanModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->asetModel = new AsetModel();
        $this->satuanModel = new SatuanModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        session();
        $dataAset = $this->asetModel->getAllAset()->getResultArray();
        $dataSatuan = $this->satuanModel->getActive()->getResultArray();
        $dataKategori = $this->kategoriModel->countActive()->getResultArray();
        $data = [
            'dataAset'      => $dataAset,
            'dataSatuan'    => $dataSatuan,
            'dataKategori'  => $dataKategori,
            'validation'    => \Config\Services::validation()
        ];
        return view('master/aset', $data);
    }
    public function saveAset()
    {
        if (!$this->validate([
            'nama_aset'             => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Nama aset tidak boleh kosong'
                ]
            ],
            'id_kategori'           => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Kategori tidak boleh kosong'
                ]
            ],
            'jumlah'                => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Jumlah tidak boleh kosong'
                ]
            ],
            'id_satuan'             => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Satuan tidak boleh kosong'
                ]
            ],
            'harga_satuan'          => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Harga satuan tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('aset')->withInput();
        }
        $this->asetModel->save([
            'nama_aset'         => $this->request->getVar('nama_aset'),
            'id_kategori'       => $this->request->getVar('id_kategori'),
            'jumlah'            => $this->request->getVar('jumlah'),
            'id_satuan'         => $this->request->getVar('id_satuan'),
            'harga_satuan'      => $this->request->getVar('harga_satuan')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('aset');
    }
    public function updateAset($id)
    {
        if (!$this->validate([
            'nama_aset'             => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Nama aset tidak boleh kosong'
                ]
            ],
            'id_kategori'           => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Kategori tidak boleh kosong'
                ]
            ],
            'jumlah'                => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Jumlah tidak boleh kosong'
                ]
            ],
            'id_satuan'             => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Satuan tidak boleh kosong'
                ]
            ],
            'harga_satuan'          => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Harga satuan tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('aset')->withInput();
        }
        $this->asetModel->save([
            'id'                => $id,
            'nama_aset'         => $this->request->getVar('nama_aset'),
            'id_kategori'       => $this->request->getVar('id_kategori'),
            'jumlah'            => $this->request->getVar('jumlah'),
            'id_satuan'         => $this->request->getVar('id_satuan'),
            'harga_satuan'      => $this->request->getVar('harga_satuan')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('aset');
    }
    public function deleteAset($id)
    {
        $this->asetModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('aset');
    }
}
