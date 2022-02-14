<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('en_US');
        for($i=1;$i<=10;$i++){
            DB::table('ebooks')->insert([
                'title'=>$faker->unique()->word,
                'author'=>$faker->name,
                'description'=>$faker->paragraph(10)
            ]);
        }
    }
}
