<?php

namespace App\Models;

use CodeIgniter\Model;

class PanenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'panen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'time_today', 'id_user', 'id_satuan', 'harga_perkilo', 'berat', 'pendapatan', 'ket_panen'];

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

    public function getAllPanen()
    {
        $data = $this->db->table('panen')
            ->select(' sum(panen.berat) as total_panen ,panen.*, satuan.satuan')
            ->join('satuan', 'panen.id_satuan = satuan.id')
            ->where('id_user =', user_id())
            ->get();
        return $data;
    }
    public function getNoUser()
    {
        $data = $this->db->table('panen')
            ->select('panen.*, satuan.satuan')
            ->join('satuan', 'panen.id_satuan = satuan.id')
            ->get();
        return $data;
    }
    public function getForAdmin()
    {
        $data = $this->db->table('panen')
            ->select('panen.*, satuan.satuan, users.username, users.email')
            ->join('satuan', 'panen.id_satuan = satuan.id')
            ->join('users', 'panen.id_user=users.id')
            ->groupBy('id_user')
            ->get();
        return $data;
    }
    public function getForDetail($loginId)
    {
        $data = $this->db->table('panen')
            ->select('panen.*, satuan.satuan, users.username, users.email')
            ->join('satuan', 'panen.id_satuan = satuan.id')
            ->join('users', 'panen.id_user=users.id')
            ->where('id_user =', $loginId)
            ->get();
        return $data;
    }
    public function toDashboard($year)
    {
        $data = $this->db->query("SELECT
        SUM(CASE When MONTH(time_today)='1' Then pendapatan Else 0 End ) as jan,
        SUM(CASE When MONTH(time_today)='2' Then pendapatan Else 0 End ) as feb,
        SUM(CASE When MONTH(time_today)='3' Then pendapatan Else 0 End ) as mar,
        SUM(CASE When MONTH(time_today)='4' Then pendapatan Else 0 End ) as apr,
        SUM(CASE When MONTH(time_today)='5' Then pendapatan Else 0 End ) as mei,
        SUM(CASE When MONTH(time_today)='6' Then pendapatan Else 0 End ) as jun,
        SUM(CASE When MONTH(time_today)='7' Then pendapatan Else 0 End ) as jul,
        SUM(CASE When MONTH(time_today)='8' Then pendapatan Else 0 End ) as agust,
        SUM(CASE When MONTH(time_today)='9' Then pendapatan Else 0 End ) as sept,
        SUM(CASE When MONTH(time_today)='10' Then pendapatan Else 0 End ) as okt,
        SUM(CASE When MONTH(time_today)='11' Then pendapatan Else 0 End ) as nov,
        SUM(CASE When MONTH(time_today)='12' Then pendapatan Else 0 End ) as dse
        FROM panen where YEAR(time_today)='$year' ")->getRow();
        return $data;
    }
}