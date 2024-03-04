<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: salioudiabate
 * Date: 01/04/2020
 * Time: 11:16
 */

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $this->createAdminUser();
    }

    private function createAdminUser()
    {
        $user = User::create([
            'fullname' => 'Admin TRACEAGRI',
            'phone' => '+225 00000000',
            'username' => 'admin.traceagri',
            'password' => bcrypt('traceagri!!!')
        ]);

        $user->roles()->sync(Role::where('name', 'ADMINISTRATEUR TRACEAGRI')->first()->id);

        $user = User::create([
            'fullname' => 'Admin PLATEFORME',
            'phone' => '+225 01010101',
            'username' => 'admin.plateforme',
            'password' => bcrypt('traceagri!!!')
        ]);

        $user->roles()->sync(Role::where('name', 'ADMINISTRATEUR PLATEFORME')->first()->id);
    }
}
