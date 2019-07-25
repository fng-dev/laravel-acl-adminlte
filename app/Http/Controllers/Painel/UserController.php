<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\UserValidationFormRequest;
use App\Model\Role;
use App\Model\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function listaUsuarios()
    {

        $users = $this->user->all();

        $this->authorize('view_action');

        return view('painel.usuario.lista', compact('users'));
    }

    public function novoUsuario(){

        $this->authorize('add_action');

        return view('painel.usuario.novo');

    }

    public function cadUsuario(UserValidationFormRequest $request)
    {

        $this->authorize('add_action');

        if($this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]))
            return redirect()
                ->route('painel.usuario.novo')
                ->with('success' , 'Usuario Criado com sucesso!');

        return redirect()
            ->route('painel.usuario')
            ->with('error','Falha ao criar usuario');
    }

    public function configUsuario()
    {

        $this->authorize('manager_action');

        $users = $this->user->all();

        $roles = $this->role->all();

        return view('painel.usuario.config', compact('users', 'roles'));

    }

    public function deleteUsuario($id)
    {

        $this->authorize('delete_action');

        if($this->user->find($id)->delete())
            return redirect()
                ->route('painel.usuario')
                ->with('success' , 'Usuario Excluido com sucesso!');

        return redirect()
            ->route('painel.usuario')
            ->with('error','Falha ao excluir usuario');
    }

    public function formUpdateUsuario($id)
    {
        $this->authorize('update_action');

        $user = $this->user->find($id);
        return view('painel.usuario.update', compact('user'));
    }

    public function updateUsuario($id, Request $request)
    {

        $this->authorize('update_action');

        $user = $this->user->find($id);

        if($request->password != null)
            $user->password = bcrypt($request->password);

        $user->name = $request->name;

        if($user->save())
            return redirect()
                ->route('painel.usuario')
                ->with('success', 'Registro alterado com sucesso');

        return redirect()
                ->back()
                ->with('error', 'Falha ao atualizar o registro');
    }

    public function role($id)
    {

        $this->authorize('manager_action');

        $user = $this->user->find($id);

        $roles = $this->role->all();

        return view('painel.usuario.role', compact('user', 'roles'));

    }

    public function roleAction($id, Request $request, RoleUser $pivot)
    {
        $this->authorize('manager_action');

        $requests = $request->all();

        DB::beginTransaction();

        $validate = false;

        if(auth()->user()->isAdmin()) {

            if (isset($requests['role'])) {

                $roles = $requests['role'];

                $pivot->where('user_id', $id)->delete();

                foreach ($roles as $cargo) {

                    $validate = $pivot->create([
                        'user_id' => $id,
                        'role_id' => $cargo
                    ]);
                }

            } else {

                $validate = $pivot->where('user_id', $id)->delete();

            }

        }else{

            $user = $this->user->find($id);

            $roles = $user->roles;

            if($roles->contains('name', 'admin'))
                $this->authorize('super_user');

            if(isset($requests['role'])) {

                if (in_array('1', $requests['role']))
                    $this->authorize('super_user');

                $roles = $requests['role'];

                $pivot->where('user_id', $id)->delete();

                foreach ($roles as $cargo) {

                    $validate = $pivot->create([
                        'user_id' => $id,
                        'role_id' => $cargo
                    ]);
                }

            }else{

                $validate = $pivot->where('user_id', $id)->delete();

            }

        }

        if($validate){
            DB::commit();
            return redirect()
                ->route('painel.usuario.config')
                ->with('success','Role adicionada com sucesso');
        }else{
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error','Erro ao adicionar role');
        }


    }



}
