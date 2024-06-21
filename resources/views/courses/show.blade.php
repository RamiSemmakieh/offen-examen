<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            text-align: center;
        }

        .card-body {
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Course Details</h1>
        <div class="card mt-4">
            <div class="card-header">
                {{ $course->title }}
            </div>
            <div class="card-body">
                <p>{{ $course->description }}</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to Courses</a>
        </div>
    </div>
</body>

</html>