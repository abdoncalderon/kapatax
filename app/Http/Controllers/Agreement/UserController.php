<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = menu_access_users('production.workbook');
        return view('agreement.users.index', compact('users'));
    }
}
