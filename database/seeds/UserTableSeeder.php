<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'User Viewer',
            'email' => 'viewer@viewer.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'User Editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'User Cleaner',
            'email' => 'cleaner@cleaner.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'User Feeder',
            'email' => 'feeder@feeder.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'User Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('12345678')
        ]);


    }
}
