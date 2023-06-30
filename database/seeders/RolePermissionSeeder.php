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
            'direktur',
            'manajer',
            'administrator',
            'karyawan'
        ];

        $permissions = [
            [
                'name' => 'permission: view',
                'alias' => 'Lihat izin akses',
            ],
            [
                'name' => 'permission: view-any',
                'alias' => 'Lihat daftar izin akses',
            ],
            [
                'name' => 'permission: create',
                'alias' => 'Buat izin akses',
            ],
            [
                'name' => 'permission: update',
                'alias' => 'Perbarui izin akses',
            ],
            [
                'name' => 'permission: delete',
                'alias' => 'Hapus izin akses',
            ],
            [
                'name' => 'permission: restore',
                'alias' => 'Mengembalikan izin akses yang dihapus',
            ],
            [
                'name' => 'permission: force-delete',
                'alias' => 'Hapus permanen izin akses',
            ],
            [
                'name' => 'role: view',
                'alias' => 'Lihat batasan akses',
            ],
            [
                'name' => 'role: view-any',
                'alias' => 'Lihat daftar batasan akses',
            ],
            [
                'name' => 'role: create',
                'alias' => 'Buat batasan akses',
            ],
            [
                'name' => 'role: update',
                'alias' => 'Perbarui batasan akses',
            ],
            [
                'name' => 'role: delete',
                'alias' => 'Hapus batasan akses',
            ],
            [
                'name' => 'role: restore',
                'alias' => 'Mengembalikan batasan akses yang dihapus',
            ],
            [
                'name' => 'role: force-delete',
                'alias' => 'Hapus permanen batasan akses',
            ],
            [
                'name' => 'user: view',
                'alias' => 'Lihat data pengguna',
            ],
            [
                'name' => 'user: view-any',
                'alias' => 'Lihat daftar data pengguna',
            ],
            [
                'name' => 'user: create',
                'alias' => 'Buat data pengguna',
            ],
            [
                'name' => 'user: update',
                'alias' => 'Perbarui data pengguna',
            ],
            [
                'name' => 'user: delete',
                'alias' => 'Hapus data pengguna',
            ],
            [
                'name' => 'user: restore',
                'alias' => 'Mengembalikan data pengguna yang dihapus',
            ],
            [
                'name' => 'user: force-delete',
                'alias' => 'Hapus permanen data pengguna',
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
                $roleCreated->syncPermissions(Permission::all());
            }elseif($role=='direktur'){
                $roleCreated->syncPermissions(Permission::where('name','like','user:%')->get());
            }elseif($role=='manajer'){
                $roleCreated->syncPermissions(Permission::where('name','like','user:%')->get());
            }elseif($role=='administrator'){
                $roleCreated->syncPermissions(Permission::where('name','like','user:%')->get());
            }elseif($role=='karyawan'){
                $roleCreated->givePermissionTo(Permission::where('name', 'user: view')->get());
                $roleCreated->givePermissionTo(Permission::where('name', 'user: update')->get());
            }else{
                //
            }
        }
    }
}
