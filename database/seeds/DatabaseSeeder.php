<?php



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(LaratrustSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(VolumeSeeder::class);
        $this->call(CountrySeeder::class);
    }

}