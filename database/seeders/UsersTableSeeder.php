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
            'fullname' => 'Admin KARITE',
            'phone' => '+225 00000000',
            'username' => 'admin.karite',
            'password' => bcrypt('kariteweb!!!')
        ]);

        $user->roles()->sync(Role::where('name', 'ADMINISTRATEUR COOPERATIVE')->first()->id);

        $user = User::create([
            'fullname' => 'Admin PLATEFORME',
            'phone' => '+225 01010101',
            'username' => 'admin.plateforme',
            'password' => bcrypt('kariteweb!!!')
        ]);

        $user->roles()->sync(Role::where('name', 'ADMINISTRATEUR PLATEFORME')->first()->id);

        $user = User::create([
            'fullname' => 'Agent COLLECT',
            'phone' => '0778546246',
            'username' => 'agent.collect',
            'password' => bcrypt('kariteweb!!!')
        ]);

        $user->roles()->sync(Role::where('name', 'MOBILE')->first()->id);
    }
}
