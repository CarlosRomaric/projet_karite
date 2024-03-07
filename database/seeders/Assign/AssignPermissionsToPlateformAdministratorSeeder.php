<?php
namespace Database\Seeders\Assign;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AssignPermissionsToPlateformAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'ADMIN ROLE LIST', 'ADMIN ROLE ADD', 'ADMIN ROLE UPDATE', 'ADMIN ROLE DELETE', 'ADMIN ROLE ASSIGN PERMISSION',
            'ADMIN USER LIST', 'ADMIN USER ADD', 'ADMIN USER UPDATE', 'ADMIN USER DELETE', 'ADMIN USER ASSIGN ROLE',
            'ADMIN PERMISSION LIST', 'ADMIN PERMISSION ADD', 'ADMIN PERMISSION UPDATE', 'ADMIN PERMISSION DELETE',
            'ADMIN IMPORT EXCEL ADD', 'ADMIN EXPORT EXCEL', 'ADMIN TABLEAU DE BORD'
        ];

        foreach ($permissions as $permission) {
            Role::whereName('ADMINISTRATEUR PLATEFORME')->first()->givePermissionTo(
              Permission::whereName($permission)->first()
            );
        }
    }
}
