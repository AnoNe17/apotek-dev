<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sidebar = 'dashboard';
        return view('admin.dashboard.index', [
            'sidebar' => $sidebar
        ]);
    }
}
