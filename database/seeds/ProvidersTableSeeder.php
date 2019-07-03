<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = [
    		$this->create('1', 'Ahmad','Unipharma','Damascus','Babmsalla','0933456734'),
    		$this->create('2', 'Fayez','UltraMedica','Damascus','ReknAlden','0996533412'),
    		$this->create('3', 'Mhd','Unipharma','Aleppo','Shaalan','0933456734'),
    		$this->create('4', 'Ibrahim','Unipharma','Aleppo','Babmsalla','0933456734'),
    		$this->create('5', 'Rami','UltraMedica','Hama','Shaalan','0933456734'),
    		$this->create('6', 'Omar','Unipharma','Hama','Babmsalla','0933456734'),
    		$this->create('7', 'Khaled','UltraMedica','RifDimasheq','Mazzeh','0933456734'),
    		$this->create('8', 'Khalel','Unipharma','RifDimasheq','Mazzeh','0933456734'),
    		$this->create('9', 'Raed','UltraMedica','Quneitra','AlBaath','0933456734'),
    		$this->create('10', 'Anas','Unipharma','Quneitra','AlBaath','0933456734'),
    	];
    	
		DB::table('providers')->insert($providers);
    }

    private function create($id, $title,$manager,$city,$address,$phone)
    {
    	return [
    		'id' => $id,
    		'title' => $title,
    		'manager' => $manager,
    		'city' => $city,
    		'address' => $address,
    		'phone' => $phone,

    	];
}
}
