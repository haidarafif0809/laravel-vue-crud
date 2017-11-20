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

        for ($i=0; $i < 250 ; $i++) { 
            $jenis = $i % 2;
            Company::create(['name' => 'andaglos '.$i,'jenis' => $jenis]);
        }

    }
}
