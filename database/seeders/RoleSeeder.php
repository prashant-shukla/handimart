<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the roles table with the IDs that match the users.role_id
     * column and the hardcoded <option value="..."> in the create user form.
     *
     * ID map:
     *   1 → Admin (set on admin user directly, not in the form)
     *   2 → Craftsman
     *   3 → Manufacturer
     *   4 → Exporters
     *   5 → Designer
     *   6 → Painter
     *   7 → Clients
     *   8 → Photographers
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => 'Admin',         'guard_name' => 'web'],
            ['id' => 2, 'name' => 'Craftsman',      'guard_name' => 'web'],
            ['id' => 3, 'name' => 'Manufacturer',   'guard_name' => 'web'],
            ['id' => 4, 'name' => 'Exporters',      'guard_name' => 'web'],
            ['id' => 5, 'name' => 'Designer',       'guard_name' => 'web'],
            ['id' => 6, 'name' => 'Painter',        'guard_name' => 'web'],
            ['id' => 7, 'name' => 'Clients',        'guard_name' => 'web'],
            ['id' => 8, 'name' => 'Photographers',  'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['id' => $role['id']],
                array_merge($role, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
