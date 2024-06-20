<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.nl',
            'password' => bcrypt('admin'),
        ]);

        Course::factory(10)->create();
        Student::factory(10)->create();

        $periods = ['p1', 'p2', 'p3', 'p4'];
        foreach ($periods as $period) {
            foreach (Course::all() as $course) {
                foreach (Student::all() as $student) {
                    $student->results()->create([
                        'course_id' => $course->id,
                        'period' => $period,
                        'result' => rand(1, 10),
                    ]);
                }
            }
        }
    }
}
