<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class AdminController extends BaseController
{
    protected $mahasiswa_model;
    public function __construct()
    {
        $this->mahasiswa_model = new MahasiswaModel();
    }

    public function index()
    {
        $data['description'] = 'Crud codeigniter4 and jquery';
        $data['author'] = 'mas tamvan';
        $data['title'] = 'Admin - dashboard';

        return view('admin/dashboard', $data);
    }

    public function list_data()
    {
        $data['description'] = 'Crud codeigniter4 and jquery';
        $data['author'] = 'mas tamvan';
        $data['title'] = 'Admin - list-data';
        $data['mahasiswa'] = $this->mahasiswa_model->get_mahasiswa();


        return view('admin/list-data', $data);
    }

    public function modal_tambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/ajax/modal-tambah')
            ];

            echo json_encode($msg);
        }
    }

    public function simpan_data()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'v_nim' => [
                    'rules' => 'required|is_unique[tbl_mahasiswa.nim]',
                    'errors' => [
                        'required' => 'nim wajib diisi!',
                        'is_unique' => 'nim sudah terdaftar'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'v_nim' => $validation->getError('v_nim')
                    ]
                ];
            } else {
                $data = [
                    'nim'   => $this->request->getPost('v_nim'),
                    'nama'  => $this->request->getPost('v_nama'),
                    'prodi' => $this->request->getPost('v_prodi'),
                    'email' => $this->request->getPost('v_email'),
                ];
                $this->mahasiswa_model->insert_datamahasiswa($data);
                $msg = ['success' => 'berhasil menambahkan data baru.'];
            }

            echo json_encode($msg);
        }
    }

    public function modal_edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $row = $this->mahasiswa_model->get_mahasiswa($id);
            $send_data = [
                'id'   => $row['nim'],
                'nama'  => $row['nama'],
                'prodi' => $row['prodi'],
                'email' => $row['email']
            ];
            $msg = ['success' => view('admin/ajax/modal-edit', $send_data)];
            echo json_encode($msg);
        }
    }

    public function ubah_data()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('v_nim'); // PK
            $data = [
                'nama'  => $this->request->getPost('v_nama'),
                'prodi' => $this->request->getPost('v_prodi'),
                'email' => $this->request->getPost('v_email')
            ];
            $this->mahasiswa_model->update($id, $data);
            $msg = ['success' => $id . '' . ' berhasil diperbarui'];
            echo json_encode($msg);
        }
    }

    public function hapus_data()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $this->mahasiswa_model->delete($id);
            $msg = ['success' => $id . '' . ' berhasil dihapus'];
            echo json_encode($msg);
        }
    }
}
