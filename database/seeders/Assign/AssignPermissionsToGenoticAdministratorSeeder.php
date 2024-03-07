<?php
namespace Database\Seeders\Assign;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AssignPermissionsToGenoticAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'ADMIN IMPORT EXCEL ADD', 'ADMIN EXPORT EXCEL',
            'ADMIN TABLEAU DE BORD'
        ];

        foreach ($permissions as $permission) {
            Role::whereName('ADMINISTRATEUR GENOTIC')->first()->givePermissionTo(
              Permission::whereName($permission)->first()
            );
        }
    }
}
