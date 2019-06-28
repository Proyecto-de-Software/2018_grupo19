<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Listado de roles
        $admin = Role::create(['name' => 'Administrador']);
        $equip = Role::create(['name' => 'Equipo de Guardia']);
        $atenc = Role::create(['name' => 'Personal de Atencion']);

        //Listado de permisos
        Permission::create(['name' => 'user_index'])->assignRole($admin);
        Permission::create(['name' => 'user_show'])->assignRole($admin);
        Permission::create(['name' => 'user_new'])->assignRole($admin);
        Permission::create(['name' => 'user_update'])->assignRole($admin);
        Permission::create(['name' => 'user_delete'])->assignRole($admin);
        Permission::create(['name' => 'consulta_index'])->assignRole($admin);
        Permission::create(['name' => 'consulta_show'])->assignRole($admin);
        Permission::create(['name' => 'consulta_new'])->assignRole($admin);
        Permission::create(['name' => 'consulta_update'])->assignRole($admin);
        Permission::create(['name' => 'consulta_delete'])->assignRole($admin);
        Permission::create(['name' => 'paciente_index'])->assignRole($admin);
        Permission::create(['name' => 'paciente_show'])->assignRole($admin);
        Permission::create(['name' => 'paciente_new'])->assignRole($admin);
        Permission::create(['name' => 'paciente_update'])->assignRole($admin);
        Permission::create(['name' => 'paciente_delete'])->assignRole($admin);
        Permission::create(['name' => 'config_index'])->assignRole($admin);
        Permission::create(['name' => 'config_update'])->assignRole($admin);
        Permission::create(['name' => 'institucion_new'])->assignRole($admin);
        Permission::create(['name' => 'institucion_update'])->assignRole($admin);


        //Permisos del equipo de guardia
        $equip->givePermissionTo('consulta_index', 'consulta_show', 'consulta_new', 'consulta_update', 'consulta_delete');
        $equip->givePermissionTo('paciente_index', 'paciente_show', 'paciente_new', 'paciente_update');

        //Permisos del personal de atencion
        $atenc->givePermissionTo('paciente_index', 'paciente_show', 'paciente_new', 'paciente_update');
        //  $atenc->givePermissionTo('consulta_index', 'consulta_show');
        $atenc->givePermissionTo('user_index', 'user_show');
    }
}
