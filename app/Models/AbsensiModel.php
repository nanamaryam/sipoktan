<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'absensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_login', 'time_sign', 'date_time', 'keterangan'];

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

    public function getAllAbsensi()
    {
        $data = $this->db->table('absensi')
            ->select('absensi.*')
            ->where('user_login =', user_id())
            ->get();
        return $data;
    }
    public function getCountToday()
    {
        $data = $this->db->table('absensi')
            ->select('absensi.*')
            ->where('date_time =', date('d-m-y'))
            ->where('user_login =', user_id())
            ->get();
        return $data;
    }
    public function getAdminAbsensi()
    {
        $data = $this->db->table('absensi')
            ->select('absensi.user_login, COUNT(absensi.user_login) AS login_count, users.username, users.email')
            ->join('users', 'absensi.user_login = users.id')
            ->groupBy('absensi.user_login')
            ->get();
        
        return $data;
    }
    public function getDetailAbsensi($idUser)
    {
        $data = $this->db->table('absensi')
            ->select('absensi.*, users.username, users.email')
            ->join('users', 'absensi.user_login = users.id')
            ->where('user_login =', $idUser)
            ->get();
        return $data;
    }
}