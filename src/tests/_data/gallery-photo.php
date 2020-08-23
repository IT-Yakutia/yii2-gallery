<?php

use Faker\Factory;

$data = [];
$faker = Factory::create();
$params = require('_config.php');

for ($f = 0; $f < $params['photoCount']; $f++) {
    $data[] = [
        'name' => 'Photo name - ' . $faker->words($nb = rand(3, 6), $asText = true),
        'description' => $faker->words($nb = rand(3, 6), $asText = true),
        'src' => 'https://picsum.photos/id/' . ($f+1) . '/525/525/',
        'original' => 'https://picsum.photos/id/' . ($f+1) . '/525/525/',
        'w' => 52,
        'h' => 52,
        'is_publish' => round(rand(2, 10) / 10, 0),
        'status' => 10,
        'created_at' => '1581434317',
        'updated_at' => '1581434317',
    ];
}
    
return $data;