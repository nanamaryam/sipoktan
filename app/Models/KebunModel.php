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
    protected $allowedFields    = ['id', 'lokasi', 'luas', 'id_satuan', 'id_comodity', 'id_user', 'tahun', 'jenis_tanaman'];

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

    public function dataKebun_all()
    {
        $getData = $this->db->table('kebun')
            ->select('satuan.satuan, comodity.comodity, kebun.*')
            ->join('satuan', 'kebun.id_satuan = satuan.id')
            ->join('comodity', 'kebun.id_comodity = comodity.id')
            ->orderBy('kebun.id', 'desc')
            ->get();
        return $getData;
    }
    public function dataKebun($id_comodity)
    {
        $getData = $this->db->table('kebun')
            ->select('satuan.satuan, comodity.comodity, kebun.*')
            ->join('satuan', 'kebun.id_satuan = satuan.id')
            ->join('comodity', 'kebun.id_comodity = comodity.id')
            ->orderBy('kebun.id', 'desc')
            ->where('id_comodity =', $id_comodity)
            ->get();
        return $getData;
    }
    public function dataKebun_user()
    {
        $getData = $this->db->table('kebun')
            ->select('satuan.satuan, comodity.comodity, kebun.*')
            ->join('satuan', 'kebun.id_satuan = satuan.id')
            ->join('comodity', 'kebun.id_comodity = comodity.id')
            ->orderBy('kebun.id', 'desc')
            ->where('kebun.id_user =', user()->id)
            ->get();
        return $getData;
    }
}