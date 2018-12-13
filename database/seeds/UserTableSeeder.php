<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_teacher = Role::where('name', 'professor')->first();
        $role_student  = Role::where('name', 'estudante')->first();
        $role_admin = Role::where('name','administrador')->first();

        $employee = new User();
        $employee->name = 'Igor Carvalho';
        $employee->matricula = '15.1.8382';
        $employee->email = 'igor2396@outlook.com';
        $employee->password = bcrypt('Igorcg23.');
        $employee->save();
        $employee->roles()->attach($role_admin);

        $professor = new User();
        $professor->name = 'Professor Teste';
        $professor->matricula = 'Professor';
        $professor->email = 'professor@teste.com';
        $professor->password = bcrypt('teste');
        $professor->save();
        $professor->roles()->attach($role_teacher);


        $alunoexemplo = new User();
        $alunoexemplo->name = 'Aluno Teste';
        $alunoexemplo->matricula = '10.0.0000';
        $alunoexemplo->email = 'alunoteste@teste.com';
        $alunoexemplo->password = bcrypt('teste');
        $alunoexemplo->save();
        $alunoexemplo->roles()->attach($role_student);
    }
}
