<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
    		$this->create('1', 'male','0933456734','Damascus','Ahmad'),
    		$this->create('2', 'male','0996533412','Damascus','Mhd'),
    		$this->create('3', 'male','0933456734','Aleppo','Fayez'),
    		$this->create('4', 'male','0933456734','Aleppo','Rade'),
    		$this->create('5', 'female','0933456734','Hama','Roulla'),
    		$this->create('6', 'female','0933456734','Hama','Rima'),
    		$this->create('7', 'female','0933456734','RifDimasheq','Dana'),
    		$this->create('8', 'female','0933456734','RifDimasheq','Rahaf'),
    		$this->create('9', 'male','0933456734','Quneitra','Khaled'),
    		$this->create('10', 'male','0933456734','Quneitra','Zoher'),
    	];
    	
		DB::table('customers')->insert($customers);
    }

 private function create($id,$gender,$phone,$address,$name)
    {
    	return [
    		'id' => $id,
    		'gender' => $gender,
    		'phone' => $phone,
    		'address' => $address,
    		'name' => $name,

    	];
}
}

