<?php

use Illuminate\Database\Seeder;
use App\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	Company::create(['name' => 'andaglos','jenis' => 1]);
    	Company::create(['name' => 'andaglos 2','jenis' => 0]);
    }
}
