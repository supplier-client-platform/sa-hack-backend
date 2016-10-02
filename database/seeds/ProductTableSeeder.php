<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name' => 'Cupcake',
            'price' => 65.00,
            'img_url' =>'http://0x0800.github.io/2048-CUPCAKES/style/img/1024.jpg',
        ]);

        DB::table('product')->insert([
            'name' => 'Ketchup',
            'price' => 150.00,
            'img_url' =>'http://www.annies.com/wp-content/uploads/2013/10/Ketchup_FR___.png',
        ]);

        DB::table('product')->insert([
            'name' => 'Burger Bun',
            'price' => 150.00,
            'img_url' =>'http://www.handletheheat.com/wp-content/uploads/2015/03/Burger-Buns-02-square.jpg',
        ]);

        DB::table('product')->insert([
            'name' => 'Rice & Curry',
            'price' => 150.00,
            'img_url' =>'http://www.123countries.com/wp-content/uploads/2015/12/Rice-And-Curry-National-Dish-Of-Sri-Lanka.jpg',
        ]);

        DB::table('product')->insert([
            'name' => 'Noodles',
            'price' => 200.00,
            'img_url' =>'http://moderndhaba.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/u/r/url_1_5.jpg',
        ]);
    }

}
