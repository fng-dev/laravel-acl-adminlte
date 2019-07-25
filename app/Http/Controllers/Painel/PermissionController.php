<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\RoteValidationFormRequest;
use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $this->authorize('manager_action');

        $permissions = $this->permission->all();

        return view('painel.permission.index', compact('permissions'));
    }

    public function novaPermission()
    {

        $this->authorize('manager_action');

        return view('painel.permission.novo');

    }

    public function cadPermission(RoteValidationFormRequest $request)
    {

        $this->authorize('manager_action');

        DB::beginTransaction();

        $confirm = $this->permission->create([
            "name" => $request->name,
            "label" => $request->label
        ]);

        if($confirm){
            DB::commit();
            return redirect()
                ->route('painel.permissao')
                ->with('success', 'Permissão adicionada com sucesso');
        }else{
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error','Falha ao adicionar permissão');
        }

    }

}
