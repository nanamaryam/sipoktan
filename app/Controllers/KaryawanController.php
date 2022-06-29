<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

use App\Models\KebunModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;

class KaryawanController extends BaseController
{
    protected $karyawanModel;
    protected $kebunModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
        $this->kebunModel = new KebunModel();
    }
    public function index()
    {
        session();
        $dataKaryawan = $this->karyawanModel->getAllKaryawan()->getResultArray();
        $countKaryawan = count($this->karyawanModel->getAllKaryawan()->getResultArray());
        $data = [
            'dataKaryawan'      => $dataKaryawan,
            'countKaryawan'     => $countKaryawan,
            'validation'        => \Config\Services::validation(),
        ];
        return view('hris/karyawan', $data);
    }
    public function addKaryawan()
    {
        session();
        $dataKebun = $this->kebunModel->dataKebun()->getResultArray();
        $data = [
            'dataKebun'         => $dataKebun,
            'validation'        => \Config\Services::validation(),
        ];
        return view('hris/modalKaryawan/addKaryawan', $data);
    }
    public function simpanKaryawan()
    {
        if (!$this->validate([
            'id_kebun'          => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Data kebun tidak boleh kosong'
                ]
            ],
            'foto_karyawan'     => [
                'rules'         => 'uploaded[foto_karyawan]|max_size[foto_karyawan,10240]|is_image[foto_karyawan]|mime_in[foto_karyawan,image/jpg,image/jpeg,image/png]',
                'errors'        => [
                    'uploaded'  => 'Upload foto dulu',
                    'max_size'  => 'Ukuran foto terlalu besar',
                    'is_image'  => 'Upload file dengan format gambar',
                    'mimi_in'   => 'Uploud file dengan format gambar',
                ]
            ]
        ])) {
            return redirect()->to('karyawan/addkaryawan')->withInput();
        }
        $fotoKaryawan = $this->request->getFile('foto_karyawan');
        $fotoKaryawan->move('assets/images/karyawan');
        $namaFoto = $fotoKaryawan->getName();
        $this->karyawanModel->save([
            'nama_karyawan'  => $this->request->getVar('nama_karyawan'),
            'foto_karyawan'  => $namaFoto,
            'status'         => $this->request->getVar('status'),
            'id_kebun'       => $this->request->getVar('id_kebun'),
            'alamat'         => $this->request->getVar('alamat'),
            'date_gabung'    => $this->request->getVar('date_gabung'),
            'pen_terakhir'   => $this->request->getVar('pen_terakhir'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('karyawan');
    }
    public function editKaryawan($id)
    {
        session();
        $dataKaryawan = $this->karyawanModel->getIdKaryawan($id)->getResultArray();
        $dataKebun = $this->kebunModel->dataKebun()->getResultArray();
        $data = [
            'dataKaryawan'      => $dataKaryawan,
            'dataKebun'         => $dataKebun,
            'validation'        => \Config\Services::validation(),
        ];
        return view('hris/modalKaryawan/updateKaryawan', $data);
    }
    public function storeKaryawan($id)
    {
        if (!$this->validate([
            'id_kebun'          => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Data kebun tidak boleh kosong'
                ]
            ],
            'foto_karyawan'     => [
                'rules'         => 'max_size[foto_karyawan,10240]|is_image[foto_karyawan]|mime_in[foto_karyawan,image/jpg,image/jpeg,image/png]',
                'errors'        => [
                    'max_size'  => 'Ukuran foto terlalu besar',
                    'is_image'  => 'Upload file dengan format gambar',
                    'mimi_in'   => 'Uploud file dengan format gambar',
                ]
            ]

        ])) {
            return redirect()->to('karyawan/editkaryawan/' . $id)->withInput();
        }
        $dataKaryawan = $this->karyawanModel->find($id);
        $fotoKaryawan = $this->request->getFile('foto_karyawan');
        $old_image = $dataKaryawan['foto_karyawan'];
        if ($fotoKaryawan->isValid() && !$fotoKaryawan->hasMoved()) {

            if (file_exists("assets/images/karyawan/" . $old_image)) {
                unlink("assets/images/karyawan/" . $old_image);
            }
            $namaFoto = $fotoKaryawan->getName();
            $fotoKaryawan->move('assets/images/karyawan/');
        } else {
            $namaFoto = $old_image;
        }
        $this->karyawanModel->save([
            'id'             => $id,
            'nama_karyawan'  => $this->request->getVar('nama_karyawan'),
            'foto_karyawan'  => $namaFoto,
            'status'         => $this->request->getVar('status'),
            'id_kebun'       => $this->request->getVar('id_kebun'),
            'alamat'         => $this->request->getVar('alamat'),
            'date_gabung'    => $this->request->getVar('date_gabung'),
            'pen_terakhir'   => $this->request->getVar('pen_terakhir'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('karyawan');
    }
    public function deleteKaryawan($id)
    {
        $data = $this->karyawanModel->find($id);
        $image = $data['foto_karyawan'];
        if (file_exists("assets/images/karyawan/" . $image)) {
            unlink("assets/images/karyawan/" . $image);
        }
        $this->karyawanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('karyawan');
    }
    public function printKaryawan()
    {
        $dataKaryawan = $this->karyawanModel->getAllKaryawan()->getResultArray();
        $data = [
            'dataKaryawan'  => $dataKaryawan,
        ];
        return view('hris/modalKaryawan/printKaryawan', $data);
    }
    public function exportExcel()
    {
        $dataKaryawan = $this->karyawanModel->getAllKaryawan()->getResultArray();
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama')
            ->setCellValue('B1', 'Posisi Tugas')
            ->setCellValue('C1', 'Alamat')
            ->setCellValue('D1', 'Waktu Gabung')
            ->setCellValue('E1', 'Pendidikan')
            ->setCellValue('F1', 'Status');

        $column = 2;
        foreach ($dataKaryawan as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $value['nama_karyawan'])
                ->setCellValue('B' . $column, $value['lokasi'] . ' ' . $value['luas'] . ' ' . $value['satuan'])
                ->setCellValue('C' . $column, $value['alamat'])
                ->setCellValue('D' . $column, $value['date_gabung'])
                ->setCellValue('E' . $column, $value['pen_terakhir'])
                ->setCellValue('F' . $column, $value['status']);

            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-Karyawan';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
