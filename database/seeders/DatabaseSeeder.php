<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // USERS SEEDER
        DB::table('users')->insert([
            [
                'name'=>'admin1',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin123'),
                'role'=>'admin',
                'updated_at'=>now(),
                'created_at'=>now(),
                'berkas'=> '',
            ],
            [
                'name'=>'user1',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('user123'),
                'role'=>'user',
                'updated_at'=>now(),
                'created_at'=>now(),
                'berkas'=> '',
            ],
            [
                'name'=>'user2',
                'email'=>'user2@gmail.com',
                'password'=>bcrypt('user123'),
                'role'=>'user',
                'updated_at'=>now(),
                'created_at'=>now(),
                'berkas'=> '',
            ]
        ]);

        // FOOD SEEDER
        DB::table('foods')->insert([
            // Main Course
            [
                'food_name'=> 'Sweet and Sour Pork',
                'food_cat'=> 'Main Course',
                'price'=> 80000,
                'food_desc'=> 'Tangy and crispy pork bites',
                'desc'=> 'Sweet and Sour Pork is a popular chinese dish featuring breaded and seared pork glazed with Xiao Ding Dong special sauce',
                'berkas'=> 'sweet_and_sour_pork.jpg',
            ],
            [
                'food_name'=> 'General Tso Chicken',
                'food_cat'=> 'Main Course',
                'price'=> 60000,
                'food_desc'=> 'Crispy chicken in sweet and spicy sauce',
                'desc'=> 'General Tso Chicken is a popular chinese dish featuring breaded and seared chicken glazed with Xiao Ding Dong special sauce',
                'berkas'=> 'general_tso_chicken.jpg',
            ],
            [
                'food_name'=> 'Mongolian Beef',
                'food_cat'=> 'Main Course',
                'price'=> 75000,
                'food_desc'=> 'Savory beef stir-fry with scallions',
                'desc'=> 'Mongolian Beef is a popular chinese dish featuring breaded and seared beef glazed with Xiao Ding Dong special sauce',
                'berkas'=> 'mongolian_beef.jpg',
            ],
            [
                'food_name'=> 'Mapo Tofu',
                'food_cat'=> 'Main Course',
                'price'=> 55000,
                'food_desc'=> 'Spicy tofu with minced meat',
                'desc'=> 'Mapo Tofu is a popular chinese dish seared tofu glazed with Xiao Ding Dong special sauce',
                'berkas'=> 'mapo_tofu.jpg',
            ],
            [
                'food_name'=> 'Orange Chicken',
                'food_cat'=> 'Main Course',
                'price'=> 60000,
                'food_desc'=> 'Crispy chicken with orange sauce',
                'desc'=> 'Orange Chicken is a popular chinese dish featuring breaded and seared chicken glazed with Xiao Ding Dong special orange sauce',
                'berkas'=> 'orange_chicken.jpg',
            ],
            [
                'food_name'=> 'Sesame Chicken',
                'food_cat'=> 'Main Course',
                'price'=> 60000,
                'food_desc'=> 'Crispy chicken with sesame seed',
                'desc'=> 'Sesame Chicken is a popular chinese dish featuring breaded and seared chicken with sesame seed glazed with Xiao Ding Dong special honey sauce',
                'berkas'=> 'sesame_chicken.jpg',
            ],
            // Beverages
            [
                'food_name'=> 'Coffee',
                'food_cat'=> 'Beverages',
                'price'=> 20000,
                'food_desc'=> 'Xiao Ding Dong Black coffee',
                'desc'=> 'Special XiaoDingDong Black roasted coffee',
                'berkas'=> 'Coffee.jpg',
            ],
            [
                'food_name'=> 'Hot Tea',
                'food_cat'=> 'Beverages',
                'price'=> 18000,
                'food_desc'=> 'A cup of hot tea',
                'desc'=> 'Special Xiao Ding Dong hot tea',
                'berkas'=> 'HotTea.jpg',
            ],
            [
                'food_name'=> 'Ice Tea',
                'food_cat'=> 'Beverages',
                'price'=> 21000,
                'food_desc'=> 'A cup of ice tea',
                'desc'=> 'Special Xiao Ding Dong ice tea',
                'berkas'=> 'IceTea.jpg',
            ],
            [
                'food_name'=> 'Chinese Tea',
                'food_cat'=> 'Beverages',
                'price'=> 30000,
                'food_desc'=> 'A teapot of chinese tea',
                'desc'=> 'Xiao Ding Dong\'s special chinese pu-er tea',
                'berkas'=> 'ChineseTea.jpg',
            ],
            // Dessert
            [
                'food_name'=> 'Vanilla Ice Cream',
                'food_cat'=> 'Dessert',
                'price'=> 30000,
                'food_desc'=> 'A scoop of vanilla ice cream',
                'desc'=> 'Special Xiao Ding Dong vanilla ice cream with original toppings',
                'berkas'=> 'VanillaIceCream.jpg',
            ],
            [
                'food_name'=> 'Strawberry Ice Cream',
                'food_cat'=> 'Dessert',
                'price'=> 30000,
                'food_desc'=> 'A scoop of strawberry ice cream',
                'desc'=> 'Special Xiao Ding Dong strawberry ice cream with original toppings',
                'berkas'=> 'StrawberryIceCream.jpg',
            ],
            [
                'food_name'=> 'Chocolate Ice Cream',
                'food_cat'=> 'Dessert',
                'price'=> 30000,
                'food_desc'=> 'A scoop of chocolate ice cream',
                'desc'=> 'Special Xiao Ding Dong chocolate ice cream with original toppings',
                'berkas'=> 'ChocolateIceCream.jpg',
            ],
        ]);
    }
}
