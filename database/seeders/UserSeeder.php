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
            ]
        ];

        User::truncate();

        foreach($users as $user){
            $currentUser = User::firstOrCreate([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
            if(!$currentUser->hasRole(Role::all())){
                $currentUser->Role($user['role']);
            }
        }
        
    }
}
