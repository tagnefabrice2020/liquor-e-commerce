<?php

use App\Country;
use App\Sh_location;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->command->info('Adding Countries to DB');
        $countries = ['Cameroon'];
        for ($i=0; $i < count($countries); $i++) { 
        	$country = new Country;
        	$country->name = $countries[$i];
        	$country->status = 1;
        	$country->save();
        	$this->command->info('Country Added');
        }

        $location = new Sh_location;
        $location->country_id = 1;
        $location->name = 'Yaounde';
        $location->status = 1;
        $location->save();
    }
}
