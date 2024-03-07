<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'ADMIN PERMISSION LIST', 'ADMIN PERMISSION ADD', 'ADMIN PERMISSION UPDATE', 'ADMIN PERMISSION DELETE',
            'ADMIN ROLE LIST', 'ADMIN ROLE ADD', 'ADMIN ROLE UPDATE', 'ADMIN ROLE DELETE', 'ADMIN ROLE ASSIGN PERMISSION',
            'ADMIN USER LIST', 'ADMIN USER ADD', 'ADMIN USER UPDATE', 'ADMIN USER DELETE', 'ADMIN USER ASSIGN ROLE',
            'ADMIN TABLEAU DE BORD',
            'ADMIN IMPORT EXCEL ADD', 'ADMIN EXPORT EXCEL',
            'MOBILE SYNCHRONISATIONS'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ], [
                'name' => $permission
            ]);
        }
    }
}
