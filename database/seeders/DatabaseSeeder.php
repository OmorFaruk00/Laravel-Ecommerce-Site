<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
    	$faker = Faker::create();
    	foreach(range(1,10) as $item)
    {
        

        DB::table('products')->insert([            
            'title'=>"$faker->title",
            'slug'=>"$faker->slug",            
            'model'=>"$faker->model",
            'brand'=>"$faker->brand",
            'short_desc'=>"$faker->short_desc",
            'desc'=>"$faker->desc",
            'qty'=>"$faker->qty",
            'price'=>"$faker->price",
            
        ]);
    }
       
    }
}
