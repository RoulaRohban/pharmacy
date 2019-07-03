<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $pharmacist_users =
    }

    private function create($role_id, $user_id)
    {
        return [
            'user_id' => $user_id,
            'role_id' => $role_id
        ];
    }
}
