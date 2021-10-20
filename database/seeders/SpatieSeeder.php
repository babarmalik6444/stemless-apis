<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'name' => 'vendor',
            'guard_name' => 'vendor'
        ];
        DB::table('roles')->insert($role);

        $permissions = [
            [
                'name' => 'user_create',
                'guard_name' => 'user_create'
            ],
            [
                'name' => 'user_edit',
                'guard_name' => 'user_edit'
            ]
        ];
        DB::table('permissions')->insert($permissions);

        $modelHasRole = [
            [
                'role_id' => '1',
                'model_type' => 'App\Models\User',
                'model_id' => '1'
            ]
        ];
        DB::table('model_has_roles')->insert($modelHasRole);

        $roleHasPermission = [
            [
                'permission_id' => '1',
                'role_id' => '1'
            ]
        ];
        DB::table('role_has_permissions')->insert($roleHasPermission);
    }
}
