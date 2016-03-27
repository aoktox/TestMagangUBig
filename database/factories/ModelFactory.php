<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Siswa::class, function (Faker\Generator $faker) {
    if(mt_rand(1,2)==1){$kel ="L";} else $kel ="P";
    return [
        'nis' => mt_rand(100000000000,999999999999),
        'nama' => $faker->name,
        'j_kel' => $kel,
        'tgl_lahir' => $faker->date('Y-m-d'),
        'alamat' => $faker->address,
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
    ];
});