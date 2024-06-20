<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Course Details</h1>
        <div class="card">
            <div class="card-header">
                {{ $course->title }}
            </div>
            <div class="card-body">
                <p>{{ $course->description }}</p>
            </div>
        </div>
        <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">Back to Courses</a>
    </div>
</body>

</html>