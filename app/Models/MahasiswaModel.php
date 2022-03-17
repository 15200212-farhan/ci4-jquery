<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'tbl_mahasiswa';
    protected $primaryKey       = 'nim';
    protected $allowedFields    = [
        'nim', 'nama', 'prodi', 'email', 'gambar'
    ];


    public function get_mahasiswa($nim = false)
    {
        if (!$nim) {
            return $this->findAll();
        }

        return $this->where(['nim' => $nim])->first();
    }

    public function insert_datamahasiswa($data)
    {
        $query = $this->db->table('tbl_mahasiswa')->insert($data);
        return $query;
    }

    public function delete_data($data)
    {
        $query = $this->db->table('tbl_mahasiswa')->delete($data);
        return $query;
    }
}
