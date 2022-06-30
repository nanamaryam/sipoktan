<?php

namespace App\Models;

use CodeIgniter\Model;

class CostModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cost';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'cost_time', 'berita_acara', 'nominal_cost'];

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

    public function getFilterCost($dateStart, $dateEnd)
    {
        $data = $this->db->table('cost')
            ->select('cost.*')
            ->where("cost_time BETWEEN '{$dateStart}' AND '{$dateEnd}'")
            ->get();
        return $data;
    }
    public function getCountDashboard()
    {
        $getData = $this->db->table('cost')
            ->select('sum(nominal_cost) as nominal')
            ->where('year(cost_time)=', date('Y'))
            ->get();
        return $getData->getRow();
    }
}
