<?php

namespace App\Models;

use CodeIgniter\Model;

class LabaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'laba';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'laba_time', 'berat_kg', 'ket_panen', 'acara_berita', 'nominal'];

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

    public function getFilterLaba($dateStart, $dateEnd)
    {
        $data = $this->db->table('laba')
            ->select('laba.*')
            ->where("laba_time BETWEEN '{$dateStart}' AND '{$dateEnd}'")
            ->get();
        return $data;
    }
    public function getAlldata()
    {
        $data = $this->db->table('laba')
            ->select('COUNT(laba.acara_berita) AS laba_count, SUM(laba.berat_kg) AS total_berat, laba.*')
            ->groupBy('laba.acara_berita')
            ->get();
        
        return $data;
    }
    
    public function getCountDashboard()
    {
        $getData = $this->db->table('laba')
            ->select('sum(nominal) as nominal, sum(berat_kg) as total_berat')
            ->where('year(laba_time)=', date('Y'))
            ->get();
        return $getData->getRow();
    }
}