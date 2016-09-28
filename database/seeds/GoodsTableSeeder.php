<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 12;

        DB::table('goods')->truncate();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('goods')->insert([
                'name'          => $faker->name,
                'description'   => $faker->text($maxNbChars = 100),
                'image'         => $faker->imageUrl($width = 150, $height = 150, 'food'),
                'category'      => $faker->randomElement(['Pizza', 'Drink', 'Rolls', 'Sushi', 'Desserts', 'Hotplates']),
                'price'         => $faker->numberBetween(100, 1000)
            ]);
        }
    }
}
