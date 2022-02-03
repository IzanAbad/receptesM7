<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Recipe;
use Faker\Factory;
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
        // \App\Models\User::factory(10)->create();

    $user = User::Create([
    'name'=>'izan',
    'email'=>'izanabad@hotmail.es',
    'password'=>'alumne']
);

        $faker = Factory::create('es_ES');


        Category::insert([
            [
                'name'=>'meat',
                'description'=>'meat category'
            ],
            [
                'name'=>'mediterranean',
                'description'=>'mediterranean category'
            ],
            [
                'name'=>'spicy',
                'description'=>'spicy cateogry'
            ]
        ]);



        $categories = Category::all();

        foreach ($categories as $category){
            for($i = 0; $i < 22; $i++){
                $image = $faker->image(storage_path('app\public'), 600, 400, 'cats');
                $image = explode('\\', $image);
                $image = 'storage/'.end($image);

                //Storage::disc('local'->put('images/'.$filename, $request[]));
                $recipe = Recipe::create([

                'name'=>$faker->name(),
                'image'=>$image,
                'description'=>$faker->text(),
                'prep_time'=>'45 min',
                'ingredients'=>implode(',',$faker->words(10)),
                'instructions'=>implode($faker->sentences(10)),
                'agregateRating'=>$faker->numberBetween(1,5),
                'user_id'=>User::inRandomOrder()->first()->id
                ]);

            }
        }

    }
}
