<?php

use Illuminate\Database\Seeder;
use App\Model\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'  => 'view_action',
            'label' => 'Permissão para Visualizar Conteudo restrito'
        ]);

        Permission::create([
            'name'  => 'update_action',
            'label' => 'Permissão para Editar Conteudo restrito'
        ]);

        Permission::create([
            'name'  => 'delete_action',
            'label' => 'Permissão para Apagar Conteudo restrito'
        ]);

        Permission::create([
            'name'  => 'add_action',
            'label' => 'Permissão para Adicionar conteudo Conteudo restrito/Não restrito'
        ]);

        Permission::create([
            'name'  => 'manager_action',
            'label' => 'Permissão para gerenciar conteudo restrito/Não restrito'
        ]);




    }
}
