<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Result;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class ResultsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    #[Test]
    public function it_can_store_a_result()
    {
        $this->authenticate();

        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $data = [
            'student_id' => $student->id,
            'course_id' => $course->id,
            'result' => $this->faker->numberBetween(0, 100),
            'period' => $this->faker->randomElement(['p1', 'p2', 'p3', 'p4']),
            'remarks' => $this->faker->sentence,
        ];

        $response = $this->post(route('results.store'), $data);

        $response->assertRedirect(route('results.index'));
        $this->assertDatabaseHas('results', $data);
    }

    #[Test]
    public function it_can_display_all_results()
    {
        $this->authenticate();

        $results = Result::factory()->count(3)->create();

        $response = $this->get(route('results.index'));

        $response->assertStatus(200);
        $response->assertViewHas('results', function ($viewResults) use ($results) {
            return $viewResults->count() === $results->count();
        });
    }

    #[Test]
    public function it_can_display_a_single_result()
    {
        $this->authenticate();

        $result = Result::factory()->create();

        $response = $this->get(route('results.show', $result->id));

        $response->assertStatus(200);
        $response->assertViewHas('result', $result);
    }

    #[Test]
    public function it_can_update_a_result()
    {
        $this->authenticate();

        $result = Result::factory()->create();
        $newData = [
            'student_id' => $result->student_id,
            'course_id' => $result->course_id,
            'result' => $this->faker->numberBetween(0, 100),
            'period' => $this->faker->randomElement(['p1', 'p2', 'p3', 'p4']),
            'remarks' => $this->faker->sentence,
        ];

        $response = $this->put(route('results.update', $result->id), $newData);

        $response->assertRedirect(route('results.index'));
        $this->assertDatabaseHas('results', $newData);
    }

    #[Test]
    public function it_can_delete_a_result()
    {
        $this->authenticate();

        $result = Result::factory()->create();

        $response = $this->delete(route('results.destroy', $result->id));

        $response->assertRedirect(route('results.index'));
        $this->assertDatabaseMissing('results', ['id' => $result->id]);
    }
}
