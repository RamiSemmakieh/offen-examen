<?php
// database/factories/CourseFactory.php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => strtoupper($this->faker->lexify('???')), // Generates a random string of 3 uppercase letters
            // genrate a random sgrint of 20 words descripe the course name
            'description' => $this->faker->sentence(20),
        ];
    }
}
