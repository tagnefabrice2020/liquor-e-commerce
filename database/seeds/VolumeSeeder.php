<?php

use App\Volume;
use Illuminate\Database\Seeder;

class VolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Adding Volumes to DB');
        $volumes = ['750ML', '1l', '1.5l'];
        for ($i=0; $i < count($volumes); $i++) { 
        	$volume = new Volume;
        	$volume->quantity = $volumes[$i];
        	$volume->status = 1;
        	$volume->save();
        	$this->command->info('Volume Added');
        }
    }
}
