<?php

namespace App\Models;

use CodeIgniter\Model;

class KebunModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kebun';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'lokasi', 'luas', 'id_satuan', 'tahun', 'jenis_tanaman'];

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

    public function dataKebun()
    {
        $getData = $this->db->table('kebun')
            ->select('satuan.satuan, kebun.*')
            ->join('satuan', 'kebun.id_satuan = satuan.id')
            ->get();
        return $getData;;
    }
}
