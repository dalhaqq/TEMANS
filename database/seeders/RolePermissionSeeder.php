<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners = [
            'logout.perform',
            'operators.index',
            'operators.create',
            'operators.store',
            'operators.edit',
            'operators.update',
            'operators.destroy',
            'stands.index',
            'stands.create',
            'stands.store',
            'stands.edit',
            'stands.update',
            'stands.destroy'
        ];
        $operators = [
            'logout.perform',
            'stands.index',
            'stands.create',
            'stands.store',
            'stands.edit',
            'stands.update',
            'stands.destroy'
        ];
        $tenants = [
            'logout.perform',
            'stands.list',
            'stands.show',
        ];
        $owner = Role::where('name', 'owner')->first();
        foreach ($owners as $permission) {
            $permission = Permission::where('name', $permission)->first();
            $owner->givePermissionTo($permission);
        }
        $operator = Role::where('name', 'operator')->first();
        foreach ($operators as $permission) {
            $permission = Permission::where('name', $permission)->first();
            $operator->givePermissionTo($permission);
        }
        $tenant = Role::where('name', 'tenant')->first();
        foreach ($tenants as $permission) {
            $permission = Permission::where('name', $permission)->first();
            $tenant->givePermissionTo($permission);
        }
    }
}
