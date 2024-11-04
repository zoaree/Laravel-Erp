<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $permissions = [
            'iletisim-tasarim',
            'proje-ekibi',
            'cevre-ekibi',
            'maden-ekibi',
            'idari-isler',
            'muhasebe',
            'satin-alma',
            'gis-ekibi',
            'orman-ekibi',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $roles = [
            'super-admin' => Permission::all(),
            'admin' => Permission::all(),
            'proje-lideri' => Permission::all(),
            'iletisim-tasarim' => ['iletisim-tasarim'],
            'proje-ekibi' => ['proje-ekibi'],
            'cevre-ekibi' => ['cevre-ekibi'],
            'maden-ekibi' => ['maden-ekibi'],
            'idari-isler' => ['idari-isler'],
            'muhasebe' => ['muhasebe'],
            'satin-alma' => ['satin-alma'],
            'gis-ekibi' => ['gis-ekibi'],
            'orman-ekibi' => ['orman-ekibi'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName]);
            $role->givePermissionTo($rolePermissions);
        }

        // Create users
        $users = [
            ['name' => 'Abdulkadir Ünsal', 'email' => 'abdulkadir.unsal@mitto.com.tr', 'password' => Hash::make('sam55sam'), 'role' => 'super-admin'],

        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            $user->assignRole($userData['role']);
        }
    }
}
