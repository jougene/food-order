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
        DB::table('goods')->insert([
            'name' => 'Margarita',
            'category' => 'Pizza'
        ]);
    }
}
