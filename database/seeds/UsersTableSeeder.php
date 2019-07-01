<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    private function create($name, $display_name)
    {
    	return [
    		'name' => $name,
    		'display_name' => $display_name
    	];
    }
}
