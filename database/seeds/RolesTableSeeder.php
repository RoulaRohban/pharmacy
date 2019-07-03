<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		$this->create('pharmacist', 'Pharmacist'),
    		$this->create('user', 'User'),
    	];
    	
		DB::table('roles')->insert($roles);
    }

    private function create($name, $display_name)
    {
    	return [
    		'name' => $name,
    		'display_name' => $display_name
    	];
    }
}
