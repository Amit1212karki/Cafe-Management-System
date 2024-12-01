<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function adminManagerIndex()
    {
        return view('dashboard.pages.admin.manager.index');

    }
    public function adminManagerCreate()
    {
        return view('dashboard.pages.admin.manager.add');
    }
    public function adminManagerEdit()
    {
        return view('dashboard.pages.admin.manager.edit');
    }
   
}
