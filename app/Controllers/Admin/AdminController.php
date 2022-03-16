<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

    public function form_tambahdata()
    {

        if (!$this->request->isAJAX()) {
            throw PageNotFoundException::forPageNotFound();
            return false;
        }

        $response = [
            'data' => view('admin/ajax/form-tambahdata')
        ];

        echo json_encode($response);
    }


    public function insert_datamahasiswa()
    {
        if (!$this->request->isAJAX()) {
            throw PageNotFoundException::forPageNotFound();
            return false;
        }
        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'v_nim' => [
                'rules' => 'required|is_unique[tbl_mahasiswa.nim]',
                'label' => 'nim',
                'errors' => [
                    'required' => '{field} belum disi!',
                    'is_unique' => '{field} sudah tersedia.'
                ]
            ],
            'v_nama' => [
                'rules' => 'required',
                'label' => 'nama',
                'errors' => [
                    'required' => '{field} belum disi!',
                ]
            ]
        ]);

        if (!$valid) {
            $msg = [
                'error' => [
                    'v_nim' => $validation->getError('v_nim'),
                    'v_nama' => $validation->getError('v_nama'),
                ]
            ];
        } else {
            $data_mhs = [
                'nim' => $this->request->getPost('v_nim'),
                'nama' => $this->request->getPost('v_nama'),
                'prodi' => $this->request->getPost('v_prodi'),
                'email' => $this->request->getPost('v_email'),
            ];
            $this->mahasiswa_model->insert_datamahasiswa($data_mhs);
            $msg = ['success' => 'Berhasil menambahkan data baru...'];
        }

        echo json_encode($msg);
    }

    public function form_editdata()
    {
    }
}
