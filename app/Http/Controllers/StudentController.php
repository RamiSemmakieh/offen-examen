<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Student;

class StudentController extends Controller
{
    public function show($id)
    {
        $student = Student::find($id);
        $results = $student->results;
        return view('students.show', compact('student', 'results'));
    }
    public function showResultPerPeriode($id, $periode)
    {
        $student = Student::find($id);
        $results = $student->resultsPerPeriode($periode)->get();
        return view('students.show', compact('student', 'results'));
    }
}
