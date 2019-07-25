<?php

namespace App\Http\Controllers\Painel;

use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function index()
    {
        $permissions = Permission::with('roles')->get();

        return view('painel.index', compact('permissions'));
    }
}
