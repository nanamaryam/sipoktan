<?php

namespace App\Models;

use CodeIgniter\Model;

class ComodityModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'comodity';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'comodity', 'status'];

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

    public function countActive()
    {
        $countGetActive = $this->db->table('comodity')
            ->where('status =', 'Active')
            ->get();
        return $countGetActive;
    }
    public function countInactive()
    {
        $countGetInactive = $this->db->table('comodity')
            ->where('status =', 'Inactive')
            ->get();
        return $countGetInactive;
    }
    public function countKebun()
    {
        $getData = $this->db->table('comodity')
            ->select('COUNT(kebun.id) AS jumlah, comodity.*')
            ->join('kebun', 'kebun.id_comodity = comodity.id')
            ->where('comodity.status', 'Active')
            ->groupBy('comodity.id')
            ->orderBy('comodity.id', 'asc')
            ->get();
        
        return $getData;
    }

}