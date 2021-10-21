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
        $super = Role::create(['name' => 'Super']);
        $admin = Role::create(['name' => 'Admin']);
        $comercial = Role::create(['name' => 'Comercial']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$super,$admin,$comercial]);

        Permission::create(['name' => 'super.users.index'])->assignRole($super);
        Permission::create(['name' => 'super.users.create'])->assignRole($super);
        Permission::create(['name' => 'super.users.edit'])->assignRole($super);
        Permission::create(['name' => 'super.users.update'])->assignRole($super);
        Permission::create(['name' => 'super.users.destroy'])->assignRole($super);

        Permission::create(['name' => 'super.empresas.index'])->assignRole($super);
        Permission::create(['name' => 'super.empresas.create'])->assignRole($super);
        Permission::create(['name' => 'super.empresas.edit'])->assignRole($super);
        Permission::create(['name' => 'super.empresas.destroy'])->assignRole($super);
 
        Permission::create(['name' => 'admin.users.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($admin);

        Permission::create(['name' => 'admin.products.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.products.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.products.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.products.destroy'])->assignRole($admin);
    }
}
