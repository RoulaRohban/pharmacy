<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = [
    		$this->create('1', 'ANTIBIOTICS','Corticosteroids seizures'),
    		$this->create('2', 'VITAMINS and MINERALS','Treatment of congestive heart failure'),
    		$this->create('3', 'FOOD SUPPLEMENTS','Erectile dysfunction disorders'),
    		$this->create('4', 'HERBAL PRODUCT','To treat severe pulmonary embolism'),
    		$this->create('5', 'ANTI OBESITY','Treatment of non responsive skin disorders'),
    		$this->create('6', 'PANKILLERS and ANTIHYPERTENSIVES','Short term treatment for anxiety or insomnia'),
    		$this->create('7', 'Antidiabetic','Treatment of type 2 diabetes mellitus'),
    		$this->create('8', 'Cardiovascular','Anti cough anti congestion anti allergic'),
    		$this->create('9', 'Gastrointestinal','Inflammatory skin disorders'),
    		$this->create('10','Gynecologic','For the treatment of congestive heart failure'),
    	];
    	
		DB::table('categories')->insert($categories);
    }

    private function create($id,$title,$description)
    {
    	return [
    		'id' => $id,
    		'title' => $title,
    		'description' => $description,
    	];
    }
}
