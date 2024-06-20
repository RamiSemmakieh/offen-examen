<!DOCTYPE html>
<html>

<head>
    <title>Edit Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Result</h1>
        <form action="{{ route('results.update', $result->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="student_id">Student</label>
                <select name="student_id" id="student_id" class="form-control">
                    @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $result->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $result->course_id ? 'selected' : '' }}>{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="result">Result</label>
                <input type="number" name="result" id="result" class="form-control" min="0" max="100" value="{{ $result->result }}">
            </div>
            <div class="form-group">
                <label for="period">Period</label>
                <select name="period" id="period" class="form-control">
                    <option value="p1" {{ $result->period == 'p1' ? 'selected' : '' }}>P1</option>
                    <option value="p2" {{ $result->period == 'p2' ? 'selected' : '' }}>P2</option>
                    <option value="p3" {{ $result->period == 'p3' ? 'selected' : '' }}>P3</option>
                    <option value="p4" {{ $result->period == 'p4' ? 'selected' : '' }}>P4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea name="remarks" id="remarks" class="form-control">{{ $result->remarks }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Result</button>
        </form>
    </div>
</body>

</html>