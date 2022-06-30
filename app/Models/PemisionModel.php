<?php

namespace App\Models;

use CodeIgniter\Model;

class PemisionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auth_groups_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'group_id'];

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

    public function getGroup()
    {
        $query =  $this->db->table('auth_groups_users')
            ->select('users.*, auth_groups_users.user_id, auth_groups_users.group_id, auth_groups_users.id as auth_groups_users_id, auth_groups.name, auth_groups.description, auth_groups.id as group_id')
            ->join('users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
            ->get();
        return $query;
    }
    public function getnamagroup()
    {
        $Usergroup = $this->db->table('auth_groups')->get();
        return $Usergroup;
    }
    public function getkumpulanuser()
    {
        $kumpulanUser = $this->db->table('users')->get();
        return $kumpulanUser;
    }
}
