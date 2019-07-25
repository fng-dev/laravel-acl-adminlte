<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\RoteValidationFormRequest;
use App\Model\Permission;
use App\Model\PermissionRole;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $role;
    private $user;

    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    public function index()
    {
        $this->authorize('manager_action');

        $roles = $this->role->all();

        return view('painel.role.index', compact('roles'));

    }

    public function config($id)
    {
        $this->authorize('manager_action');

        $role = $this->role->find($id);

        $permissions = Permission::with('roles')->get();

        return view('painel.role.permission', compact('role','permissions'));

    }

    public function salvarConfig($id, Request $request, PermissionRole $pivot)
    {
        $this->authorize('manager_action');

        $requests = $request->all();

        DB::beginTransaction();

        $validate = false;

        if (isset($request['permission'])) {

            $permissions = $request['permission'];

            $pivot->where('role_id', $id)->delete();

            foreach ($permissions as $idPermission) {

                $validate = $pivot->create([
                    'permission_id' => $idPermission,
                    'role_id' => $id
                ]);
            }

        } else {

            $validate = $pivot->where('role_id', $id)->delete();

        }

        if($validate){
            DB::commit();
            return redirect()
                ->route('painel.role.config')
                ->with('success','Role adicionada com sucesso');
        }else{
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error','Erro ao adicionar role');
        }
    }

    public function novoRole()
    {
        $this->authorize('manager_action');
        return view('painel.role.novo');
    }

    public function cadRole(RoteValidationFormRequest $request)
    {
        $this->authorize('manager_action');

        DB::beginTransaction();

        $confirm = $this->role->create([
            "name" => $request->name,
            "label" => $request->label
        ]);

        if($confirm){
            DB::commit();
            return redirect()
                        ->route('painel.role.config')
                        ->with('success', 'Role adicionada com sucesso');
        }else{
            DB::rollBack();
            return redirect()
                        ->back()
                        ->with('error','Falha ao adicionar a Role');
        }
    }
}
