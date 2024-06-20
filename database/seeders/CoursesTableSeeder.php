<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'title' => 'Course 1',
                'description' => 'Description for course 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Course 2',
                'description' => 'Description for course 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
