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
            'description' => $this->faker->paragraph,
        ];
    }
}
