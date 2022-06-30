<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

use App\Models\PemisionModel;

use App\Controllers\BaseController;

class AccountController extends BaseController
{
    protected $penggunaModel;
    protected $permissionModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->permissionModel = new PemisionModel();
    }
    public function index()
    {
        $dataPengguna = $this->permissionModel->getGroup()->getResultArray();
        $groupUser = $this->permissionModel->getkumpulanuser()->getResultArray();
        $dataGroup = $this->permissionModel->getnamagroup()->getResultArray();
        $data = [
            'dataPengguna'      => $dataPengguna,
            'dataGroup'         => $dataGroup,
            'groupUser'         => $groupUser
        ];
        return view('master/account', $data);
    }
    public function update($id)
    {
        $this->permissionModel->save([
            'id_role'            => $id,
            'user_id'            => $this->request->getVar('users_simpan'),
            'group_id'           => $this->request->getVar('role_simpan'),
        ]);
        session()->setFlashdata('pesan', 'Role bershasil diubah');
        return redirect()->to('account');
    }
}
