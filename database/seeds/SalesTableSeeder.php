<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [
    		$this->create('1','2019-01-21' ,'1'),
    		$this->create('2', '2019-01-21','2'),
    		$this->create('3', '2019-02-15','3'),
    		$this->create('4','2019-02-15','4'),
    		$this->create('5','2019-03-03','5'),
    		$this->create('6', '2019-03-03','6'),
    		$this->create('7','2019-01-14','7'),
    		$this->create('8','2019-02-11','8'),
    		$this->create('9', '2019-02-25','9'),
    		$this->create('10','2019-02-25','10'),
        	$this->create('11','2019-02-11','1'),
    		$this->create('12', '2019-02-11','2'),
    		$this->create('13', '2019-02-15','3'),
    		$this->create('14','2019-02-15','4'),
    		$this->create('15','2019-03-03','5'),
    		$this->create('16', '2019-03-03','6'),
    		$this->create('17','2019-02-11','7'),
    		$this->create('18','2019-01-14','8'),
    		$this->create('19', '2019-02-25','9'),
    		$this->create('20','2019-02-11','10'),
    	];
    	
		DB::table('sales')->insert($sales);
    }

     private function create($id, $created_at,$customer_id)
    {
    	return [
    		'id' => $id,
    		'created_at' => $created_at,
            'customer_id' => $customer_id,


    	];
}
}
