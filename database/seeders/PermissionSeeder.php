<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'logout.perform',
            'operators.index',
            'operators.create',
            'operators.store',
            'operators.edit',
            'operators.update',
            'operators.destroy',
            'stands.index',
            'stands.list',
            'stands.create',
            'stands.store',
            'stands.show',
            'stands.edit',
            'stands.update',
            'stands.destroy'
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
