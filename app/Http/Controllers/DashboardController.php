<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $content = Content::first();

        return view('admin.dashboard.index', [
            'content' => $content,
        ]);
    }
}
