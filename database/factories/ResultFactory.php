<?php

// database/factories/ResultFactory.php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    protected $model = Result::class;

    public function definition()
    {
        return [
            'student_id' => \App\Models\Student::factory(),
            'course_id' => \App\Models\Course::factory(),
            'result' => $this->faker->numberBetween(1, 10), // Ensure this is an integer
            'period' => $this->faker->randomElement(['p1', 'p2', 'p3', 'p4']), // Enum values
            'remarks' => $this->faker->sentence,
        ];
    }
}
