<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    // public function create()
    // {
    //     $students = Student::all();
    //     $courses = Course::all();

    //     return view('results.create', compact('students', 'courses'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'result' => 'required|integer|min:0|max:100',
            'period' => 'required|string|max:2',
            'remarks' => 'nullable|string',
        ]);

        Result::create($request->all());

        return redirect()->route('results.index')->with('success', 'Result created successfully!');
    }

    public function index(Request $request)
    {
        $query = Result::with(['student', 'course']);

        if ($request->filled('student')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->student . '%');
            });
        }

        if ($request->filled('course')) {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->course . '%');
            });
        }

        if ($request->filled('result')) {
            $query->where('result', $request->result);
        }

        if ($request->filled('period')) {
            $query->where('period', 'like', '%' . $request->period . '%');
        }

        $results = $query->paginate(20);

        return view('results.index', compact('results'));
    }

    public function show(Result $result)
    {
        return view('results.show', compact('result'));
    }

    public function edit(Result $result)
    {
        $students = Student::all();
        $courses = Course::all();

        return view('results.edit', compact('result', 'students', 'courses'));
    }

    public function update(Request $request, Result $result)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'result' => 'required|integer|min:0|max:100',
            'period' => 'required|string|max:2',
            'remarks' => 'nullable|string',
        ]);

        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully!');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')->with('success', 'Result deleted successfully!');
    }
}
