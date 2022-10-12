<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();
        $faker = Factory::create();
        foreach ($users as $user) {
            for ($i=1; $i<11; $i++) {
                $user->posts()->create([
                    'title' => $faker->title,
                    'content' => $faker->text,
                ]);
            }
        }
    }
}
