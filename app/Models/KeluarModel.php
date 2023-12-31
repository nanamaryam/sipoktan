<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'keluar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'date_keluar', 'id_aset', 'jumlah_keluar', 'ket_keluar'];

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

    public function getAllKeluar()
    {
        $getData = $this->db->table('keluar')
            ->select('aset.nama_aset, aset.id_kategori, aset.id_satuan, aset.harga_satuan, aset.jumlah, kategori.nama_kategori, satuan.satuan, keluar.*')
            ->join('aset', 'keluar.id_aset = aset.id')
            ->join('kategori', 'aset.id_kategori = kategori.id')
            ->join('satuan', 'aset.id_satuan = satuan.id')
            ->get();
        return $getData;
    }
    public function getCountDashboard()
    {
        $getData = $this->db->table('keluar')
            ->select('sum(jumlah_keluar) as unit')
            ->where('year(date_keluar)=', date('Y'))
            ->get();
        return $getData->getRow();
    }
}
