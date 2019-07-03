<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pharmacist_user = User::where('email', 'roula.rohban@gmail.com')->first();
        $general_user_1 = User::where('email', 'fayez.ghazzawi@hotmail.com')->first();
        $general_user_2 = User::where('email', 'abdo.abdo@gmail.com')->first();

        $pharmacist_role = Role::where('name', 'pharmacist')->first();
        $user_role = Role::where('name', 'user')->first();

        $pivot = [
            $this->create($pharmacist_role->id, $pharmacist_user->id),
            $this->create($user_role->id, $general_user_1->id),
            $this->create($user_role->id, $general_user_2->id),
        ];

        DB::table('role_user')->insert($pivot);
    }

    private function create($role_id, $user_id)
    {
        return [
            'user_id' => $user_id,
            'role_id' => $role_id
        ];
    }
}
