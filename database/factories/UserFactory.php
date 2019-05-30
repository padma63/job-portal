<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Company;
use App\Job;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'user_type' => 'seeker',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        
    ];
});

$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'cname' => $name = $faker->company,
        'slug' => str_slug($name),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => 'avatar\man.jpg',
        'cover_photo' => 'cover\tumblr_image_sizes_banner.png',
        'slogan' => 'learn-earn and grow',
        'description' => $faker->paragraph(rand(2,10)),
        
    ];
});

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'title' => $title = $faker->name,
        'slug' => str_slug($title),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'roles' => $faker->text,
        'category_id' => rand(1,5),
        'type' => 'fulltime',
        'status' => rand(0,1),
        'description' => $faker->paragraph,
        'last_date' => $faker->DateTime,  
    ];
});
