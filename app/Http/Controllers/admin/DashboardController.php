<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class DashboardController extends Controller
{
    public function index () {
        return view('admin/pages/dashboard/index',[
            'titlePage' => 'Trang Tong Quan'
        ]);
    }   
}
