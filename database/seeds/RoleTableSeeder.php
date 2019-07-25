<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'  => "admin",
            'label' => 'Administrador do Sistema => Super User => All Granted'
        ]);

        Role::create([
            'name'  => "viewer",
            'label' => 'Visualizador do Sistema => View'
        ]);

        Role::create([
            'name'  => "editor",
            'label' => 'Editor do Sistema => Update'
        ]);

        Role::create([
            'name'  => "cleaner",
            'label' => 'Limpeza do Sistema => Delete'
        ]);

        Role::create([
            'name'  => "feeder",
            'label' => 'Alimentar o Sistema => View => Edit => Add '
        ]);

        Role::create([
            'name'  => "manager",
            'label' => 'Gerenciar o Sistema => View => Edit => Delete '
        ]);


    }
}
