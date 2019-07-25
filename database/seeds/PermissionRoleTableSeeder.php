<?php

use Illuminate\Database\Seeder;
use App\Model\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //PERMISSÕES PARA VISUALIZAR

        PermissionRole::create([
            'permission_id' => 1,
            'role_id' => 2
        ]);

        //PERMISSÕES PARA EDITAR

        PermissionRole::create([
            'permission_id' => 1,
            'role_id' => 3
        ]);

        PermissionRole::create([
            'permission_id' => 2,
            'role_id' => 3
        ]);

        //PERMISSAO PARA APAGAR

        PermissionRole::create([
            'permission_id' => 1,
            'role_id' => 4
        ]);

        PermissionRole::create([
            'permission_id' => 3,
            'role_id' => 4
        ]);

        //PERMISSAO PARA VER/EDITAR/ADICIONAR/


        PermissionRole::create([
            'permission_id' => 1,
            'role_id' => 5
        ]);

        PermissionRole::create([
            'permission_id' => 2,
            'role_id' => 5
        ]);

        PermissionRole::create([
            'permission_id' => 4,
            'role_id' => 5
        ]);

        //PERMISSAO PARA VER/EDITAR/APAGAR/ADICIONAR

        PermissionRole::create([
            'permission_id' => 1,
            'role_id' => 6
        ]);

        PermissionRole::create([
            'permission_id' => 2,
            'role_id' => 6
        ]);

        PermissionRole::create([
            'permission_id' => 3,
            'role_id' => 6
        ]);

        PermissionRole::create([
            'permission_id' => 4,
            'role_id' => 6
        ]);

        PermissionRole::create([
            'permission_id' => 5,
            'role_id' => 6
        ]);




    }
}
