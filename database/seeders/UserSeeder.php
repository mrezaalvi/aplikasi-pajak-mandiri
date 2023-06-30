<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super User',
                'username' => 'superuser',
                'email' => 'mrezaalvi@gmail.com',
                'password' => 'Muhammad_570M',
                'role' => 'superuser',
            ],
            [
                'name' => 'Direktur',
                'username' => 'direktur',
                'email' => 'direktur@paman-bks.com',
                'password' => 'direktur',
                'role' => 'direktur',
            ],
            [
                'name' => 'Manajer',
                'username' => 'manajer',
                'email' => 'manajer@paman-bks.com',
                'password' => 'manajer',
                'role' => 'manajer',
            ],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@paman-bks.com',
                'password' => 'admin1234',
                'role' => 'administrator',
            ],
        ];

        User::truncate();






        foreach($users as $user){
            $currentUser = User::firstOrCreate([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            $currentUser->assignRole($user['role']);
        }
        
    }
}
