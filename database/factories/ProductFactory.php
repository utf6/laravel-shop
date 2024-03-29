<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $image = $faker->randomElement([
        "https://laravel-china.org/uploads/images/201806/01/5320/7kG1HekGK6.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/1B3n0ATKrn.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/r3BNRe4zXG.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/C0bVuKB2nt.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/82Wf2sg8gM.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/nIvBAQO5Pj.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/uYEHCJ1oRp.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/2JMRaFwRpo.jpg",
        "https://laravel-china.org/uploads/images/201806/01/5320/pa7DrV43Mw.jpg",
    ]);

    return [
        'title'        => $faker->word,
        'description'  => $faker->sentence,
        'image'        => $image,
        'on_sale'      => true,
        'rating'       => $faker->numberBetween(0, 5),
        'sold_count'   => 0,
        'review_count' => 0,
        'price'        => 0,
    ];
});
