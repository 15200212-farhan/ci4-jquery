<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $data['description'] = 'Crud codeigniter4 and jquery';
        $data['author'] = 'mas tamvan';
        $data['title'] = 'Home - dashboard';

        return view('admin/dashboard', $data);
    }
}
