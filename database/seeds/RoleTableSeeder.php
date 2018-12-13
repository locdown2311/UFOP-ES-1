<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'professor';
        $role_employee->description = 'Permissão de Professor';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'estudante';
        $role_manager->description = 'Permissão de Estudante';
        $role_manager->save();

        $role_admin =  new ROle();
        $role_admin->name = 'administrador';
        $role_admin->description = 'Permissão total';
        $role_admin->save();
    }
}
