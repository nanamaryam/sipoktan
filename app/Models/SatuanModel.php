<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'satuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'satuan', 'status'];

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

    public function getActive()
    {
        $getActive = $this->db->table('satuan')
            ->where('status =', 'Active')
            ->get();
        return $getActive;
    }
    public function getActivePanen()
    {
        $getActive = $this->db->table('satuan')
            ->where('status =', 'Active')
            ->where('satuan =', 'kg', 'or', 'satuan =', 'Kg')
            ->get();
        return $getActive;
    }
    public function getInactive()
    {
        $getInactive = $this->db->table('satuan')
            ->where('status =', 'Inactive')
            ->get();
        return $getInactive;;
    }
}