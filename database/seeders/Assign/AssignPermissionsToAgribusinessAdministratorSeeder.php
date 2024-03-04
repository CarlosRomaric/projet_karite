<?php
namespace Database\Seeders\Assign;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AssignPermissionsToAgribusinessAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'ADMIN PRODUCTEUR LIST', 'ADMIN PRODUCTEUR ADD', 'ADMIN PRODUCTEUR SHOW', 'ADMIN PRODUCTEUR UPDATE', 'ADMIN PRODUCTEUR DELETE',
            'ADMIN IMPORT EXCEL ADD', 'ADMIN EXPORT EXCEL', 'ADMIN TABLEAU DE BORD'
        ];

        foreach ($permissions as $permission) {
            Role::whereName('ADMINISTRATEUR COOPERATIVE')->first()->givePermissionTo(
              Permission::whereName($permission)->first()
            );
        }
    }
}
