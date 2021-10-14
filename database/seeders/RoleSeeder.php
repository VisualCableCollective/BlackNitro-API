<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foundAdminRole = Role::where('name', '=', 'Admin')->first();
        if (!$foundAdminRole) {
            Role::create([
                'name' => 'Admin',
                'creator_id' => 0
            ]);
        }
    }
}
