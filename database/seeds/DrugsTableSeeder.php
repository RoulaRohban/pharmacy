<?php

use Illuminate\Database\Seeder;

class DrugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drugs = [
    		$this->create('1', 'Gliptin','1','1','Capsule','500.00','4','300.00','2019-01-14','2018-01-14','3'),
    		$this->create('2', 'Glyfree','1','1','Capsule','500.00','5','300.00','2019-01-14','2018-01-14','3'),
    		$this->create('3', 'Metagliptin','1','1','Capsule','200.00','2','100.00','2019-01-14','2018-01-14','3'),
    		$this->create('4', 'Metformine','1','2','Capsule','600.00','8','400.00','2019-01-14','2018-01-14','5'),
    		$this->create('5', 'Amlodipine','1','2','Capsule','200.00','20','100.00','2019-01-14','2018-01-14','5'),
    		$this->create('6', 'Bizocand','2','2','Capsule','300.00','30','200.00','2019-03-02','2017-03-02','5'),
    		$this->create('7', 'Blanicard','2','2','Capsule','200.00','100','100.00','2019-03-02','2017-03-02','5'),
    		$this->create('8', 'Crandozix','2','2','Suspension','900.00','200','600.00','2019-03-02','2017-03-02','5'),
    		$this->create('9', 'Londalop','2','2','Suspension','900.00','9','600.00','2019-03-02','2017-03-02','5'),
    		$this->create('10', 'Restopril','2','2','Suspension','800.00','2','500.00','2019-03-02','2017-03-02','7'),
    		$this->create('11', 'Tri-Pland ','3','2','Suspension','800.00','8','600.00','2019-02-25','2018-02-25','7'),
    		$this->create('12', 'Flancogyl','3','3','Suspension','200.00','70','100.00','2019-02-25','2018-02-25','7'),
    		$this->create('13', 'Lenam','3','3','Suspension','200.00','20','100.00','2019-02-25','2018-02-25','7'),
    		$this->create('14', 'Spiritex','3','3','Suspension','500.00','1','300.00','2019-02-25','2018-02-25','3'),
    		$this->create('15', 'Dam-Profen','3','3','Suspension','100.00','20','50.00','2019-02-25','2018-02-25','3'),
    		$this->create('16', 'Anasol Proct supp','4','3','Suspension','100.00','10','50.00','2019-02-25','2018-02-25','3'),
    		$this->create('17', 'Spandoverin','4','3','Vial','200.00','50','100.00','2019-03-03','2017-03-03','3'),
    		$this->create('18', 'Stomacol','4','4','Vial','300.00','10','200.00','2019-03-03','2017-03-03','2'),
    		$this->create('19', 'Ephedrinol','4','4','Vial','900.00','30','500.00','2019-03-03','2017-03-03','2'),
    		$this->create('20', 'Respira','4','4','Vial','100.00','28','50.00','2019-03-03','2017-03-03','2'),
    		$this->create('21', 'Rondic','5','4','Vial','400.00','10','300.00','2019-03-03','2017-03-03','2'),
    		$this->create('22', 'Alendron','5','4','Vial','800.00','16','400.00','2019-03-03','2017-03-03','2'),
    		$this->create('23', 'Newgesal','5','5','Vial','200.00','19','100.00','2019-01-21','2017-03-03','8'),
    		$this->create('24', 'Damloric','5','5','Film Coated Tablet','200.00','24','100.00','2019-01-21','2018-01-21','8'),
    		$this->create('25', 'Rexblad','5','5','Film Coated Tablet','200.00','17','100.00','2019-01-21','2018-01-21','8'),
    		$this->create('26', 'Difladerm','6','5','Film Coated Tablet','200.00','27','100.00','2019-01-21','2018-01-21','8'),
    		$this->create('27', 'Nystacort','6','7','Film Coated Tablet','800.00','16','700.00','2019-01-21','2018-01-21','8'),
    		$this->create('28', 'Peldinar','6','7','Film Coated Tablet','300.00','15','200.00','2019-01-21','2018-01-21','6'),
    		$this->create('29', 'Sun D3 ','6','7','Film Coated Tablet','200.00','13','100.00','2019-01-21','2018-01-21','6'),
    		$this->create('30', 'Rebond','6','9','Film Coated Tablet','500.00','30','400.00','2019-01-21','2018-01-21','6'),
    	];
    	
		DB::table('drugs')->insert($drugs);
    }

    private function create($id, $title,$provider_id,$category_id,$measure,$price,$balance,$OrginalPrice,$ExpiredDate,$PurchaseDate,$LimitQTY)
    {
    	return [
    		'id' => $id,
    		'title' => $title,
    		'provider_id' => $provider_id,
    		'category_id' => $category_id,
    		'measure' => $measure,
    		'price' => $price,
    		'balance' => $balance,
    		'OrginalPrice' => $OrginalPrice,
    		'ExpiredDate' => $ExpiredDate,
    		'PurchaseDate' => $PurchaseDate,
    		'LimitQTY' => $LimitQTY,


    	];
}
}
