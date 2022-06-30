<?php

namespace App\Controllers;

use App\Models\SalaryModel;

use App\Models\KaryawanModel;

use App\Models\CostModel;

use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;

use App\Database\Migrations\Salary;

class SalaryController extends BaseController
{
    protected $salaryModel;
    protected $karyawanModel;
    protected $costModel;
    public function __construct()
    {
        $this->salaryModel = new SalaryModel();
        $this->karyawanModel = new KaryawanModel();
        $this->costModel = new CostModel();
    }
    public function index()
    {
        session();
        $dataSalary = $this->salaryModel->getAllSalary()->getResultArray();
        $data = [
            'dataSalary'      => $dataSalary,
            'validation'      => \Config\Services::validation()
        ];

        return view('hris/salary', $data);
    }
    public function addSalary()
    {
        session();
        $dataKaryawan = $this->karyawanModel->getAllKaryawan()->getResultArray();

        $data = [
            'dataKaryawan'      => $dataKaryawan,
            'validation'        => \Config\Services::validation()
        ];
        return view('hris/modalSalary/addSalary', $data);
    }
    public function simpanSalary()
    {
        if (!$this->validate([
            'id_karyawan'           => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Data karyawan tidak boleh kosong'
                ]
            ],
            'price_salary'          => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Salary tidak boleh kosong'
                ]
            ],
        ])) {
            return redirect()->to('salary/addsalary')->withInput();
        }
        $this->salaryModel->save([
            'id_karyawan'           => $this->request->getVar('id_karyawan'),
            'price_salary'          => $this->request->getVar('price_salary'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('salary');
    }
    public function editSalary()
    {
        session();
        $dataKaryawan = $this->karyawanModel->getAllKaryawan()->getResultArray();
        $dataSalary = $this->salaryModel->getAllSalary()->getResultArray();

        $data = [
            'dataKaryawan'      => $dataKaryawan,
            'dataSalary'        => $dataSalary,
            'validation'        => \Config\Services::validation()
        ];
        return view('hris/modalSalary/editSalary', $data);
    }
    public function updateSalary($id)
    {
        if (!$this->validate([
            'id_karyawan'           => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Data karyawan tidak boleh kosong'
                ]
            ],
            'price_salary'          => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Salary tidak boleh kosong'
                ]
            ],
        ])) {
            return redirect()->to('salary/editsalary')->withInput();
        }
        $this->salaryModel->save([
            'id'                    => $id,
            'id_karyawan'           => $this->request->getVar('id_karyawan'),
            'price_salary'          => $this->request->getVar('price_salary'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('salary');
    }
    public function deleteSalary($id)
    {
        $this->salaryModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('salary');
    }
    public function printSalary()
    {
        $dataSalary = $this->salaryModel->getAllSalary()->getResultArray();
        $data = [
            'dataSalary'    => $dataSalary,
        ];

        return view('hris/modalSalary/printSalary', $data);
    }
}
