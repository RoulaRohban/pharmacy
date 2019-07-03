<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,

            SalesTableSeeder::class,
            SalesDrugsTableSeeder::class,
            ProvidersTableSeeder::class,
            DrugsTableSeeder::class,
            CustomersTableSeeder::class,
            CategoriesTableSeeder::class,
        ]);
    }
}
