<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            $this->create('Roula', 'roula.rohban@gmail.com', 'secret'),
            $this->create('Fayez', 'fayez.ghazzawi@hotmail.com', 'secret'),
            $this->create('Abdo', 'abdo.abdo@gmail.com', 'secret'),
        ];

        DB::table('users')->insert($users);
    }

    private function create($name, $email, $password)
    {
        return [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
    }
}
