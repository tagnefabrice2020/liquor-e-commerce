<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('Adding Categories to DB');
        $categories = ['beer', 'champagne', 'spirits', 'vodka'];
        for ($i=0; $i < count($categories); $i++) { 
        	$category = new Category;
        	$category->name = $categories[$i];
        	$category->status = 1;
        	$category->save();
        	$this->command->info('Category Added');
        }
    }
}
