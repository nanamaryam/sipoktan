<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aset';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_aset', 'id_kategori', 'jumlah', 'id_satuan', 'harga_satuan'];

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

    public function getAllAset()
    {
        $getData = $this->db->table('aset')
            ->select('kategori.nama_kategori, satuan.satuan, aset.*')
            ->join('kategori', 'aset.id_kategori = kategori.id')
            ->join('satuan', 'aset.id_satuan = satuan.id')
            ->get();
        return $getData;;
    }
}
