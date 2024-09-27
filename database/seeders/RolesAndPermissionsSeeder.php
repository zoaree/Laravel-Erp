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
            ['name' => 'Abdulkadir Ünsal', 'email' => 'abdulkadir.unsal@domain.com', 'password' => Hash::make('1'), 'role' => 'super-admin'],
            ['name' => 'Super Admin 2', 'email' => 'superadmin2@domain.com', 'password' => Hash::make('1'), 'role' => 'super-admin'],

            ['name' => 'Admin User 1', 'email' => 'admin1@domain.com', 'password' => Hash::make('1'), 'role' => 'admin'],
            ['name' => 'Admin User 2', 'email' => 'admin2@domain.com', 'password' => Hash::make('1'), 'role' => 'admin'],

            ['name' => 'Proje Lideri 1', 'email' => 'proje.lideri1@domain.com', 'password' => Hash::make('1'), 'role' => 'proje-lideri'],
            ['name' => 'Proje Lideri 2', 'email' => 'proje.lideri2@domain.com', 'password' => Hash::make('1'), 'role' => 'proje-lideri'],

            ['name' => 'İletişim Tasarım 1', 'email' => 'iletisim.tasarim1@domain.com', 'password' => Hash::make('1'), 'role' => 'iletisim-tasarim'],
            ['name' => 'İletişim Tasarım 2', 'email' => 'iletisim.tasarim2@domain.com', 'password' => Hash::make('1'), 'role' => 'iletisim-tasarim'],

            ['name' => 'Proje Ekibi 1', 'email' => 'proje.ekibi1@domain.com', 'password' => Hash::make('1'), 'role' => 'proje-ekibi'],
            ['name' => 'Proje Ekibi 2', 'email' => 'proje.ekibi2@domain.com', 'password' => Hash::make('1'), 'role' => 'proje-ekibi'],

            ['name' => 'Çevre Ekibi 1', 'email' => 'cevre.ekibi1@domain.com', 'password' => Hash::make('1'), 'role' => 'cevre-ekibi'],
            ['name' => 'Çevre Ekibi 2', 'email' => 'cevre.ekibi2@domain.com', 'password' => Hash::make('1'), 'role' => 'cevre-ekibi'],

            ['name' => 'Maden Ekibi 1', 'email' => 'maden.ekibi1@domain.com', 'password' => Hash::make('1'), 'role' => 'maden-ekibi'],
            ['name' => 'Maden Ekibi 2', 'email' => 'maden.ekibi2@domain.com', 'password' => Hash::make('1'), 'role' => 'maden-ekibi'],

            ['name' => 'İdari İşler 1', 'email' => 'idari.isler1@domain.com', 'password' => Hash::make('1'), 'role' => 'idari-isler'],
            ['name' => 'İdari İşler 2', 'email' => 'idari.isler2@domain.com', 'password' => Hash::make('1'), 'role' => 'idari-isler'],

            ['name' => 'Muhasebe 1', 'email' => 'muhasebe1@domain.com', 'password' => Hash::make('1'), 'role' => 'muhasebe'],
            ['name' => 'Muhasebe 2', 'email' => 'muhasebe2@domain.com', 'password' => Hash::make('1'), 'role' => 'muhasebe'],

            ['name' => 'Satın Alma 1', 'email' => 'satin.alma1@domain.com', 'password' => Hash::make('1'), 'role' => 'satin-alma'],
            ['name' => 'Satın Alma 2', 'email' => 'satin.alma2@domain.com', 'password' => Hash::make('1'), 'role' => 'satin-alma'],

            ['name' => 'GIS Ekibi 1', 'email' => 'gis.ekibi1@domain.com', 'password' => Hash::make('1'), 'role' => 'gis-ekibi'],
            ['name' => 'GIS Ekibi 2', 'email' => 'gis.ekibi2@domain.com', 'password' => Hash::make('1'), 'role' => 'gis-ekibi'],

            ['name' => 'Orman Ekibi 1', 'email' => 'orman.ekibi1@domain.com', 'password' => Hash::make('1'), 'role' => 'orman-ekibi'],
            ['name' => 'Orman Ekibi 2', 'email' => 'orman.ekibi2@domain.com', 'password' => Hash::make('1'), 'role' => 'orman-ekibi'],
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
