<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create(
            [
                'name' => 'Abdalhaqq Muhammad Saih',
                'username' => 'saih',
                'email' => 'abdalhaqq.saih@mhs.unsoed.ac.id',
                'password' => 'abdalhaqqms'
            ]
        );
        $user2 = User::create(
            [
                'name' => 'Maria Ulfa Chasanah',
                'username' => 'maria',
                'email' => 'maria.chasanah@mhs.unsoed.ac.id',
                'password' => 'mariauc'
            ]
        );
        $user3 = User::create(
            [
                'name' => 'Delvi Fitri Assary',
                'username' => 'delvi',
                'email' => 'delvi.assary@mhs.unsoed.ac.id',
                'password' => 'delvifa'
            ]
        );
        $owner = Role::where('name', 'owner')->first();
        $operator = Role::where('name', 'operator')->first();
        $tenant = Role::where('name', 'tenant')->first();

        $user1->assignRole($owner);
        $user2->assignRole($operator);
        $user3->assignRole($tenant);
    }
}
