<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Faker\Factory;
use Faker\Provider\it_IT\Company;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurant_data = config("db.restaurants");

        foreach ($restaurant_data as $restaurant_item) {
            $restaurant = new Restaurant();
            $restaurant->name = $restaurant_item["name"];
            $restaurant->image = $restaurant_item["image"];
            $restaurant->address = $faker->streetAddress();
            $restaurant->phone = $faker->numerify("###-######");
            $restaurant->vat_number = $faker->bothify("IT###########");
            $restaurant->save();
        }
    }
}
