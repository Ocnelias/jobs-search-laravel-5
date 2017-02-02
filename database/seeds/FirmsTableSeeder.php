<?php

use Illuminate\Database\Seeder;

class FirmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Firm::class, 50)->create();
    }
}
