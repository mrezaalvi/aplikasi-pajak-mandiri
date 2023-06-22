<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $roles = [
            'superuser',
            'pimpinan',
            'admin',
            'operator',
        ];

        $permissions = [
            [
                'name' => 'permission: view',
                'alias' => '',
            ],
            [
                'name' => 'permission: view-any',
                'alias' => '',
            ],
            [
                'name' => 'permission: create',
                'alias' => '',
            ],
            [
                'name' => 'permission: update',
                'alias' => '',
            ],
            [
                'name' => 'permission: delete',
                'alias' => '',
            ],
            [
                'name' => 'permission: restore',
                'alias' => '',
            ],
            [
                'name' => 'permission: force-delete',
                'alias' => '',
            ],
            [
                'name' => 'role: view',
                'alias' => '',
            ],
            [
                'name' => 'role: view-any',
                'alias' => '',
            ],
            [
                'name' => 'role: create',
                'alias' => '',
            ],
            [
                'name' => 'role: update',
                'alias' => '',
            ],
            [
                'name' => 'role: delete',
                'alias' => '',
            ],
            [
                'name' => 'role: restore',
                'alias' => '',
            ],
            [
                'name' => 'role: force-delete',
                'alias' => '',
            ],
            [
                'name' => 'user: view',
                'alias' => '',
            ],
            [
                'name' => 'user: view-any',
                'alias' => '',
            ],
            [
                'name' => 'user: create',
                'alias' => '',
            ],
            [
                'name' => 'user: update',
                'alias' => '',
            ],
            [
                'name' => 'user: delete',
                'alias' => '',
            ],
            [
                'name' => 'user: restore',
                'alias' => '',
            ],
            [
                'name' => 'user: force-delete',
                'alias' => '',
            ],
        ];

       

        foreach($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'alias' => $permission['alias'],
            ]);
        }

        
        
        foreach($roles as $role){
            $roleCreated = Role::firstOrCreate([
                'name' => $role,
            ]);

            if($role=='superuser'){
                $roleCreated->givePermissionTo(Permission::all());
            }elseif($role=='admin'){
                $roleCreated->givePermissionTo(Permission::where('name','like','user:%'));
            }else{
                //
            }
        }
    }
}
