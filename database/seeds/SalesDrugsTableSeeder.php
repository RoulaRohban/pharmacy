<?php

use Illuminate\Database\Seeder;

class SalesDrugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
     {
        $sales_drugs = [
    		$this->create('1', '1','3','1'),
    		$this->create('2', '2','1','5'),
    		$this->create('3', '3','30','1'),
    		$this->create('4', '4','19','4'),
    		$this->create('5', '5','20','2'),
    		$this->create('6', '6','2','4'),
    		$this->create('7', '7','4','3'),
    		$this->create('8', '8','10','2'),
    		$this->create('9', '9','6','6'),
    		$this->create('10', '10','8','9'),
    		$this->create('11', '11','2','8'),
    		$this->create('12', '12','17','5'),
    		$this->create('13', '13','18','4'),
    		$this->create('14', '14','11','3'),
    		$this->create('15', '15','12','5'),
    		$this->create('16', '16','25','4'),
    		$this->create('17', '17','22','7'),
    		$this->create('18', '18','28','2'),
    		$this->create('19', '19','8','3'),
    		$this->create('20', '20','19','1'),
    	];
    	
		DB::table('sales_drugs')->insert($sales_drugs);
    }
    private function create($id, $sale_id,$drug_id,$amount)
    {
    	return [
    		'id' => $id,
    		'sale_id' => $sale_id,
    		'drug_id' => $drug_id,
    		'amount' => $amount,

    	];
}
}
