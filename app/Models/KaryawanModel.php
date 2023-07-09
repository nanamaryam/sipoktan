<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'karyawan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_karyawan', 'foto_karyawan', 'id_kebun', 'status', 'alamat', 'date_gabung', 'pen_terakhir'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllKaryawan()
    {
        $getData = $this->db->table('karyawan')
            ->select('kebun.lokasi, GROUP_CONCAT(CONCAT(kebun.luas, " ", satuan.satuan) SEPARATOR ",") AS luas, GROUP_CONCAT(kebun.lokasi SEPARATOR ",") AS lokasi, karyawan.*')
            ->join('kebun', 'FIND_IN_SET(kebun.id, karyawan.id_kebun) > 0')
            ->join('satuan', 'kebun.id_satuan = satuan.id')
            ->groupBy('karyawan.id, karyawan.nama_karyawan')
            ->get();

        return $getData;

    }
    
    public function getIdKaryawan($id)
    {
        $getData = $this->db->table('karyawan')
        ->select('kebun.lokasi, GROUP_CONCAT(CONCAT(kebun.lokasi, " ", kebun.luas, " ", satuan.satuan) SEPARATOR " | ") AS lokasi, karyawan.*')
        ->join('kebun', 'FIND_IN_SET(kebun.id, karyawan.id_kebun) > 0')
        ->join('satuan', 'kebun.id_satuan = satuan.id')
        ->groupBy('karyawan.id, karyawan.nama_karyawan')
        ->where('karyawan.id =', $id)
        ->get();
        return $getData;
    }
}