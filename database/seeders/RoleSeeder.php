<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create(['name' => 'Admin']);
        $comercial = Role::create(['name' => 'Comercial']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$admin,$comercial]);

        Permission::create(['name' => 'admin.users.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.update'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($admin);

        Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$admin,$comercial]);
        Permission::create(['name' => 'admin.clientes.create'])->syncRoles([$admin,$comercial]);
        Permission::create(['name' => 'admin.clientes.edit'])->syncRoles([$admin,$comercial]);
        Permission::create(['name' => 'admin.clientes.destroy'])->syncRoles([$admin,$comercial]);
    }
}
