<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $projectUsers = menu_access_users('production.workbook');
        return view('workbooks.users.index', compact('projectUsers'));
    }
}
